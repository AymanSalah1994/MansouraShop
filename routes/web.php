<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Store\StoreController;

//Auth Routes
Auth::routes();



// Routes For the Store Front [ For the Customer ]
Route::get('/', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/categories', [StoreController::class, 'categories'])->name('store.categories');
Route::get('/products/{id}', [StoreController::class, 'categoryProducts'])->name('category.products');
Route::get('/product/{id}', [StoreController::class, 'productDetails'])->name('product.details');

//  Home View Comes From Laravel/Ui Package
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Below Are Links For the "Admin"
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('categories.update');
    // TODO : Make the PUT instead of post ?
    Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
});
// TODO : Product Owner Middleware  / Show Only His Stuff and Check That On each CRUD
// https://stackoverflow.com/questions/28729228/laravel-5-resourceful-routes-plus-middleware
// TODO : Remove the Show Link From Resource
Route::resource('/products', ProductController::class);
