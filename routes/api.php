<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
//use GuzzleHttp\Psr7\Response;
//use Nette\Utils\Json;
use App\Http\Controllers\Api\GuardianController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\Quran_EpisodesController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ProfileController;
//hdhdggcgg

Route::middleware(['jwt_verify'])->group( function () {
    Route::get('student/insert', [ StudentController::class,'create']);
Route::post('student/store', [StudentController::class,'store']);
Route::get('student/index', [StudentController::class,'index']);
Route::get('student/edit/{id}',  [StudentController::class,'edit']);
Route::post('student/update/{id}',  [StudentController::class,'update']);
Route::get('student/destroy/{id}',[ StudentController::class,'destroy']);
Route::get('student/delete/all/Truncate',[StudentController::class,'deleteTruncate']);
});
Route::group([
        'middleware'=>'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/token', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/users/{id}', [AuthController::class, 'update']);
});
Route::controller(UserController::class)->group( function () {
Route::get('/users','index');
Route::get('/user/{id}','show');
Route::post('/user','create');
Route::post('/store','store');
Route::post('/userss/{id}','update');
Route::get('user/destroy/{id}','destroy');
Route::get('user/destroy/all/Truncate','deleteTruncate');
});
Route::resource('sex', SexController::class);

Route::middleware(['jwt_verify'])->controller(Quran_EpisodesController::class)->group( function ($id) {
Route::get('quran_episod/episades',  'create');
Route::post('quran_episod/store', 'store');
Route::get('quran_episod/index',  'index');
Route::get('quran_episod/edit/{id}',  'edit');
Route::post('quran_episod/update/{id}',  'update');
Route::get('quran_episod/destroy/{id}','destroy');
Route::get('quran_episod/delete/all/Truncate','deleteTruncate');
});
Route::middleware(['jwt_verify'])->controller(TeacherController::class)->group( function ($id) {
Route::get('teacher/insert',  'create');
Route::post('teacher/store', 'store');
Route::get('teacher/index',  'index');
Route::get('teacher/edit/{id}',  'edit');
Route::post('teacher/update/{id}',  'update');
Route::get('teacher/destroy/{id}','destroy');
Route::get('teacher/delete/all/Truncate','deleteTruncate');
});
Route::middleware(['jwt_verify'])->controller(GuardianController::class)->group( function () {
Route::get('guardian/insert',  'create');
Route::post('guardian/store', 'store');
Route::get('guardian/index',  'index');
Route::get('guardian/edit/{id}',  'show');
Route::post('guardian/update/{id}',  'update');
Route::get('guardian/destroy/{id}','destroy');
Route::get('guardian/delete/all/Truncate','deleteTruncate');
// Route::get('parent/delete/all/Truncate','deleteTruncate')->name(name: 'parent.delete.all.Truncate');
});

