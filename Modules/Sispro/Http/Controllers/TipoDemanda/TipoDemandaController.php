<?php

namespace Modules\Sispro\Http\Controllers\TipoDemanda;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ClaTipoDemanda;

class TipoDemandaController extends ApiController
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
        $tipodemanda = ClaTipoDemanda::where('vigente','1')
        ->orderBy('tipo_demanda', 'asc')
        ->get();
        return $this->showAll($tipodemanda);
    }
}
