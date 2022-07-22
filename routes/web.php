<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'loginPage'])->name('login');
Route::post('login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/pdf-download', [AdminController::class, 'pdf']);

Route::middleware('admin.auth')->group(function () {
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('main', [AdminController::class, 'main'])->name('admin.main');
    Route::resource('cities', \App\Http\Controllers\Admin\CityController::class);
    Route::resource('schools', \App\Http\Controllers\Admin\SchoolController::class);
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);
    Route::resource('course-intros', \App\Http\Controllers\Admin\CourseIntroController::class);
    Route::get('course-intros-get/{id}', [\App\Http\Controllers\Admin\CourseIntroController::class, 'get'])->name('course-intros.intros');
    Route::resource('test', \App\Http\Controllers\Admin\TestController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('employees', \App\Http\Controllers\Admin\EmployeeController::class);
    Route::resource('tariffs', \App\Http\Controllers\Admin\TariffController::class);
    Route::resource('tariff-texts', \App\Http\Controllers\Admin\TariffTextController::class);
    Route::resource('about-us', \App\Http\Controllers\Admin\AboutUController::class);
    Route::resource('prof-tests', \App\Http\Controllers\Admin\ProfTestController::class);
    Route::resource('answers', \App\Http\Controllers\Admin\AnswerController::class);
    Route::resource('video', \App\Http\Controllers\Admin\VideoController::class);
    Route::resource('docs', \App\Http\Controllers\Admin\DocController::class);

    Route::resource('main-page', \App\Http\Controllers\Admin\MainPageController::class);
    Route::resource('social', \App\Http\Controllers\Admin\SocialController::class);
    Route::resource('feedback', \App\Http\Controllers\Admin\FeedbackController::class);
    Route::resource('footer-doc', \App\Http\Controllers\Admin\FooterDocController::class);
    Route::resource('spheres', \App\Http\Controllers\Admin\SphereController::class);
    Route::resource('reviews', \App\Http\Controllers\Admin\ReviewController::class);
    Route::resource('questions',  \App\Http\Controllers\Admin\QuestionController::class);
    Route::resource('question-answer', \App\Http\Controllers\Admin\QuestionAnswerController::class);
    Route::resource('faq',  \App\Http\Controllers\Admin\FaqController::class);
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
});
