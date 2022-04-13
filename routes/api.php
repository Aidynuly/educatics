<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SchoolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('cities', [CityController::class, 'get']);
Route::get('schools', [SchoolController::class, 'get']);
Route::get('courses', [CourseController::class, 'get']);
Route::get('course-intros', [CourseController::class, 'byId']);
Route::get('course-intro-test', [CourseController::class, 'getTest']);
Route::get('about-us', [ApiController::class, 'about']);
Route::get('articles', [ApiController::class, 'article']);
Route::get('employees', [EmployeeController::class, 'get']);
Route::prefix('V1')->middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
