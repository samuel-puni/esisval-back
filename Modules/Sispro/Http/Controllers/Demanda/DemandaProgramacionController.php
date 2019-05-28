<?php

namespace Modules\Sispro\Http\Controllers\Demanda;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatNivelPlan;
use Modules\Sispro\Entities\DatDemandaPlan;
use Modules\Sispro\Entities\DatDemandaEtapa;
use Modules\Sispro\Entities\DatDemandaGrupoComponente;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DemandaProgramacionController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatDemanda $programacionsectoreconomico)
    {
        $id = $programacionsectoreconomico->id;
        $demanda = $programacionsectoreconomico;
        $programacionsectoreconomico = DatDemandaSectorEconomico
        ::join('dat_sector_economico','dat_sector_economico.id','=','dat_demanda_sector_economico.sector_economico_id')
        ->where('dat_demanda_sector_economico.demanda_id',$id)
        ->select('dat_demanda_sector_economico.sector_economico_id',DB::raw("CONCAT(dat_sector_economico.codigo_presupuestario,' : ',dat_sector_economico.sector_economico)  AS sector_economico"),'dat_demanda_sector_economico.id')
        ->orderBy('dat_sector_economico.id')
        ->with([
            'demandaGrupoComponentes',
            'demandaGrupoComponentes.grupoComponente',
            'demandaGrupoComponentes.demandaEtapas',
            'demandaGrupoComponentes.demandaEtapas.demandaEtapa'
        ])
        ->get();
        $demandaplan = DatDemandaPlan::join('dat_demanda_sector_economico','dat_demanda_plan.demanda_sector_economico_id','=','dat_demanda_sector_economico.id')
        ->where('dat_demanda_sector_economico.demanda_id',$id)
        ->select('dat_demanda_plan.*')
        ->get();


        //dd($demandaetapa);

        $datos = array_merge(
            ['demanda' => $demanda],
            ['programacionsectoreconomico' => $programacionsectoreconomico],
            ['demandaplan' => $demandaplan]
        );

        return response()->json(['data' => $datos], 200);
    }
}
