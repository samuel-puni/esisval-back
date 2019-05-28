<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;
use Asm89\Stack\CorsService;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception,$request);
        }

        if ($exception instanceof ModelNotFoundException) {
            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("No existe ninguna instancia de {$modelo} con el id especificado",404);
        }
        
        if ($exception instanceof AuthenticationException) {
            return $this->errorResponse('No autenticado.', 401);
        } 

        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse("No posee permisos para ejecutar esta acción",403);
        } 

        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse("No se encontro la URL especificada",404);
        } 

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse("El método especificado en la petición no es válido",405);
        }

        if ($exception instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(),$exception->getStatusCode());
        } 

        
        if ($exception instanceof QueryException) {
            $codigo = $exception->errorInfo[1];
            if($codigo == 1451)
            {
                return $this->errorResponse("No se puede eliminar de forma permanente el recurso porque está relacionado con algún otro",409);       
            }

        } 

        if ($exception instanceof TokenMismatchException) {
            return redirect()->back()->withInput($request->input());
        } 

        if (config('app.debug')) {
            return $this->errorResponse("Falla inesperada. Intente luego",500);        
        }

        return parent::render($request, $exception);
        
        
        
    }

    public function HandleException($request, Exception $exception)
    {
            
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();
        return $this->errorResponse($errors, 422);
    }

}
