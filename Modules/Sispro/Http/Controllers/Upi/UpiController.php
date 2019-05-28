<?php

namespace Modules\Sispro\Http\Controllers\Upi;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Sispro\Entities\DatUpi;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatUpiEntidad;
use Modules\Sispro\Entities\DatUpiHojaRuta;
use Modules\Sispro\Entities\CtrNumeroComite;
use Modules\Sispro\Entities\DatUpiDocumento;
use Modules\Sispro\Entities\DatUpiComponente;
use Modules\Sispro\Entities\DatUpiFinanciamiento;
use Modules\Sispro\Entities\DatUpiSectorEconomico;
use Modules\Sispro\Entities\DatUpiSituacionActual;

class UpiController extends ApiController
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
        $upis = DatUpi::join('dat_entidad', 'dat_upi.entidad_id', '=', 'dat_entidad.id')
        ->join('cla_tipo_requerimiento', 'dat_upi.tipo_requerimiento_id', '=', 'cla_tipo_requerimiento.id')
        ->select('dat_upi.id','dat_upi.nombre_upi','dat_upi.nombre_upi','dat_upi.descripcion','dat_upi.responsable','dat_upi.created_at','dat_entidad.entidad','dat_entidad.sigla','cla_tipo_requerimiento.tipo_requerimiento')
        ->get();
        return $this->showAll($upis);
    }

    public function show($usuario)
    {
        //dd($usuario);
        $value = $usuario;
        $upis = DatUpi::join('dat_entidad', 'dat_upi.entidad_id', '=', 'dat_entidad.id')
        ->join('cla_tipo_requerimiento', 'dat_upi.tipo_requerimiento_id', '=', 'cla_tipo_requerimiento.id')
        ->select('dat_upi.id','dat_upi.nombre_upi','dat_upi.descripcion','dat_upi.responsable','dat_upi.created_at','dat_entidad.entidad','dat_entidad.sigla','cla_tipo_requerimiento.tipo_requerimiento','dat_upi.estado_situacion_id','dat_upi.numero_comite')
        ->whereIn('dat_upi.responsable', function($query) use ($value)
        {
            $query->select(DB::raw('usuario_asignado'))
                  ->from('ctr_upi_usuario')
                  ->where('usuario', $value);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return $this->showAll($upis);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $upi = DatUpi::create($campos);

        $resultado = DatUpi::join('dat_entidad', 'dat_upi.entidad_id', '=', 'dat_entidad.id')
        ->join('cla_tipo_requerimiento', 'dat_upi.tipo_requerimiento_id', '=', 'cla_tipo_requerimiento.id')
        ->where('dat_upi.id','=',$upi->id)
        ->select('dat_upi.id','dat_upi.nombre_upi','dat_upi.nombre_upi','dat_upi.descripcion','dat_upi.responsable','dat_upi.created_at','dat_entidad.sigla','cla_tipo_requerimiento.tipo_requerimiento','dat_upi.hoja_ruta','dat_upi.fecha_ingreso_mpd','dat_upi.fecha_ingreso_upi')
        ->get();

        return $this->showOne($resultado[0],201);

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, DatUpi $upi)
    {

        if($request->has('entidad_id'))
        {
            $upi->entidad_id = $request->entidad_id;
        }

        if($request->has('tipo_requerimiento_id'))
        {
            $upi->tipo_requerimiento_id = $request->tipo_requerimiento_id;
        }

        if($request->has('descripcion'))
        {
            $upi->descripcion = $request->descripcion;
        }

        if($request->has('nombre_upi'))
        {
            $upi->nombre_upi = $request->nombre_upi;
        }

        if($request->has('hoja_ruta'))
        {
            $upi->hoja_ruta = $request->hoja_ruta;
        }

        if($request->has('fecha_ingreso_mpd'))
        {
            $upi->fecha_ingreso_mpd = $request->fecha_ingreso_mpd;
        }

        if($request->has('fecha_ingreso_upi'))
        {
            $upi->fecha_ingreso_upi = $request->fecha_ingreso_upi;
        }
        
        if($request->has('estado_programa_id'))
        {
            $upi->estado_programa_id = $request->estado_programa_id;
        }

        if($request->has('moneda_inicial_id'))
        {
            $upi->moneda_inicial_id = $request->moneda_inicial_id;
        }

        if($request->has('tipo_cambio_inicial'))
        {
            $upi->tipo_cambio_inicial = $request->tipo_cambio_inicial;
        }

        if($request->has('moneda_ajustada_id'))
        {
            $upi->moneda_ajustada_id = $request->moneda_ajustada_id;
        }

        if($request->has('tipo_cambio_ajustada'))
        {
            $upi->tipo_cambio_ajustada = $request->tipo_cambio_ajustada;
        }

        if($request->has('etapa_upi_id'))
        {
            $upi->etapa_upi_id = $request->etapa_upi_id;
        }

        if($request->has('estado_situacion_id'))
        {
            $upi->estado_situacion_id = $request->estado_situacion_id;
        }

        if($request->has('sisfin'))
        {
            $upi->sisfin = $request->sisfin;
        }

        if($request->has('observacion'))
        {
            $upi->observacion = $request->observacion;
        }

        if($request->has('observacion_dggfe'))
        {
            $upi->observacion_dggfe = $request->observacion_dggfe;
        }

        if($request->has('descripcion_dggfe'))
        {
            $upi->descripcion_dggfe = $request->descripcion_dggfe;
        }

        if($request->has('repago'))
        {
            $upi->repago = $request->repago;
        }

        if($request->has('observacion_financiamiento'))
        {
            $upi->observacion_financiamiento = $request->observacion_financiamiento;
        }
        
        if($request->has('observacion')||$request->has('estado_situacion_id'))
        {
            $date = Carbon::now();
            $dato['fecha'] = $date->format('Y-m-d');
            $dato['observacion'] = $request->observacion;
            $dato['estado_situacion_id'] = $request->estado_situacion_id;
            $dato['upi_id'] = $upi->id;
            DatUpiSituacionActual::create($dato);
            ///generar hoja de ruta del comite
            if(($request->estado_situacion_id==4) && ($upi->numero_comite=='')){
                $num = CtrNumeroComite::where('vigente',1)->first();
                //MPD-COMITE-00001/2018
                $cad = "MPD-COMITE-".str_pad($num->numero, 5, "0", STR_PAD_LEFT)."/".$num->gestion;
                $num->numero = (int)$num->numero + 1;
                $num->save();
                $upi->numero_comite = $cad;
            }
        }

        $upi->save();

        return $this->showOne($upi,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatUpi $upi)
    {
        $id = $upi->id;
        $res=DatUpiSectorEconomico::where('upi_id',$id)->delete();
        $res=DatUpiEntidad::where('upi_id',$id)->delete();
        $hojas=DatUpiHojaRuta::where('upi_id',$id)->get();
        foreach ($hojas as $value) {
            $res=DatUpiDocumento::where('hoja_ruta_id',$value->id)->delete();
        }
        $res=DatUpiHojaRuta::where('upi_id',$id)->delete();
        $componentes=DatUpiComponente::where('upi_id',$id)->get();
        foreach ($componentes as $value) {
            $res=DatUpiFinanciamiento::where('upi_componente_id',$value->id)->delete();
        }
        $res=DatUpiComponente::where('upi_id',$id)->delete();
        $upi->delete();
        return $this->showOne($upi);
    }
}
