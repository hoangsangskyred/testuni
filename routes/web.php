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
    Route::get('/services', [ServiceController::class, 'all'])->name('services');
    Route::get('/{slug}-{service}.html', [ServiceController::class, 'show'])
        ->where(['slug' => '(.*)', 'service' => '(service|dich-vu)'])
        ->name('service.detail');
    Route::get('/{slug}-blogs.html', [ArticleController::class, 'category'])
        ->where(['slug' => '(.*)', 'Blogs' => '(Blogs|blogs)'])
        ->name('article.detail');    
    
    /*    Route::get('/{slug}-blog.html', [ArticleController::class, 'index'])
        ->where(['slug' => '(.*)'])
        ->name('article.show');*/

    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contactUs');
    Route::Post('/contact-us', [ContactUsController::class, 'store'])->name('contactUs');
});
