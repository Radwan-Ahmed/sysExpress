<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AboutController;
// routes/web.php
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;

Route::resource('customers', CustomerController::class);


Route::get('/customers', [CustomerController::class, 'index']);


// ------------------ PRODUCTS ------------------
Route::resource('products', ProductController::class);
Route::get('/products/gallery', [ProductController::class, 'gallery'])->name('products.gallery');

// ✅ Bulk delete route
Route::post('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');
Route::post('gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulkDelete');
//multi product routes
//multi product routes

Route::get('products/create-multiple', [ProductController::class, 'createMultiple'])->name('products.createMultiple');
Route::post('products/store-multiple', [ProductController::class, 'store-multiple'])->name('products.store-multiple');






Route::prefix('products')->group(function () {
    Route::get('/solarsys-energy', [ProductController::class, 'solarsysEnergy'])->name('products.solarsys');
    Route::get('/agrosys-farm-fresh', [ProductController::class, 'agrosysFarmFresh'])->name('products.agrosys');
    Route::get('/gspv-new-energy-bd', [ProductController::class, 'gspvNewEnergyBd'])->name('products.gspv');
    Route::get('/sys-express', [ProductController::class, 'sysExpress'])->name('products.sysExpress');
    Route::get('/insys-international', [ProductController::class, 'insysInternational'])->name('products.insys');
});

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');



Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::get('/gallery/create-multiple', [GalleryController::class, 'createMultiple'])->name('gallery.create-multiple');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::resource('gallery', GalleryController::class);
Route::get('/create-multiple', [GalleryController::class, 'createMultiple'])->name('gallery.createMultiple');
Route::post('/store-multiple', [GalleryController::class, 'storeMultiple'])->name('gallery.storeMultiple');

Route::get('/products/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/products/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/products/gallery', [GalleryController::class, 'store'])->name('gallery.store');

Route::delete('/gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulkDelete');

Route::delete('/products/gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulkDelete');

Route::resource('gallery', GalleryController::class)->except(['show']);

Route::get('/user-gallery', [App\Http\Controllers\GalleryController::class, 'userGallery'])->name('user.gallery');


use App\Http\Controllers\ServiceController;

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::prefix('services')->group(function () {
    Route::view('/solarsys-energy', 'services.solarsys');
    Route::view('/agrosys-farm-fresh', 'services.agrosys');
    Route::view('/gspv-new-energy-bd', 'services.gspv');
    Route::view('/sys-express', 'services.sys');
    Route::view('/insys-international', 'services.insys');
});
