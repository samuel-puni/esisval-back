<?php

namespace Modules\Sispro\Http\Controllers\DemandaSectorEconomico;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DemandaSectorEconomicoController extends ApiController
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
        DB::beginTransaction();
        try {
            $campos = $request->all();
            $demandasector = DatDemandaSectorEconomico::create($campos);
            DB::commit();

            $id = $demandasector->id;

            $demandasectoreconomico = DatDemandaSectorEconomico
            ::join('dat_sector_economico as a', 'a.id', '=', 'dat_demanda_sector_economico.sector_economico_id')
            ->join('dat_sector_economico as b', 'b.id', '=', 'a.sector_economico_id')
            ->join('dat_sector_economico as c', 'c.id', '=', 'b.sector_economico_id')
            ->where('dat_demanda_sector_economico.id',$id)
            ->select('dat_demanda_sector_economico.id','dat_demanda_sector_economico.demanda_id','dat_demanda_sector_economico.sector_economico_id',
            'a.codigo_presupuestario as cod_tipo_proyecto','a.sector_economico as tipo_proyecto','b.codigo_presupuestario as cod_sub_sector','b.sector_economico as sub_sector','b.id as subsector_id','c.codigo_presupuestario as cod_sector','c.sector_economico as sector','c.id as sector_id')
            ->get();

            return $this->showOne($demandasectoreconomico[0],201); 

        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse("Ocurrio un error.",400);
        }
    }

    public function update(Request $request, DatDemandaSectorEconomico $demandasector)
    {
        
        if($request->has('sector_economico_id'))
        {
            $demandasector->sector_economico_id = $request->sector_economico_id;
        }

        if($request->has('demanda_id'))
        {
            $demandasector->demanda_id = $request->demanda_id;
        }

        if($request->has('sector_id'))
        {
            $demandasector->sector_id = $request->sector_id;
        }

        $demandasector->save();

        $id = $demandasector->id;

        $demandasectoreconomico = DatDemandaSectorEconomico
            ::join('dat_sector_economico as a', 'a.id', '=', 'dat_demanda_sector_economico.sector_economico_id')
            ->join('dat_sector_economico as b', 'b.id', '=', 'a.sector_economico_id')
            ->join('dat_sector_economico as c', 'c.id', '=', 'b.sector_economico_id')
            ->where('dat_demanda_sector_economico.id',$id)
            ->select('dat_demanda_sector_economico.id','dat_demanda_sector_economico.demanda_id','dat_demanda_sector_economico.sector_economico_id',
            'a.codigo_presupuestario as cod_tipo_proyecto','a.sector_economico as tipo_proyecto','b.codigo_presupuestario as cod_sub_sector','b.sector_economico as sub_sector','b.id as subsector_id','c.codigo_presupuestario as cod_sector','c.sector_economico as sector','c.id as sector_id')
            ->get();

        return $this->showOne($demandasectoreconomico[0],201); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatDemandaSectorEconomico $demandasector)
    {
        $demandasector->delete();
        return $this->showOne($demandasector);
    }


}
