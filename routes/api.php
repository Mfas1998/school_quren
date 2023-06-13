<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
//use GuzzleHttp\Psr7\Response;
//use Nette\Utils\Json;
use App\Http\Controllers\Api\ParentsController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\QuranEpisadesController;
use App\Http\Controllers\Api\StudentController;
// use App\Http\Controllers\Api\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/token', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/users/{id}', [AuthController::class, 'update']);
});

Route::controller(UserController::class)->group( function ($id) {
Route::get('/users','index');
Route::get('/user/{id}','show');
Route::post('/user','create');
Route::post('/store','store');
Route::post('/userss/{id}','update');
Route::get('user/destroy/{id}','destroy');
Route::get('user/destroy/all/Truncate','deleteTruncate');
});
Route::resource('sex', SexController::class);

Route::controller(QuranEpisadesController::class)->group( function ($id) {

Route::get('quran/episades',  'create');
Route::post('quran/store', 'store');
Route::get('quran/index',  'index');
Route::get('quran/edit/{id}',  'edit');
Route::post('quran/update/{id}',  'update');
Route::get('quran/destroy/{id}','destroy');
Route::get('quran/delete/all/Truncate','deleteTruncate');

});


Route::get('/', function () {
    return view('welcome');
});

Route::controller(TeacherController::class)->group( function ($id) {
Route::get('teacher/insert',  'create');
Route::post('teacher/store', 'store');
Route::get('teacher/index',  'index');
Route::get('teacher/edit/{id}',  'edit');
Route::post('teacher/update/{id}',  'update');
Route::get('teacher/destroy/{id}','destroy');
Route::get('teacher/delete/all/Truncate','deleteTruncate');

});


// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(StudentController::class)->group( function ($id) {
Route::get('student/insert',  'create');
Route::post('student/store', 'store');
Route::get('student/index', 'index');
Route::get('student/edit/{id}',  'edit');
Route::post('student/update/{id}',  'update');
Route::get('student/destroy/{id}','destroy');
Route::get('student/delete/all/Truncate','deleteTruncate');

});


// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('stores', [ParentsController::class,'store']);
Route::controller(ParentsController::class)->group( function ($id) {
Route::get('parent/insert',  'create');
Route::post('parent/store', 'store');
Route::get('parent/index',  'index');
Route::get('parent/edit/{id}',  'show');
Route::post('parent/update/{id}',  'update');
Route::get('parent/destroy/{id}','destroy');
Route::get('parent/delete/all/Truncate','deleteTruncate');
// Route::get('parent/delete/all/Truncate','deleteTruncate')->name(name: 'parent.delete.all.Truncate');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::controller(UserController::class)->group( function ($id) {
// Route::get('user/insert',  'create');

// Route::post('user/store', 'store');
// Route::get('user/index',  'index');
// Route::get('user/edit/{id}',  'edit');
// Route::post('user/update/{id}',  'update');
// Route::get('user/destroy/{id}','destroy');
// Route::get('user/delete/all/Truncate','deleteTruncate');
// // Route::get('user/restore/{id}','show');
// Route::get('user/softDelete','show1');
// });

// //  Route::controller(UserController::class)->group( function ($id) {
// //     Route::get('user/insert',  'create')->name(name: 'user.insert');

// //     Route::post('/user/store', 'store');
// //     Route::get('/users','index')->name(name: 'user.index');
// //     Route::get('user/edit/{id}',  'edit')->name(name: 'user.edit');
// //     Route::post('user/update/{id}',  'update')->name(name: 'user.update');
// //     Route::get('user/destroy/{id}','destroy')->name(name: 'user.destroy');
// //     Route::get('user/delete/all/Truncate','deleteTruncate')->name(name: 'user.delete.all.Truncate');
// //     Route::get('/user/{id}','show')->name(name: 'user.restore');
// //     Route::get('user/softDelete','show1')->name(name: 'user.softDelete');
// //     });
