<?php

namespace Modules\Sispro\Http\Controllers\Upi;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Sispro\Entities\DatUpi;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ViewPdesUpi;
use Modules\Sispro\Entities\ClaDocumento;
use Modules\Sispro\Entities\DatUpiEntidad;
use Modules\Sispro\Entities\DatUpiComponente;
use Modules\Sispro\Entities\ViewTerritorioUpi;
use Modules\Sispro\Entities\DatUpiSectorEconomico;

class UpiRegistroController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatUpi $upiregistro)
    {
        $id = $upiregistro->id;

        $entidades = DatUpiEntidad::join('cla_demanda_tipo_entidad', 'cla_demanda_tipo_entidad.id', '=', 'dat_upi_entidad.demanda_tipo_entidad_id')
        ->join('dat_entidad','dat_entidad.id','=','dat_upi_entidad.entidad_id')
        ->where('upi_id',$id)
        ->select('dat_upi_entidad.id','cla_demanda_tipo_entidad.demanda_tipo_entidad','dat_entidad.entidad','dat_entidad.codigo_presupuestario',
        'dat_upi_entidad.upi_id','dat_upi_entidad.entidad_id','dat_upi_entidad.demanda_tipo_entidad_id')
        ->get();

        $upisectoreconomico = DatUpiSectorEconomico
        ::join('dat_sector_economico as a', 'a.id', '=', 'dat_upi_sector_economico.sector_economico_id')
        ->join('dat_sector_economico as b', 'b.id', '=', 'a.sector_economico_id')
        ->join('dat_sector_economico as c', 'c.id', '=', 'b.sector_economico_id')
        ->where('dat_upi_sector_economico.upi_id',$id)
        ->select('dat_upi_sector_economico.id','dat_upi_sector_economico.upi_id','dat_upi_sector_economico.sector_economico_id',
        'a.codigo_presupuestario as cod_tipo_proyecto','a.sector_economico as tipo_proyecto','b.codigo_presupuestario as cod_sub_sector','b.sector_economico as sub_sector','b.id as subsector_id','c.codigo_presupuestario as cod_sector','c.sector_economico as sector','c.id as sector_id')
        ->get();
        
        $documentosingreso = $upiregistro->upiHojaRutas()
        ->with(['upiDocumentos' => function($q){
            $q->with(['documento']);
        }])
        ->get();     
        
        $documentosemitido = [];

        $situacionactual = $upiregistro->upiSituacionActuales()
        ->with(['estadoSituacion'])
        ->get();
        
        $upiregistro = $upiregistro
        ->where('id',$id)
        ->with(['estadoDocumentos','nodoPlanes'])
        ->first();

        $componente = DatUpiComponente::where('upi_id',$id)
        ->get();

        $upipdes = ViewPdesUpi::where('upi_id',$id)
        ->get();

        $financiamientoinicial = $upiregistro->upiComponentes()
        ->join('dat_upi_financiamiento as c', 'c.upi_componente_id', '=', 'dat_upi_componente.id')
        ->join('dat_demanda_financiador as d', 'd.id', '=', 'c.demanda_financiador_id')
        ->join('cla_tipo_financiador as e', 'e.id', '=', 'd.tipo_financiador_id')
        ->where('c.tipo_financiamiento_id',1)
        ->select('c.id','dat_upi_componente.componente','c.monto','d.demanda_financiador','d.abreviacion as abr_financiador','e.abreviacion as tipo_financiador','dat_upi_componente.id as upi_componente_id','d.id as demanda_financiador_id','e.id as tipo_financiador_id')
        ->get();

        $financiamientoajustada = $upiregistro->upiComponentes()
        ->join('dat_upi_financiamiento as c', 'c.upi_componente_id', '=', 'dat_upi_componente.id')
        ->join('dat_demanda_financiador as d', 'd.id', '=', 'c.demanda_financiador_id')
        ->join('cla_tipo_financiador as e', 'e.id', '=', 'd.tipo_financiador_id')
        ->where('c.tipo_financiamiento_id',2)
        ->select('c.id','dat_upi_componente.componente','c.monto','d.demanda_financiador','d.abreviacion as abr_financiador','e.abreviacion as tipo_financiador','dat_upi_componente.id as upi_componente_id','d.id as demanda_financiador_id','e.id as tipo_financiador_id')
        ->get();

        $territorio = ViewTerritorioUpi
        ::where('upi_id',$id)
        ->where('codigo_presupuestario_padre',null)
        ->with(['getMunicipios' => function($q) use ($id){
            $q->where('upi_id',$id);
        }])
        ->get();

        $datos = array_merge(
            ['upi'=>$upiregistro],
            ['upientidad'=>$entidades],
            ['upisectoreconomico'=>$upisectoreconomico],
            ['documentosingreso'=>$documentosingreso],
            ['documentosemitido'=>$documentosemitido],
            ['componente'=>$componente],
            ['upipdes'=>$upipdes],
            ['financiamientoinicial'=>$financiamientoinicial],
            ['financiamientoajustada'=>$financiamientoajustada],
            ['territorio'=>$territorio],
            ['situacionactual'=>$situacionactual]            
        );

        return response()->json(['data' => $datos], 200);
    }
    
}
