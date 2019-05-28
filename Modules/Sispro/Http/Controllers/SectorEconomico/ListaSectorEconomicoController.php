<?php

namespace Modules\Sispro\Http\Controllers\SectorEconomico;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ViewListaSectorEconomico;

class ListaSectorEconomicoController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function index()
    {
        $sectoreconomico =ViewListaSectorEconomico::all();
        
        return $this->showAll($sectoreconomico); 
    }

    


}
