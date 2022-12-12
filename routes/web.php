<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MakePaymentController;




Route::get('/', [ArtistController::class, 'displayArtistes'])->name('home');




Route::get('/system-user', function(){
    return view('auth.register2');
});

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/artiste', [ArtistController::class, 'viewArtistes'])->name('artistes');
    Route::get('/artiste-edit/{slug}', [ArtistController::class, 'editArtiste'])->name('edit-artiste');
    Route::post('/artiste-update/{slug}', [ArtistController::class, 'updateArtiste'])->name('update-artiste');
    Route::get('/artiste/{slug}', [ArtistController::class, 'deleteArtiste'])->name('delete-artiste');

//    Route::get('/booking/{artiste}', function() {return view('auth.register');})->name('booking');
    Route::get('/booking/{artiste}', [AppointmentController::class, 'bookAppointment'])->name('booking');
    Route::post('/book/{id}', [AppointmentController::class, 'saveAppointment'])->name('book');
    Route::post('/upload-artiste', [ArtistController::class, 'uploadArtiste'])->name('upload-artiste');
    Route::get('/appointment-approve/{id}', [AppointmentController::class, 'approveAppointment'])->name('appointment-approve');
    Route::get('/appointment-unapprove/{id}', [AppointmentController::class, 'unapproveAppointment'])->name('appointment-unapprove');
    Route::get('/appointment-cancel/{id}', [AppointmentController::class, 'cancelAppointment'])->name('appointment-cancel');
    Route::get('/appointment-delete/{id}', [AppointmentController::class, 'deleteAppointment'])->name('appointment-delete');
});






Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

// Paystack Payment
Route::post('/confirm', [MakePaymentController::class, 'confirm_payment'])->name('confirm');
Route::post('/pay', [MakePaymentController::class, 'make_payment'])->name('pay');
Route::get('/payment/callback', [MakePaymentController::class, 'payment_callback'])->name('pay.callback');


Route::get('/checkout', function(){ return view('payments.checkout');});

// Paystack Payment Callback
//Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);


Route::view('/legal', 'terms')->name('legal');
//Route::view('/privacy', 'privacy')->name('privacy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', DashboardController::class)->name('dashboard');

