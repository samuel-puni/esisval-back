<?php

namespace Modules\Sispro\Http\Controllers\Demanda;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatEntidad;
use Modules\Sispro\Entities\DatNivelPlan;
use Modules\Sispro\Entities\ClaTipoDemanda;
use Modules\Sispro\Entities\ViewTerritorio;
use Modules\Sispro\Entities\DatDemandaEntidad;
use Modules\Sispro\Entities\ClaAccionInversion;
use Modules\Sispro\Entities\ViewSectorEconomico;
use Modules\Sispro\Entities\ClaDemandaTipoEntidad;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DemandaRegistroController extends ApiController
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
        $demandas = DatDemanda::join('dat_entidad', 'dat_demanda.entidad_id', '=', 'dat_entidad.id')
        ->join('cla_tipo_demanda', 'dat_demanda.tipo_demanda_id', '=', 'cla_tipo_demanda.id')
        ->join('cla_accion_inversion', 'dat_demanda.accion_inversion_id', '=', 'cla_accion_inversion.id')
        ->join('cla_demanda_estado', 'dat_demanda.demanda_estado_id', '=', 'cla_demanda_estado.id')
        ->select('dat_demanda.id','dat_demanda.codigo_sispro','dat_demanda.nombre_demanda','dat_demanda.demanda_estado_id','dat_entidad.sigla','dat_entidad.entidad','cla_tipo_demanda.tipo_demanda','cla_demanda_estado.demanda_estado')
        ->with('demandaSectorEconomicos.demandaPlanes')
        ->with(['demandaSectorEconomicos.sectorEconomico.hijoSectorEconomico.hijoSectorEconomico'])
        ->with(['demandaTerritorios.territorio'])
        ->get();

        $datos = array_merge(
            ['demandas'=>$demandas]
        );

        return response()->json($datos, 200);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatDemanda $demandaregistro)
    {
        $id = $demandaregistro->id;

        $demandaregistro = $demandaregistro::with(['entidad','tipoDemanda'])
        ->where('id',$id)
        ->first();

        $entidades = DatDemandaEntidad::join('cla_demanda_tipo_entidad', 'cla_demanda_tipo_entidad.id', '=', 'dat_demanda_entidad.demanda_tipo_entidad_id')
        ->join('dat_entidad','dat_entidad.id','=','dat_demanda_entidad.entidad_id')
        ->where('demanda_id',$id)
        ->select('dat_demanda_entidad.id','cla_demanda_tipo_entidad.demanda_tipo_entidad','dat_entidad.entidad','dat_entidad.codigo_presupuestario',
        'dat_demanda_entidad.demanda_id','dat_demanda_entidad.entidad_id','dat_demanda_entidad.demanda_tipo_entidad_id')
        ->get();

        $demandasectoreconomico = DatDemandaSectorEconomico
        ::join('dat_sector_economico as a', 'a.id', '=', 'dat_demanda_sector_economico.sector_economico_id')
        ->join('dat_sector_economico as b', 'b.id', '=', 'a.sector_economico_id')
        ->join('dat_sector_economico as c', 'c.id', '=', 'b.sector_economico_id')
        ->where('dat_demanda_sector_economico.demanda_id',$id)
        ->select('dat_demanda_sector_economico.id','dat_demanda_sector_economico.demanda_id','dat_demanda_sector_economico.sector_economico_id',
        'a.codigo_presupuestario as cod_tipo_proyecto','a.sector_economico as tipo_proyecto','b.codigo_presupuestario as cod_sub_sector','b.sector_economico as sub_sector','b.id as subsector_id','c.codigo_presupuestario as cod_sector','c.sector_economico as sector','c.id as sector_id')
        ->get();

        $territorio = ViewTerritorio
        ::where('demanda_id',$id)
        ->where('codigo_presupuestario_padre',null)
        ->with(['getMunicipios' => function($q) use ($id){
            $q->where('demanda_id',$id);
        }])
        ->get();

        $datos = array_merge(
            ['demanda'=>$demandaregistro],
            ['demandaentidad'=>$entidades], 
            ['demandasectoreconomico'=>$demandasectoreconomico],
            ['territorio'=>$territorio]
        );

        return response()->json(['data' => $datos], 200);
    }
}
