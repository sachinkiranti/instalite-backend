<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Throwable;
use Illuminate\Http\Request;
use Foundation\Mixins\HasApiResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{

    use HasApiResponse;

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
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $e, Request $request) {
            return $this->handleExceptions($e, $request);
        });
    }

    private function handleExceptions(Throwable $e, Request $request)
    {
        if (
            $e instanceof ModelNotFoundException ||
            $e instanceof NotFoundHttpException
        ) {
            return $this->responseError(
                null,
                Response::HTTP_NOT_FOUND,
                'Not Found !'. $e->getMessage(),
                null
            );
        }

        if ( $e instanceof MethodNotAllowedHttpException ) {
            return $this->responseError(
                null,
                Response::HTTP_NOT_FOUND,
                'Method Not Found !'. $e->getMessage(),
                null
            );
        }

        if($e instanceof AuthenticationException ){

            return $this->responseError(
                null,
                Response::HTTP_UNAUTHORIZED,
                'The request is unauthorized.',
                'unauthorized'
            );

        }
    }
}
