<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use Modules\Rbac\Entities\Rol;
use App\Http\Controllers\ApiController;

class RolController extends ApiController
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
        $roles = Rol::all();
        return $this->showAll($roles);
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
            'rol'=>'required',
        ];

        $this->validate($request,$rules);

        $campos = $request->all();
        $rol = Rol::create($campos);

        return $this->showOne($rol,201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $role)
    {
        return $this->showOne($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $role)
    {
        if($request->has('rol'))
        {
            $role->rol = $request->rol;
        }

        if($request->has('descripcion'))
        {
            $role->descripcion = $request->descripcion;
        }

        if(!$role->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $role->save();

        return $this->showOne($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $role)
    {
        $role->delete();

        return $this->showOne($role);
    }
}
