<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use Modules\Rbac\Entities\Operacion;
use App\Http\Controllers\ApiController;

class OperacionController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        //$this->middleware('auth:api');
        //$this->middleware('client_credentials')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operacion = Operacion::all();
        return $this->showAll($operacion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'operacion'=>'required',
        ];

        $this->validate($request,$rules);
        $campos = $request->all();
        $operacion = Operacion::create($campos);

        return $this->showOne($operacion,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function show(Operacion $operacione)
    {
        return $this->showOne($operacione);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacion $operacion)
    {
        if($request->has('operacion'))
        {
            $operacion->operacion = $request->operacion;
        }

        if($request->has('descripcion'))
        {
            $operacion->descripcion = $request->descripcion;
        }

        if($request->has('vigente'))
        {
            $operacion->vigente = $request->vigente;
        }

        if(!$operacion->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $operacion->save();

        return $this->showOne($operacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operacion  $operacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operacion $operacion)
    {
        //
    }
}
