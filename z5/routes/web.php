<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AssignmentController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('assignments', AssignmentController::class);


});