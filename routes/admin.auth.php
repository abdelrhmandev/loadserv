<?php

Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::controller(AdminController::class)->group(function () {
    Route::get('/{id}/EditAdminPassword', 'editpassword')->name('admins.editpassword');
    Route::put('update/AdminPassword', 'updatepassword')->name('admins.updatepassword');
});
######################### Start Profile ##########################
Route::group(['prefix' => 'profile'], function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('profile');
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::put('update', 'update')->name('profile.update');
        Route::get('/edit/password', 'editpassword')->name('profile.editpassword');
        Route::put('update/password', 'updatepassword')->name('profile.updatepassword');
    });
});
######################### End Profile ##########################
?>
