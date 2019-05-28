<?php

namespace Modules\Sispro\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Sispro\Entities\ClaMoneda;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatEntidad;
use Modules\Sispro\Entities\ClaEtapaUpi;
use Modules\Sispro\Entities\ClaDocumento;
use Modules\Sispro\Entities\DatNivelPlan;
use Modules\Sispro\Entities\ClaTerritorio;
use Modules\Sispro\Entities\ClaTipoDemanda;
use Modules\Sispro\Entities\ClaDemandaEtapa;
use Modules\Sispro\Entities\ClaTipoDocumento;
use Modules\Sispro\Entities\ClaEstadoPrograma;
use Modules\Sispro\Entities\ClaAccionInversion;
use Modules\Sispro\Entities\ClaEstadoDocumento;
use Modules\Sispro\Entities\ClaEstadoSituacion;
use Modules\Sispro\Entities\ClaTipoFinanciador;
use Modules\Sispro\Entities\ViewSectorEconomico;
use Modules\Sispro\Entities\ClaTipoRequerimiento;
use Modules\Sispro\Entities\ClaDemandaTipoEntidad;
use Modules\Sispro\Entities\DatDemandaFinanciador;

class ClasificadoresController extends ApiController
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
         $entidades = DatEntidad::where('vigente','1')
        //->where('tipo_entidad_id','2')
        ->orderBy('entidad', 'asc')
        ->get();

        $tipodemanda = ClaTipoDemanda::where('vigente','1')
        ->orderBy('tipo_demanda', 'asc')
        ->get();

        $tiporequerimiento = ClaTipoRequerimiento::where('vigente','1')
        ->orderBy('tipo_requerimiento', 'asc')
        ->get();

        $accioninversion = ClaAccionInversion::where('vigente','1')
        ->orderBy('accion_inversion', 'asc')
        ->get();

        $sector = ViewSectorEconomico::where('sector_economico_id',null)
        ->where('id','<>',1)
        ->get();

        $pilar = DatNivelPlan
        ::where('plan_id',2)
        ->where('habilitado_inversion',1)
        ->where('id',18)
        ->with(['nodoPlanes' => function($q){
            $q->where('nivel_plan_id',18);
        }])
        ->get()
        ->pluck('nodoPlanes')
        ->collapse();

        $sectores = ViewSectorEconomico::where('sector_economico_id',null)
        ->with(['hijosSectorEconomicos','hijosSectorEconomicos.hijosSectorEconomicos'])
        ->get();

        $pdes = DatNivelPlan
        ::where('plan_id',2)
        ->where('habilitado_inversion',1)
        ->where('id',18)
        ->with(['nodoPlanes' => function($q){
            $q->where('nivel_plan_id',18);
        },'nodoPlanes.hijosNodoPlanes','nodoPlanes.hijosNodoPlanes.hijosNodoPlanes','nodoPlanes.hijosNodoPlanes.hijosNodoPlanes.hijosNodoPlanes'])
        ->get()
        ->pluck('nodoPlanes')
        ->collapse();

        $departamento = ClaTerritorio::where('tipo_territorio_id',1)
        ->where('vigente',1)
        ->get();

        $municipio = ClaTerritorio::where('tipo_territorio_id',4)
        ->where('vigente',1)
        ->get();
        
        $tipoentidad = ClaDemandaTipoEntidad::where('vigente','1')
        ->orderBy('demanda_tipo_entidad', 'asc')
        ->get();

        $documentosingreso = ClaDocumento::where('vigente','1')->where('tipo_documento_id','1')
        ->orderBy('documento', 'asc')
        ->get();

        $documentosentregado = ClaDocumento::where('vigente','1')->where('tipo_documento_id','2')
        ->orderBy('documento', 'asc')
        ->get();

        $documentosrevision = ClaDocumento::where('vigente','1')->where('tipo_documento_id','3')
        ->orderBy('documento', 'asc')
        ->get();

        $estadodocumento = ClaEstadoDocumento::where('vigente','1')
        ->orderBy('estado_documento', 'asc')
        ->get();

        $estadoprograma = ClaEstadoPrograma::where('vigente','1')
        ->orderBy('estado_programa', 'asc')
        ->get();

        $moneda = ClaMoneda::where('vigente','1')
        ->orderBy('moneda', 'asc')
        ->get();

        $etapaupi = ClaEtapaUpi::where('vigente','1')
        ->orderBy('etapa_upi', 'asc')
        ->get();

        $estadosituacion = ClaEstadoSituacion::where('vigente','1')
        ->orderBy('estado_situacion', 'asc')
        ->get();

        $tipofinanciador = ClaTipoFinanciador::where('vigente','1')
        ->with(['demandaFinanciadores' => function($q){
            $q->where('vigente',1);
        }])
        ->orderBy('abreviacion', 'asc')
        ->get();

        $fase = ClaDemandaEtapa::where('vigente',1)
        ->get();

        $datos = array_merge(
            ['departamento'=>$departamento],
            ['municipio'=>$municipio],
            ['entidades'=>$entidades],
            ['tipodemanda'=>$tipodemanda],
            ['sector'=>$sector],
            ['pilar'=>$pilar],
            ['accioninversion'=>$accioninversion], 
            ['sectores'=>$sectores],
            ['pdes'=>$pdes],
            ['tiporequirimiento'=>$tiporequerimiento],
            ['demandatipoentidad'=>$tipoentidad],
            ['documentosingreso'=>$documentosingreso],
            ['documentosentregado'=>$documentosentregado],
            ['documentosrevision'=>$documentosrevision],
            ['estadodocumento'=>$estadodocumento],
            ['estadoprograma'=>$estadoprograma],
            ['moneda'=>$moneda],
            ['tipofinanciador'=>$tipofinanciador],
            ['etapaupi'=>$etapaupi],
            ['estadosituacion'=>$estadosituacion],
            ['fase'=>$fase]
        );

        return response()->json($datos, 200);
    }

    
}
