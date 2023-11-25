<?php

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ChangePassController;
use Illuminate\auth;


Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = DB::table('multipics')->get();
    return view('home', compact('brands'));
});
Route::get('/about', function () {
    echo "ini adalah halaman about";
});
//Category Controller
Route::get('/category/all', [CategoryController::class, 'allCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'softDelete']);
//for brand controller
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'storeBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);
//multi image route
Route::get('/multi/image', [BrandController::class, 'multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'storeImg'])->name('store.image');
//slider route
Route::get('/home/slider', [HomeController::class, 'homeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'addSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'storeSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'editSlider']);
Route::post('/slider/update/{id}', [HomeController::class, 'updateSlider']);
Route::get('/slider/delete/{id}', [HomeController::class, 'deleteSlider']);
//Home About All Route
Route::get('/home/about', [AboutController::class, 'homeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'addAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'storeAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'editAbout']);
Route::post('/about/update/{id}', [AboutController::class, 'updateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'deleteAbout']);
//Service Page Route
Route::get('/home/service', [ServiceController::class, 'homeService'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'addService'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'storeService'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'editService']);
Route::post('/service/update/{id}', [ServiceController::class, 'updateService']);
Route::get('/service/delete/{id}', [ServiceController::class, 'deleteService']);
//Portfolio Page Route
Route::get('/portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
//admin Contact Page Route
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/admin/contact', [ContactController::class, 'adminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'addContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'storeContact'])->name('store.contact');
Route::get('/admin/contact/edit/{id}', [ContactController::class, 'editContact']);
Route::post('/admin/contact/update/{id}', [ContactController::class, 'updateContact']);
Route::get('/admin/contact/delete/{id}', [ContactController::class, 'deleteContact']);
//Admin Contact Page Route
Route::get('/contacts', [ContactController::class, 'contacts'])->name('contacts');
Route::post('/contact/form', [ContactController::class, 'contactForm'])->name('contact.form');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = user::all();
        // $users = DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');
//Change Password and User Profile Route
Route::get('/user/password', [ChangePassController::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [ChangePassController::class, 'UpdatePassword'])->name('password.update');
