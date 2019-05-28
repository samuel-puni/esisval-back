<?php

namespace Modules\Sispro\Http\Controllers\DemandaEntidad;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemandaEntidad;

class DemandaEntidadController extends ApiController
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
            $demandaentidad = DatDemandaEntidad::create($campos);
            DB::commit();

            $id = $demandaentidad->id;

            $entidades = DatDemandaEntidad::join('cla_demanda_tipo_entidad', 'cla_demanda_tipo_entidad.id', '=', 'dat_demanda_entidad.demanda_tipo_entidad_id')
            ->join('dat_entidad','dat_entidad.id','=','dat_demanda_entidad.entidad_id')
            ->where('dat_demanda_entidad.id',$id)
            ->select('dat_demanda_entidad.id','cla_demanda_tipo_entidad.demanda_tipo_entidad','dat_entidad.entidad','dat_entidad.codigo_presupuestario',
        'dat_demanda_entidad.demanda_id','dat_demanda_entidad.entidad_id','dat_demanda_entidad.demanda_tipo_entidad_id')
            ->get();

            return $this->showOne($entidades[0],201); 

        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse("Ocurrio un error.",400);
        }
    }


    public function update(Request $request, DatDemandaEntidad $demandaentidad)
    {
        if($request->has('entidad_id'))
        {
            $demandaentidad->entidad_id = $request->entidad_id;
        }

        if($request->has('demanda_tipo_entidad_id'))
        {
            $demandaentidad->demanda_tipo_entidad_id = $request->demanda_tipo_entidad_id;
        }

        $demandaentidad->save();

        $id = $demandaentidad->id;

        $entidades = DatDemandaEntidad::join('cla_demanda_tipo_entidad', 'cla_demanda_tipo_entidad.id', '=', 'dat_demanda_entidad.demanda_tipo_entidad_id')
        ->join('dat_entidad','dat_entidad.id','=','dat_demanda_entidad.entidad_id')
        ->where('dat_demanda_entidad.id',$id)
        ->select('dat_demanda_entidad.id','cla_demanda_tipo_entidad.demanda_tipo_entidad','dat_entidad.entidad','dat_entidad.codigo_presupuestario',
        'dat_demanda_entidad.demanda_id','dat_demanda_entidad.entidad_id','dat_demanda_entidad.demanda_tipo_entidad_id')
        ->get();

        return $this->showOne($entidades[0],201); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatDemandaEntidad $demandaentidad)
    {
        $demandaentidad->delete();
        return $this->showOne($demandaentidad);
    }
}
