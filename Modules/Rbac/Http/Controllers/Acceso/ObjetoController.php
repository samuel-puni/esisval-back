<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use Modules\Rbac\Entities\Objeto;
use App\Http\Controllers\ApiController;

class ObjetoController extends ApiController
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
        $objeto = Objeto::all();
        return $this->showAll($objeto);
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
            'objeto'=>'required',
        ];

        $this->validate($request,$rules);
        $campos = $request->all();
        $objeto = Objeto::create($campos);

        return $this->showOne($objeto,201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function show(Objeto $objeto)
    {
        return $this->showOne($objeto);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objeto $objeto)
    {
        if($request->has('objeto'))
        {
            $objeto->objeto = $request->objeto;
        }

        if($request->has('descripcion'))
        {
            $objeto->descripcion = $request->descripcion;
        }

        if($request->has('vigente'))
        {
            $objeto->vigente = $request->vigente;
        }

        if(!$objeto->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $objeto->save();

        return $this->showOne($objeto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objeto $objeto)
    {
        $objeto->delete();

        return $this->showOne($objeto);
    }
}
