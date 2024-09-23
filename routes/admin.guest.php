<?php
Route::group(['prefix' => 'login'], function () {
    Route::controller(Auth\LoginController::class)->group(function () {
        Route::get('/', 'showLoginForm')->name('login.form');
        Route::post('/', 'login')->name('login.submit');
    });
});
#########################  End Password Reset Routes ###########################
Route::group(['prefix' => 'email'], function () {
    Route::controller(Auth\VerificationController::class)->group(function () {
        Route::get('/verify', 'show')->name('auth.verification.notice');
        Route::get('/verify/{id}/{hash}', 'verify')->name('auth.verification.verify');
        Route::get('/resend', 'resend')->name('auth.verification.resend');
    });
});

#########################  Start Password Reset Routes #########################
Route::group(['prefix' => 'password'], function () {
    Route::controller(Auth\ForgotPasswordController::class)->group(function () {
        Route::get('/reset', 'showLinkRequestForm')->name('auth.password.request');
        Route::post('/email', 'sendResetLinkEmail')->name('auth.password.email');
    });

    Route::controller(Auth\ResetPasswordController::class)->group(function () {
        Route::get('/reset/{token}', 'showResetForm')->name('auth.password.reset');
        Route::post('/reset', 'reset')->name('auth.password.update');
    });
});
?>
