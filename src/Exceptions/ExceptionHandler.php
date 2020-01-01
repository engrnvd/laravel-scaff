<?php

namespace Naveed\Scaff\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as Handler;
use Illuminate\Validation\ValidationException;

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
        if ($exception instanceof ValidationException) {
            return parent::render($request, $exception);
        }
        $message = $exception->getMessage() ? $exception->getMessage() : $exception->getTraceAsString();
        $code = $exception->getCode() ? $exception->getCode() : 400;
        \Log::error($exception->getMessage() . "\n" . $exception->getTraceAsString());
        return response($message, $code);
    }
}
