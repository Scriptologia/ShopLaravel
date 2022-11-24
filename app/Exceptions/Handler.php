<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\InvalidOrderException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
//        dd(request()->is('/admin/products'));
        $this->renderable(function (InvalidOrderException $e, $request) {
            if(true) {
                return response()->view('admin.errors.404', [], 500);
            }else {
                return response()->view('errors.404', [], 500);
            }
        });
        $this->reportable(function (Throwable $e) {
            if(true) {
                return response()->view('admin.errors.404', [], 500);
            }else {
                return response()->view('errors.404', [], 500);
            }
        });
    }
//    protected function renderHttpException(HttpException $e) {
//
//        $status = $e->getStatusCode();
////dd(Request::is('/admin/*'));
//        if (true) {
//            return response()->view("admin.errors.{$status}", ['exception' => $e], $status, $e->getHeaders());
//        } else {
//            return response()->view("errors.{$status}", ['exception' => $e], $status, $e->getHeaders());
//        }
//
//    }
}
