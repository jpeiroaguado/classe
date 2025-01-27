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
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //Excepcións mes comuns
        //No roba el model
        $exceptions->render(function(ModelNotFoundException $e, Request $request){
            if($request->is('api*')){
                return response()->json(['err'=>'Recurso no encontrado',
                                        'descripcion'=>$e->getMessage(), 404]);
            }
        });
        //No troba el recurs http
        $exceptions->render(function(NotFoundHttpException $e, Request $request){
            if($request->is('api*')){
                return response()->json(['err'=>'Recurso no encontrado',
                                        'descripcion'=>$e->getMessage(), 404]);
            }
        });
        $exceptions->render(function(ValidationException $e, Request $request){
            if($request->is('api*')){
                return response()->json(['err'=>'Datos no válidos',
                                        'descripcion'=>$e->getMessage(), 400]);
            }
        });
        $exceptions->render(function(\Throwable $e, Request $request){
            if($request->is('api*')){
                return response()->json(['err'=>'Error interno',
                                        'descripcion'=>$e->getMessage(), 500]);
            }
        });
    })->create();
