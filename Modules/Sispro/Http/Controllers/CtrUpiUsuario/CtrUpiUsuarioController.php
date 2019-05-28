<?php

namespace Modules\Sispro\Http\Controllers\CtrUpiUsuario;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\CtrUpiUsuario;

class CtrUpiUsuarioController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $usuarios = CtrUpiUsuario::all();
        return $this->showAll($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        CtrUpiUsuario::where('usuario',$campos['id'])->delete();

        foreach ($campos['usuario_asignado'] as $value) {
            $usuario = new CtrUpiUsuario;
            $usuario->usuario = $campos['id'];
            $usuario->usuario_asignado = $value;
            $usuario->save();
        }

        $usuarios = CtrUpiUsuario::all();
        return $this->showAll($usuarios);
    }

    
}
