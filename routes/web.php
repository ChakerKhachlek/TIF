<?php

use Illuminate\Support\Facades\Auth;
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
})->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.pages.dashboard');
    })->name('dashboard');


Route::get('/manage-categories', function () {
    return view('dashboard.pages.manage-categories'); })->name('categories-management');


Route::get('/manage-owners', function () {
    return view('dashboard.pages.manage-owners'); })->name('owners-management');

Route::get('/manage-tifs', function () {
    return view('dashboard.pages.manage-tifs'); })->name('tifs-management');

    Route::get('/newsletter', function () {
        return view('dashboard.pages.newsletter'); })->name('newsletter');




});



Auth::routes();




