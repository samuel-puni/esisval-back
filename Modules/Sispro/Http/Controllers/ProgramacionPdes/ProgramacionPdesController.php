<?php

namespace Modules\Sispro\Http\Controllers\ProgramacionPdes;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatNodoPlan;
use Modules\Sispro\Entities\DatNivelPlan;
use Modules\Sispro\Entities\DatDemandaPlan;

class ProgramacionPdesController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatDemanda $programacionpde)
    {
        $id = $programacionpde->id;

        $programacionpdes = DatDemandaPlan::join('dat_demanda_sector_economico','dat_demanda_plan.demanda_sector_economico_id','=','dat_demanda_sector_economico.id')
        ->where('dat_demanda_sector_economico.demanda_id',$id)
        ->select('dat_demanda_plan.id','dat_demanda_plan.demanda_sector_economico_id','dat_demanda_plan.pilar_id','dat_demanda_plan.meta_id','dat_demanda_plan.resultado_id','dat_demanda_plan.accion_id')
        ->get();

        $pdes = DatNivelPlan
        ::where('plan_id',2)
        ->where('habilitado_inversion',1)
        ->where('id',18)
        ->with(['nodoPlanes' => function($q){
            $q->where('nivel_plan_id',18);
        },'nodoPlanes.hijosNodoPlanes','nodoPlanes.hijosNodoPlanes.hijosNodoPlanes','nodoPlanes.hijosNodoPlanes.hijosNodoPlanes.hijosNodoPlanes'])
        ->get();

        $datos = array_merge(
            ['demandaplan'=>$programacionpdes],
            ['pdes'=>$pdes]
        );

        //return $this->showOne($datos, 200);
        return response()->json(['data' => $datos], 200);
    }


}
