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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('zz/categories', App\Http\Controllers\Zz\CategoryController::class)
    ->names([
        'index' => 'zz.categories.index',
        'store' => 'zz.categories.store',
        'show' => 'zz.categories.show',
        'update' => 'zz.categories.update',
        'destroy' => 'zz.categories.destroy',
        'create' => 'zz.categories.create',
        'edit' => 'zz.categories.edit'
    ]);