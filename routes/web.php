<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\PricingController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// CMS controllers CRUD

Route::resource('/cms', CMSController::class);
Route::resource('/coupons', CouponController::class);
Route::resource('/points', PointController::class);

// My loyalty redeem & add points logic

Route::post('coupons/addtomy/{coupon_id}', [CouponController::class, 'addToMyCoupons'])->name('addToMyCoupons');
Route::put('coupons/redeem/{coupon_id}/{user_id}', [CouponController::class, 'redeem'])->name('redeem');


// Info pages controllers

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty');

Route::resource('/loyalty', LoyaltyController::class);

