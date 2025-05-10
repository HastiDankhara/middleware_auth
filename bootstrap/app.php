<?php

use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // middleware rename
            $middleware->alias([
                'IsUserValid' => ValidUser::class,
            ]);

        // middleware groups (appendToGroup)
            // $middleware->appendToGroup('web', [
            //     ValidUser::class,
            //     TestUser::class,
            // ]);
        
        // middleware groups (prependToGroup)
            // $middleware->prependToGroup('web', [
            //     ValidUser::class,
            //     TestUser::class,
            // ]);

        // global middleware
        // $middleware->append(TestUser::class);
        // $middleware->use([TestUser::class,ValidUser::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
