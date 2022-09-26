<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/tif/{id}/{slug?}', [HomeController::class, 'show'])->name('tif.show');
Route::get('/owner/{id}/{slug}', [HomeController::class, 'owner'])->name('owner.show');
Route::get('/explore', function () {return view('front.pages.explore'); })->name('explore');

Route::post('/search', [HomeController::class, 'search'])->name('search');

Route::get('/categories/show/{id}/{slug?}', [HomeController::class, 'categories'] )->name('categories.show');

Route::get('/styles/show/{id}/{slug?}', [HomeController::class, 'styles'])->name('styles.show');

Route::get('/about-us', function () {return view('front.pages.about-us'); })->name('about-us');
Route::get('/contact-us', function () {return view('front.pages.contact-us'); })->name('contact-us');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.pages.dashboard');
    })->name('dashboard');


Route::get('/manage-categories', function () {
    return view('dashboard.pages.manage-categories'); })->name('categories-management');

    Route::get('/manage-styles', function () {
        return view('dashboard.pages.manage-styles'); })->name('styles-management');


Route::get('/manage-owners', function () {
    return view('dashboard.pages.manage-owners'); })->name('owners-management');

Route::get('/manage-tifs', function () {
    return view('dashboard.pages.manage-tifs'); })->name('tifs-management');


    Route::get('/manage-bids', function () {
        return view('dashboard.pages.manage-bids'); })->name('bids-management');


    Route::get('/newsletter', function () {
        return view('dashboard.pages.newsletter'); })->name('newsletter');




});



Auth::routes();




