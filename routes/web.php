<?php

use App\Http\Controllers\BannersController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\FactsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SocialsController;
use App\Http\Controllers\TestimonialsController;
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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'fronend_page'])->name('index');
Route::get('/portfolio/page/{id}', [App\Http\Controllers\FrontendController::class, 'portfolio_page'])->name('portfolio_page');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about_me'])->name('about_me');

Route::post('/password/change', [App\Http\Controllers\ProfileController::class, 'password_change'])->name('password_change');
Route::post('/upload/photo', [App\Http\Controllers\ProfileController::class, 'profile_image'])->name('profile_image');

Route::post('/upload/description', [App\Http\Controllers\AboutController::class, 'edu_description'])->name('edu_description');
Route::post('/upload/degree', [App\Http\Controllers\AboutController::class, 'upload_degree'])->name('upload_degree');
Route::get('/edit/degree/{id}', [App\Http\Controllers\AboutController::class, 'edit_degree'])->name('edit_degree');

Route::post('/contact/email',[\App\Http\Controllers\FrontendController::class, 'contact_email'])->name('contact_email');



Route::resource('banner',BannersController::class);
Route::resource('education',EducationController::class);
Route::resource('social',SocialsController::class);
Route::resource('services',ServiceController::class);
Route::resource('portfolio',PortfolioController::class);
Route::resource('fact',FactsController::class);
Route::resource('testimonial',TestimonialsController::class);
Route::resource('brand',BrandsController::class);
Route::resource('contacts',ContactsController::class);
Route::resource('email',EmailsController::class);

