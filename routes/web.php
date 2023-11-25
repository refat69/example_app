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
use App\Http\Controllers\categoryController;
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
Route::get('/category/all', [categoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [categoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [categoryController::class, 'Edit']);
Route::post('/category/update/{id}', [categoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [categoryController::class, 'SoftDelete']);
//for brand controller
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);
//multi image route
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');
//slider route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);
//Home About All Route
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/about/update/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);
//Service Page Route
Route::get('/home/service', [ServiceController::class, 'HomeService'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'AddService'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'EditService']);
Route::post('/service/update/{id}', [ServiceController::class, 'UpdateService']);
Route::get('/service/delete/{id}', [ServiceController::class, 'DeleteService']);
//Portfolio Page Route
Route::get('/portfolio', [PortfolioController::class, 'Portfolio'])->name('portfolio');
//admin Contact Page Route
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/admin/contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::post('/admin/contact/update/{id}', [ContactController::class, 'UpdateContact']);
Route::get('/admin/contact/delete/{id}', [ContactController::class, 'DeleteContact']);
//Admin Contact Page Route
Route::get('/contacts', [ContactController::class, 'Contacts'])->name('contacts');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');



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
