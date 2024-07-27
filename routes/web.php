<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\PaymentController;

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment/transaction', [PaymentController::class, 'createTransaction'])->name('payment.transaction');
Route::post('/payment/notification', [PaymentController::class, 'notificationHandler'])->name('payment.notification');
