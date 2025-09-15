<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AboutController;
// routes/web.php
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\navProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminLoginController;

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
// ------------------ PRODUCTS ------------------
// resource (for normal CRUD)
Route::resource('products', ProductController::class);

// extra routes for multi create/store
Route::get('products/create-multiple', [ProductController::class, 'createMultiple'])
    ->name('products.create-multiple');

Route::post('products/store-multiple', [ProductController::class, 'storeMultiple'])
    ->name('products.store-multiple');





Route::get('products/create-multiple', [ProductController::class, 'createMultiple'])->name('products.create-multiple');
Route::post('/store-multiple', [ProductController::class, 'storeMultiple'])->name('products.storeMultiple');






Route::prefix('services')->group(function () {
    Route::get('/solarsys', [ServiceController::class, 'solarsys'])->name('services.solarsys');
    Route::get('/agrosys', [ServiceController::class, 'agrosys'])->name('services.agrosys');
    Route::get('/gspv', [ServiceController::class, 'gspv'])->name('services.gspv');
    Route::get('/sys', [ServiceController::class, 'sys'])->name('services.sys');
    Route::get('/insys', [ServiceController::class, 'insys'])->name('services.insys');
});

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');



Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/navProduct', [navProductController::class, 'index'])->name('navProduct');
Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::get('/gallery/create-multiple', [GalleryController::class, 'createMultiple'])->name('gallery.create-multiple');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::resource('gallery', controller: GalleryController::class);
Route::get('/create-multiple', [GalleryController::class, 'createMultiple'])->name('gallery.createMultiple');
Route::post('/store-multiple', [GalleryController::class, 'storeMultiple'])->name('gallery.storeMultiple');

Route::get('/products/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/products/gallery', [GalleryController::class, 'store'])->name('gallery.store');

Route::delete('/gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulkDelete');

Route::delete('/products/gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulkDelete');

Route::resource('gallery', GalleryController::class)->except(['show']);

Route::get('/user-gallery', [App\Http\Controllers\GalleryController::class, 'userGallery'])->name('user.gallery');


// Admin-only routes




Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/admin/contacts', [ContactController::class, 'list'])->name('contacts.list');
