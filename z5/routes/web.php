<?php
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::get('/calculate', function () {
    return view('calculate');
});
Route::get('/students/generate/{assignmentId}', [StudentController::class, 'generate'])->name('students.generate');
Route::post('/compare-result', [CalcController::class, 'compareResult'])->name('compare.result');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {

    Route::get('change-language/{locale}', function (string $locale) {
        if (! in_array($locale, ['en', 'sk'])) {
            abort(400);
        }
        App::setLocale($locale);
        return back();
    });

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('assignments', AssignmentController::class);
});