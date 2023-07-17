<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiTeacherlogen;
use App\Http\Controllers\Api\ApiStudentlogen;

use App\Http\Controllers\Api\AuthController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\UserController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Api\ApiStudentlogen;
// use App\Http\Controllers\Api\ApiTeacherlogen;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\GuardianController;
use App\Http\Controllers\api\appsettingscontroller;
use App\Http\Controllers\Api\Daily_BusinessController;
use App\Http\Controllers\Api\Quran_EpisodesController;
use App\Http\Controllers\Api\Daily__BusinessController;
// use ApiStudentlogen;
//hdhdggcgg

Route::post('/logiggn', [Apiteatherlogen::class,'logissn']);
Route::group([
    'middleware'=>'api',
'prefix' => 'auth'
], function ($router) {
Route::post('/logein', [ApiStudentlogen::class, 'logein']);
Route::post('/teacherregister', [ApiStudentlogen::class, 'registeer']);
Route::post('/logout', [ApiStudentlogen::class, 'logout']);
Route::post('/refresh', [ApiStudentlogen::class, 'refresh']);
Route::get('/user-profile', [ApiStudentlogen::class, 'userProfile']);
Route::post('/users/{id}', [ApiStudentlogen::class, 'update']);
});
Route::group([
    'middleware'=>'api',
'prefix' => 'auth'
], function ($router) {
Route::post('/login', [ApiTeacherlogen::class, 'logidn']);
Route::post('/teacherregister', [ApiTeacherlogen::class, 'registeer']);
Route::post('/logout', [ApiTeacherlogen::class, 'logout']);
Route::post('/refresh', [ApiTeacherlogen::class, 'refresh']);
Route::get('/user-profile', [ApiTeacherlogen::class, 'userProfile']);
Route::post('/users/{id}', [ApiTeacherlogen::class, 'update']);
});

Route::middleware(['jwt_verify'])->controller( StudentController::class)->group( function () {
    Route::get('student/insert', 'create');
Route::post('student/store', 'store');
Route::get('student/index', 'index');
Route::get('student/edit/{id}', 'edit');
Route::post('student/update/{id}',  'update');
Route::get('student/destroy/{id}','destroy');
Route::get('student/delete/all/Truncate','deleteTruncate');
});
Route::get('/update_user_role', [appsettingscontroller::class, 'updeteUserRole']);
Route::get('/user_generateRoles', [appsettingscontroller::class, 'generateRoles']);
Route::get('/generateIdentity', [appsettingscontroller::class, 'generateIdentity']);
Route::get('/generateNationality', [appsettingscontroller::class, 'generateNationality']);
Route::get('/generateQualification_study', [appsettingscontroller::class, 'generateQualification_study']);
Route::get('/generatejop', [appsettingscontroller::class, 'generatejop']);
Route::get('/generateGender', [appsettingscontroller::class, 'generateGender']);
Route::get('/generateSystem_Spisod', [appsettingscontroller::class, 'generateSystem_Spisod']);
Route::get('/generateatendance', [appsettingscontroller::class, 'generateatendance']);
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

Route::post('/users/store','store');
Route::post('/userss/{id}','update');
Route::get('user/destroy/{id}','destroy');
Route::get('user/destroy/all/Truncate','deleteTruncate');
});
Route::resource('sex', SexController::class);

Route::middleware(['jwt_verify','auth'])->controller(Quran_EpisodesController::class)->group( function ($id) {
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
// Route::get('guardian/store',[GuardianController::class,'store']);
Route::middleware(['jwt_verify'])->controller(Daily__BusinessController::class)->group( function () {
Route::get('Daily__Business/insert',  'create');
Route::post('Daily__Business/store', 'store');
Route::get('Daily__Business/index',  'index');
Route::get('Daily__Business/edit',  'show');
Route::post('Daily__Business/update/{id}',  'update');
Route::get('Daily__Business/destroy/{id}','destroy');
Route::get('Daily__Business/delete/all/Truncate','deleteTruncate');
// Route::get('parent/delete/all/Truncate','deleteTruncate')->name(name: 'parent.delete.all.Truncate');
});
Route::post('/Daily_BusinessController/store',[Daily_BusinessController::class ,'store']);
