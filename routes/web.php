<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TypeOfBrandController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkAdminLogin;
use App\Models\Category;
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

// PUBLIC

Route::get('/home', [PublicController::class, 'home'])->name('home');
Route::get('/shop', [PublicController::class, 'shop'])->name('shop');
Route::post('/shop', [PublicController::class, 'shop'])->name('filterProduct');
Route::get('/productDetail/{id}', [PublicController::class, 'productDetail'])->name('productDetail');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/search', [PublicController::class, 'search'])->name('search');

// AUTH
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//CLIENT

Route::group(['middleware' => ['logged'], 'prefix' => 'clients', 'as' => 'clients.'], function () {
    Route::get('/cart', [PublicController::class, 'cart'])->name('cart');
    Route::post('/addToCart', [PublicController::class, 'addToCart'])->name('addToCart');
    Route::post('/incrementQuantity/{id}', [PublicController::class, 'incrementQuantity'])->name('incrementQuantity');
    Route::post('/decrementQuantity/{id}', [PublicController::class, 'decrementQuantity'])->name('decrementQuantity');
    Route::get('/checkout', [PublicController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [PublicController::class, 'payment'])->name('payment');
    Route::post('/deleteCart/{id}', [PublicController::class, 'deleteCart'])->name('deleteCart');
});

//ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware' => ['auth:web', 'role'], 'prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');

    Route::get('/add', [ProductController::class, 'add'])->name('add');

    Route::post('/add', [ProductController::class, 'postAdd'])->name('postAdd');

    Route::get('/edit/{id}', [ProductController::class, 'getEdit'])->name('edit');
    Route::post('/edit', [ProductController::class, 'addDetail'])->name('addDetail');
    Route::post('/update', [ProductController::class, 'postEdit'])->name('postEdit');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    Route::get('/editDetail/{id}', [ProductController::class, 'getEditDetail'])->name('getEditDetail');
    Route::post('/editDetail/{id}', [ProductController::class, 'postEditDetail'])->name('postEditDetail');
});

Route::group(['middleware' => ['role'], 'prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');

    Route::get('/add', [CategoryController::class, 'add'])->name('add');

    Route::post('/add', [CategoryController::class, 'postAdd'])->name('postAdd');

    Route::get('/edit/{id}', [CategoryController::class, 'getEdit'])->name('edit');

    Route::post('/update', [CategoryController::class, 'postEdit'])->name('postEdit');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
});

Route::group(['middleware' => ['role'], 'prefix' => 'other', 'as' => 'other.'], function () {
    Route::get('/', [OtherController::class, 'index'])->name('index');
    Route::post('/addBrand', [OtherController::class, 'postAddBrand'])->name('postAddBrand');
    Route::post('/addColor', [OtherController::class, 'postAddColor'])->name('postAddColor');
    Route::post('/addTypeBrand', [OtherController::class, 'postAddTypeOfBrand'])->name('postAddTypeOfBrand');
    Route::post('/addCategory', [OtherController::class, 'postAddCategory'])->name('postAddCategory');
    Route::post('/addSize', [OtherController::class, 'postAddSize'])->name('postAddSize');
});

Route::group(['middleware' => ['role'], 'prefix' => 'import', 'as' => 'import.'], function () {
    Route::get('/', [ImportController::class, 'view'])->name('view');
    Route::get('/add', [ImportController::class, 'add'])->name('add');
    Route::post('/add', [ImportController::class, 'postAdd'])->name('postAdd');
    Route::post('/save', [ImportController::class, 'save'])->name('save');
    Route::get('/index', [ImportController::class, 'index'])->name('index');
    Route::get('/delete/{id}', [ImportController::class, 'delete'])->name('delete');
});

Route::group(['middleware' => ['role'], 'prefix' => 'provider', 'as' => 'provider.'], function () {
    Route::get('/', [ProviderController::class, 'index'])->name('index');
    Route::get('/add', [ProviderController::class, 'add'])->name('add');
    Route::post('/add', [ProviderController::class, 'postAdd'])->name('postAdd');
    Route::get('/delete/{id}', [ProviderController::class, 'delete'])->name('delete');
});

Route::group(['middleware' => ['role'], 'prefix' => 'payment', 'as' => 'payment.'], function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [PaymentController::class, 'postEdit'])->name('postEdit');
});

Route::group(['middleware' => ['role'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/add', [UserController::class, 'getAdd'])->name('add');
    Route::post('/add', [UserController::class, 'postAdd'])->name('postAdd');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
});

Route::get('get-data/{option}', [TypeOfBrandController::class, 'getData'])->name('get.data');
