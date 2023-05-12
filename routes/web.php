<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\FilterController;

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

Route::get('star', [UserController::class, 'home']);

// Admin
Route::controller(AdminController::class)->prefix('admin')->group(function () {
    // admin authentication
    Route::get('login', "showLogin");
    Route::post('admin-login-done', 'login');
    Route::get('login-done', "login");

    // admin pages
    Route::get('/employee', 'employee')->middleware('admin.auth');
    Route::get('/forms', 'form')->middleware('admin.auth');
    Route::get('/gallery', 'gallery')->middleware('admin.auth');
    Route::get('/profile', 'profile')->middleware('admin.auth');
    Route::get('/table', 'table')->middleware('admin.auth');
    Route::get('/dashboard', 'dash')->middleware('admin.auth');
    Route::get('/form', 'form')->middleware('admin.auth');
    Route::get('/site-setting','site')->middleware('admin.auth');
    Route::post('/profile','profile')->middleware('admin.auth');
    Route::post('/table','table')->middleware('admin.auth');
    Route::post('/site','siteSetting')->middleware('admin.auth');
    Route::get('/logout', "logout")->middleware('admin.auth');

    // profile edit
    Route::post('/update', 'profileUpdate');
    // upload and edit
    Route::post('/upload','upload');
    Route::post('/change', 'change');

    // hire and fire
    Route::post('/fire', 'fire');
    Route::post('/hire', 'hire');
    // search
    Route::post('/search', 'search');
});

// User Page
Route::controller(UserController::class)->prefix("star")->group(function(){
    Route::get('/foods', 'foods');
    Route::get('/fruits-vegetables', 'fv');
    Route::get('/beverage', 'beverage');
    Route::get('/electronics', 'electronics');
    Route::get('/furniture', 'furniture');
    Route::get('/dairy', 'dairy');
    Route::get('/meat-fish', 'mf');
    Route::get('/household-cleaner', 'house');
    Route::get('/beauty-health', 'health');
    Route::get('/purchase', function (){
        abort(404);
    });
    Route::get('/gallery', function(){
        return view('Pages.gallery');
    });
    
    Route::post('/purchase', 'purchase');
    // payment routes
    Route::get('payment', function(){
        abort(404);
    });
    Route::post('payment', 'payment');
    Route::post('/pay', 'pay');
    // dashboard routes
    Route::get('/dashboard', 'dashboard')->middleware('user.auth');
    Route::get('/dashboard/profile', 'profile')->middleware('user.auth');
    Route::get('/dashboard/orders', 'orders')->middleware('user.auth');
    Route::get('/dashboard/logout', 'logout')->middleware('user.auth');
    Route::post('/dashboard/update', 'update')->middleware('user.auth');
});

// User account
Route::controller(AccountController::class)->prefix("account")->group(function () {
    Route::get('register', 'create');
    Route::post('/register-done', 'store');
    Route::get('login', 'show');
    Route::post('/login-done', 'login');
    Route::get('/account-logout', 'logout');
});

// Delivery authentication
Route::controller(DeliveryController::class)->prefix("star")->group(function () {
    Route::get('delivery-login', 'showLogin');
    Route::post('delivery-login-done', 'login');
    Route::get('/delivery', 'delivery')->middleware('delivery.auth');
    Route::get('delivery-logout', "logout")->middleware('delivery.auth');
    Route::post('/delivery/status', 'status');
    Route::get('/delivery/profile', 'profile')->middleware('delivery.auth');
    Route::post('/profile', 'update')->middleware('delivery.auth');
});

// Searching Products
Route::get('search/{id}', [SearchController::class, 'search'])->name('search');

// Product Search for Editing
Route::get('find/{id}', [FindController::class, 'productFind']);
// Route::get('find/{id}', [SearchController::class, 'find'])->name('find');

// Filter
Route::get('star/filter/{id}',[FilterController::class, 'filter'], function ($id){});
