<?php

namespace App\Exceptions;

use App\Helper\ValueObject\Module;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Laravel\Passport\Exceptions\MissingScopeException;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use TypeError;
use Whoops\Exception\ErrorException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof TypeError && str_contains($e->getMessage(), 'Illuminate\Validation\Factory::make():')) {
            $error = new Error(
                request: $request,
                code: Response::HTTP_BAD_REQUEST,
                error: trans("The server cannot or will not process the request due to an apparent client error.")
            );

            return response($error->toArray(), Response::HTTP_BAD_REQUEST);
        }

        if ($e instanceof ModelNotFoundException) {
            $replacement = [
                'id'    => collect($e->getIds())->first(),
                'model' => Module::replacement(Arr::last(explode('\\', $e->getModel()))),
            ];

            $error = new Error(
                request: $request,
                code: Response::HTTP_NOT_FOUND,
                error: trans("No query results for model :model :id", $replacement)
            );

            return response($error->toArray(), Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ErrorException || $e instanceof MissingScopeException) {
            $error = new Error(
                request: $request,
                code: Response::HTTP_UNAUTHORIZED,
                error: trans($e->getMessage())
            );

            return response($error->toArray(), Response::HTTP_UNAUTHORIZED);
        }

        return parent::render($request, $e);
    }
}
