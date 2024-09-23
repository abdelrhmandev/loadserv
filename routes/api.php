<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\backend\LoginController;
use App\Http\Controllers\Api\backend\InvoiceController;

///////////////////////////////////////////Admin End Points ///////////////////////////
Route::group(['namespace' => 'Api', 'middleware' => 'api'], function () {
    Route::group(['prefix' => 'v1', 'namespace' => 'backend'], function () {
        Route::post('/login', [LoginController::class, 'login']);
        Route::get('/invoices', [InvoiceController::class, 'index']);
        Route::post('/invoices/store', [InvoiceController::class, 'store']);
        Route::put('/invoices/update/{id}', [InvoiceController::class, 'update']);
        Route::delete('/invoices/destroy/{id}', [InvoiceController::class, 'destroy']);
    });
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
