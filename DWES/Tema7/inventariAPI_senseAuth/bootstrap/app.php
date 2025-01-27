<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ModelNotFoundException $e, Request $request) {
            if ($request->is('api*')) {
                return response()->json([
                    'error' => 'Recurso no encontrado',
                    'mensaje' => $e->getMessage()
                ], 404);
            }
        });
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api*')) {
                return response()->json([
                    'error' => 'Recurso no encontrado',
                    'mensaje' => $e->getMessage()
                ], 404);
            }
        });
        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api*')) {
                return response()->json([
                    'error' => 'Datos no válidos',
                    'mensaje' => $e->getMessage()
                ], 400);
            }
        });
        $exceptions->render(function (\Throwable $e, Request $request) {
            if ($request->is('api*')) {
                return response()->json([
                    'error' => 'Error interno',
                    'mensaje' => $e->getMessage()
                ], 500);
            }
        });
    })->create();
