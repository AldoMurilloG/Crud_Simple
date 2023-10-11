<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get( '/products', [ProductController::class, 'index' ] )->name( 'products.index' );
Route::post( '/products', [ProductController::class, 'store' ] )->name( 'products.store' );
Route::get( '/products/create', [ProductController::class, 'create' ] )->name( 'products.create' );
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::put( '/products/{product}', [ProductController::class, 'update' ] )->name( 'products.update' );
Route::delete( '/products/{product}', [ ProductController::class, 'destroy' ])->name( 'products.destroy' );
Route::get( '/products/{product}/edit', [ProductController::class, 'edit' ] )->name( 'products.edit' );





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
