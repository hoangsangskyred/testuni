<?php

namespace App\Http\Controllers\Web;

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

Route::name('web.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('aboutUs');
    Route::get('/dich-vu', [ServiceController::class, 'all'])
    ->name('services.show');
    Route::get('/{slug}-{service}.html', [ServiceController::class, 'show'])
        ->where(['slug' => '(.*)', 'service' => '(service|dich-vu)'])
        ->name('service.detail');
    Route::get('/du-an',[ProjectController::class,'show'])->name('projects.show'); 
    Route::get('/{slug}-{projects}.html', [ProjectController::class, 'category'])
        ->where(['slug' => '(.*)', 'projects' => '(projects|danh-muc)'])
        ->name('projectCategory.show');
    Route::get('/{slug}-{project}.html', [ProjectController::class, 'detail'])
        ->where(['slug' => '(.*)', 'project' => '(project|du-an)'])
        ->name('project.detail');
    Route::get('/blogs',[ArticleController::class,'show'])->name('articles.show');     
    Route::get('/{slug}-{blogs}.html', [ArticleController::class, 'category'])
        ->where(['slug' => '(.*)','blogs'=>'(blogs|chu-de)'])
        ->name('articleCategory.show');
    Route::get('/{slug}-{blog}.html', [ArticleController::class, 'detail'])
        ->where(['slug' => '(.*)', 'blog' => '(blog|bai-viet)'])
        ->name('article.detail');
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contactUs');
    Route::Post('/contact-us', [ContactUsController::class, 'store'])->name('contactUs');
});
