<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->renderable(function(NotFoundHttpException $e, $request){
            if ($request->is('api/*')) {
                return response()->json(['message' => 'The requested resource was not found.'], 404);
            }
        });

        $exceptions->renderable(function(MethodNotAllowedHttpException $e){
            return response()->json([
                'message'=>'The request method is not supported for this route.'
            ], 405);
        });

    })->create();
