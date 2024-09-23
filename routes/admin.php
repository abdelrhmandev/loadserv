<?php

use App\Http\Controllers\backend\DashboardController;
Route::get('/', 'DashboardController@index')->name('dashboard');


Route::resource('admins', AdminController::class)->except('show');
Route::delete('admins/destroy/all', 'AdminController@destroyMultiple')->name('admins.destroyMultiple');



Route::resource('invoices', InvoiceController::class)->except('show');
Route::delete('invoices/destroy/all', 'InvoiceController@destroyMultiple')->name('invoices.destroyMultiple');


Route::get('/invoice/log', 'InvoiceController@log')->name('invoices.log');


Route::resource('permissions', PermissionController::class)->except('show');
Route::delete('permissions/destroy/all', 'PermissionController@destroyMultiple')->name('permissions.destroyMultiple');


Route::resource('roles', RoleController::class)->except('show');
Route::delete('roles/destroy/all', 'RoleController@destroyMultiple')->name('roles.destroyMultiple');


Route::resource('invoices', InvoiceController::class)->except('show');
Route::delete('invoices/destroy/all', 'InvoiceController@destroyMultiple')->name('invoices.destroyMultiple');


?>


