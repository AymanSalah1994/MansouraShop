<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\CategoryController ; 
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
})->name('welcome');

Auth::routes();

//  Home View Comes From Laravel/Ui Package 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Below Are Links For the "Admin"
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/categories' , [CategoryController::class , 'index'])->name('categories.index') ; 
    Route::get('/add-category',[CategoryController::class , 'create'])->name('categories.create') ; 

    Route::post('/add-category' , [CategoryController::class , 'create'])->name('categoreis.store') ;

});
