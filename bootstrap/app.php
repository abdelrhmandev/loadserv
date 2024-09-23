<?php
use App\Http\Middleware\AdminRedirect;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminAuthenticate;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(function () {
                    Route::middleware('admin.auth')
                    ->prefix(config('project.admin.prefixRoute'))
                    ->name('admin.')
                    ->namespace('App\Http\Controllers\backend')
                                ->group([
                            __DIR__ . '/../routes/admin.php',
                            __DIR__ . '/../routes/admin.auth.php',
                        ]);
                        Route::middleware('admin.guest')
                        ->prefix(config('project.admin.prefixRoute'))
                        ->name('admin.')
                        ->namespace('App\Http\Controllers\backend')
                                    ->group([
                                __DIR__ . '/../routes/admin.guest.php',
                            ]);
                    });
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin.guest' => AdminRedirect::class,
            'admin.auth' => AdminAuthenticate::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
