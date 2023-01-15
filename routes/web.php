<?php

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

Route::get('/about', function () {
    return "About Page!";
});

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->middleware('admin')->name('products.create');
Route::post('/products', 'App\Http\Controllers\ProductController@store')->middleware('admin')->name('products.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

