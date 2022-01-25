<?php

use App\Mail\WelcomeMail;
use App\Mail\PasswordChangedMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\PricingController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyLoyaltyController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('about.index');
})->name('welcome');

Route::get('/faq', [AboutController::class, 'faq'])->name('faq');

Route::get('/tests', function () {
    return (new PasswordChangedMail)->markdown('emails.password_changed');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/app-users', [DashboardController::class, 'appUsers'])->name('app-users');
Route::middleware(['auth:sanctum', 'verified'])->get('/set-admin/{user_id}', [DashboardController::class, 'setAdmin']);
Route::middleware(['auth:sanctum', 'verified'])->get('/remove-admin/{user_id}', [DashboardController::class, 'removeAdmin']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/deleteuser/{user_id}', [DashboardController::class, 'deleteUser']);



// CMS controllers CRUD

Route::prefix('admin')->group(function () {
    Route::resource('points', PointController::class);

});

Route::resource('/categories', CategoryController::class);

Route::resource('/cms', CMSController::class);
Route::resource('/coupons', CouponController::class);
Route::resource('points', PointController::class);
Route::resource('stamps', StampController::class);


// My loyalty redeem & add points logic

Route::post('coupons/addtomy/{coupon_id}', [CouponController::class, 'addToMyCoupons'])->name('addToMyCoupons');
Route::put('coupons/confirmredeem/{slug}', [CouponController::class, 'confirmRedeem']);
Route::put('coupons/redeem/{coupon_id}/{user_id}', [CouponController::class, 'redeem'])->name('redeem');
Route::delete('coupons/removefrommy/{coupon_id}', [CouponController::class, 'removeFromMy'])->name('removeFromMyCoupons');


Route::post('points/addtomy/{point_id}', [PointController::class, 'addToMyPoints'])->name('addToMyPoints');
Route::put('points/confirmaddpoints/{slug}', [PointController::class, 'confirmAddPoints']);
Route::put('points/addpoints/{point_id}/{user_id}', [PointController::class, 'addPoints'])->name('addPoints');
Route::delete('points/removefrommy/{point_id}', [PointController::class, 'removeFromMy'])->name('removeFromMyPoints');




Route::post('stamps/addtomy/{stamp_id}', [StampController::class, 'addToMyStamps'])->name('addToMyStamps');
Route::put('stamps/confirmaddstamps/{slug}', [StampController::class, 'confirmAddStamps']);
Route::put('stamps/addstamps/{point_id}/{user_id}', [StampController::class, 'addStamps'])->name('addStamps');
Route::delete('stamps/removefrommy/{stamp_id}', [StampController::class, 'removeFromMy'])->name('removeFromMyStamps');

Route::post('venues/addtomy/{venue_id}', [VenueController::class, 'addToMyVenues'])->name('addToMyVenues');
Route::delete('venues/removefrommy/{venue_id}', [VenueController::class, 'removeFromMy'])->name('removeFromMyVenues');

// Mailing
Route::post('points/mail/{id}', [PointController::class, 'confirmSendPointByMail']);
Route::post('stamps/mail/{id}', [StampController::class, 'confirmSendStampByMail']);
Route::post('coupons/mail/{id}', [CouponController::class, 'confirmSendCouponByMail']);

// Venues

Route::resource('/venues', VenueController::class);



// Info pages controllers

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/#whitelabelsolution', [AboutController::class, 'whiteLabelSolution'])->name('whiteLabelSolution');
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

Route::post('/subscriptions/webhook.php', [PricingController::class, 'webhook']);





