<?php

namespace Modules\Sispro\Http\Controllers\Entidad;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatEntidad;

class EntidadController extends ApiController
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
        $entidades = DatEntidad::where('vigente','1')
        //->where('tipo_entidad_id','2')
        ->orderBy('entidad', 'asc')
        ->get();
        return $this->showAll($entidades);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatEntidad $entidad)
    {
        return $this->showOne($entidad);
    }
}
