<?php

use Illuminate\Http\Request;
use App\Events\Notifications;

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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\AppointmentController;
use App\Notifications\NewAccountSMSNotification;




Route::get('/', [ArtistController::class, 'displayArtistes'])->name('home');

Route::get('verify-payment/{reference}', [PaymentController::class, 'verify']);
Route::get('receipt/{reference}/{fname}/{lname}/{email}/{phone}/{pass}', [PaymentController::class, 'saveReceipt'])->name('receipt');


Route::get('/artiste', [ArtistController::class, 'viewArtistes'])->name('artistes');

Route::middleware(['auth:sanctum'])->group(function (){
//    Route::get('/booking/{artiste}', function() {return view('auth.register');})->name('booking');
    Route::get('/booking/{artiste}', [AppointmentController::class, 'bookAppointment'])->name('booking');
    Route::post('/book/{id}', [AppointmentController::class, 'saveAppointment'])->name('book');
    Route::post('/upload-artiste', [ArtistController::class, 'uploadArtiste'])->name('upload-artiste');
    Route::get('/appointment-status/{status}', [AppointmentController::class, 'approveAppointment'])->name('appointment-status');
});






Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

// Paystack Payment
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/checkout', function(){ return view('payments.checkout');});

// Paystack Payment Callback
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);


Route::view('/test', 'frontend.test')->name('test');
// Route::view('/', 'auth.login');
Route::view('/legal', 'terms')->name('legal');
Route::view('/privacy', 'privacy')->name('privacy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', DashboardController::class)->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function (){


    Route::get('/payments', function(){ return view('shopping-area');})->name('payments');
    Route::get('/organizations', function(){ return view('marketplace');});
    Route::get('/shopping-area', function(){ return view('shopping-area'); })->name('shopping-area');

    //Procurement
    Route::get('/tenders', function(){ return view('tenders.view');})->name('tenders');
    Route::get('/new-tender', function(){ return view('tenders.create');})->name('new-tender');
    Route::get('/edit-tender', function(){ return view('tenders.edit');})->name('edit-tender');
    Route::get('/tender-history', function(){ return view('tenders.history');})->name('tender-history');

    //Finance
    Route::get('/invoices', function(){ return view('invoices.list'); })->name('invoices');
    Route::get('/quotes', function(){ return view('quotes.view'); });
    Route::get('/create-invoice', function(){ return view('invoices.new'); });
    Route::get('finance-reports', function(){ return view('reports.financial-reports');})->name('reports');

    //Products
    Route::get('warehousing', function(){ return view('warehousing.overview');})->name('warehouse');
    Route::get('products', function(){ return view('products.list');})->name('products');
    Route::get('new-product', function(){ return view('products.create');})->name('new-product');
    Route::get('stock-management', function(){ return view('products.stock-management');})->name('stocks');

    //Contracts
    Route::get('/new-contract', function(){ return '';})->name('contract');

    //CRM
    Route::get('/contacts', function(){return view('crm.contacts');})->name('contacts');
    Route::get('/sms', function(){ return view('crm.sms'); });

    //Settings
    Route::get('/account-setup', function(){ return view('settings.account-setup');})->name('account_setup');
    Route::get('/upgrade', [DashboardController::class, 'accountUpgrade']);
    Route::get('/business-profiles', function(){ return view('profile.biz-profiles'); });

    Route::get('/disabled', function() { return view('disabled');})->name('account_disabled');
    Route::get('/deleted', function() { return view('disabled');})->name('account_deleted');

    Route::get('/invitation/{user}/{org}/{role}', [InvitationController::class, 'getInvidationDetails']);
});
