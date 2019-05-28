<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return $this->showAll($usuarios);
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
            'usuario'=>'required',
            'email'=>'email|unique:users',
            'password'=>'required|min:6|confirmed',
        ];

        $this->validate($request,$rules);

        $campos = $request->all();
        $campos['password'] = bcrypt($request->password);
        $usuario = User::create($campos);

        return $this->showOne($usuario,201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne($user);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        /*$rules = [
            'email'=>'email|unique:users,email,'.$user->id,
            'password'=>'min:6|confirmed',
        ];*/

        //$this->validate($request,$rules);

        if($request->has('usuario'))
        {
            $user->usuario = $request->usuario;
        }

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        if($request->has('nombre'))
        {
            $user->nombre = $request->nombre;
        }
        if($request->has('paterno'))
        {
            $user->paterno = $request->paterno;
        }

        if($request->has('materno'))
        {
            $user->materno = $request->materno;
        }

        if($request->has('unidad'))
        {
            $user->unidad = $request->unidad;
        }
        if($request->has('cargo'))
        {
            $user->cargo = $request->cargo;
        }

        if($request->has('telefono_fijo'))
        {
            $user->telefono_fijo = $request->telefono_fijo;
        }

        if($request->has('telefono_movil'))
        {
            $user->telefono_movil = $request->telefono_movil;
        }

        if($request->has('email'))
        {
            $user->email = $request->email;
        }

        if($request->has('vigente'))
        {
            $user->vigente = $request->vigente;
        }

        if(!$user->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $user->save();

        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->showOne($user);
    }
}
