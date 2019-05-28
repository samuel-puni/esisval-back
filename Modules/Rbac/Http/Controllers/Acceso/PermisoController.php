<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use Modules\Rbac\Entities\Permiso;
use App\Http\Controllers\ApiController;

class PermisoController extends ApiController
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
        $permisos = Permiso::all();
        return $this->showAll($permisos);
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
            'permiso'=>'required',
        ];

        $this->validate($request,$rules);
        $campos = $request->all();
        $permiso = Permiso::create($campos);

        return $this->showOne($permiso,201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function show(Permiso $permiso)
    {
        return $this->showOne($permiso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permiso $permiso)
    {
        if($request->has('permiso'))
        {
            $permiso->permiso = $request->permiso;
        }

        if($request->has('descripcion'))
        {
            $permiso->descripcion = $request->descripcion;
        }

        if($request->has('vigente'))
        {
            $permiso->vigente = $request->vigente;
        }

        if(!$permiso->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $permiso->save();

        return $this->showOne($permiso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permiso $permiso)
    {
        $permiso->delete();

        return $this->showOne($permiso);
    }
}
