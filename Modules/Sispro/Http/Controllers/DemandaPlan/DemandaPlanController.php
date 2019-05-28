<?php

namespace Modules\Sispro\Http\Controllers\DemandaPlan;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemandaPlan;

class DemandaPlanController extends ApiController
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
    public function store(Request $request)
    {
        $campos = $request->all();
        $datos = DatDemandaPlan::create($campos);
        return $this->showOne($datos,201);    
    }

    public function update(Request $request, DatDemandaPlan $demandaplan)
    {
        if($request->has('demanda_sector_economico_id'))
        {
            $demandaplan->demanda_sector_economico_id = $request->demanda_sector_economico_id;
        }

        if($request->has('pilar_id'))
        {
            $demandaplan->pilar_id = $request->pilar_id;
        }

        if($request->has('meta_id'))
        {
            $demandaplan->meta_id = $request->meta_id;
        }

        if($request->has('resultado_id'))
        {
            $demandaplan->resultado_id = $request->resultado_id;
        }

        if($request->has('accion_id'))
        {
            $demandaplan->accion_id = $request->accion_id;
        }

        $demandaplan->save();

        return $this->showOne($demandaplan);
    }



}
