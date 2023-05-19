<?php
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    Route::get('/students/generate/{assignmentId}', [StudentController::class, 'generate'])->name('students.generate');
    Route::get('/students/solve/{solutionId}',[StudentController::class,'solve'])->name("students.solve");
    Route::post('/compare-result/{solutionId}', [CalcController::class, 'compareResult'])->name('compare.result');
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('assignments', AssignmentController::class);


});
Route::get('/download-pdf', [PDFController::class, 'downloadPDF'])->name('download.pdf');
