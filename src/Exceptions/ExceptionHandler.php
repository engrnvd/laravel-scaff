<?php

namespace Naveed\Scaff\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as Handler;

class ExceptionHandler extends Handler
{
    protected $dontReport = [];
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        $code = $exception->getCode() ? $exception->getCode() : 400;
        $message = $exception->getMessage() ? $exception->getMessage() : $exception->getTraceAsString();
        return response($message, $code);
    }
}
