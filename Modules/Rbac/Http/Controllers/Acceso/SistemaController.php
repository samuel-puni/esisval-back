<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use Modules\Rbac\Entities\Sistema;
use App\Http\Controllers\ApiController;

class SistemaController extends ApiController
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
        //dd(Auth::User());
        $sistemas = Sistema::all();
        return $this->showAll($sistemas);
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
            'sistema'=>'required',
        ];

        $this->validate($request,$rules);
        $campos = $request->all();
        $sistema = Sistema::create($campos);

        return $this->showOne($sistema,201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function show(Sistema $sistema)
    {
        return $this->showOne($sistema);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sistema $sistema)
    {
        if($request->has('sistema'))
        {
            $sistema->sistema = $request->sistema;
        }

        if($request->has('descripcion'))
        {
            $sistema->descripcion = $request->descripcion;
        }

        if($request->has('vigente'))
        {
            $sistema->vigente = $request->vigente;
        }

        if(!$sistema->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $sistema->save();

        return $this->showOne($sistema);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sistema $sistema)
    {
        $sistema->delete();

        return $this->showOne($sistema);
    }
}
