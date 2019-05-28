<?php

namespace Modules\Sispro\Http\Controllers\SectorEconomico;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ViewSectorEconomico;

class SectorEconomicoController extends ApiController
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
        $sectores = ViewSectorEconomico
        ::where('sector_economico_id',null)
        ->with(['hijosSectorEconomicos','hijosSectorEconomicos.hijosSectorEconomicos'])
        ->get();

        return $this->showAll($sectores);
    }

    
}
