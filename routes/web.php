<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\MyLoyaltyController;

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
Route::put('coupons/confirmredeem/{slug}', [CouponController::class, 'confirmRedeem']);
Route::get('coupons/redeem/{coupon_id}/{user_id}', [CouponController::class, 'redeem'])->name('redeem');

Route::post('points/addtomy/{point_id}', [PointController::class, 'addToMyPoints'])->name('addToMyPoints');
Route::put('points/confirmaddpoints/{slug}', [PointController::class, 'confirmAddPoints']);
Route::get('points/addpoints/{point_id}/{user_id}', [PointController::class, 'addPoints'])->name('addPoints');

// Venues

Route::resource('/venues', VenueController::class);


// Info pages controllers

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/myloyalties/{user_id}', [MyLoyaltyController::class, 'index'])->name('myloyalties');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::get('/loyalties', [LoyaltyController::class, 'index'])->name('loyalty');

Route::resource('/loyalty', LoyaltyController::class);

// Stripe 
Route::get('/stripe', function () {
    return view('pricing/checkout');
});
Route::get('/success.html', [PricingController::class, 'success']);

Route::get('/cancel.html', [PricingController::class, 'cancel']);

Route::post('/create-checkout-session.php', [PricingController::class, 'createCheckoutSession']);
Route::post('/create-portal-session.php', [PricingController::class, 'createPortalSession']);
// Route::post('/create-checkout-session.php', function () {
//     return view('pricing/create-checkout-session');
// });

Route::get('/subscriptions/webhook.php', [[PricingController::class, 'webhook']]);



