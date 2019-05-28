<?php

namespace Modules\Sispro\Http\Controllers\Demanda;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatSecuencia;

class DemandaController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandas = DatDemanda::join('dat_entidad', 'dat_demanda.entidad_id', '=', 'dat_entidad.id')
        ->join('cla_tipo_demanda', 'dat_demanda.tipo_demanda_id', '=', 'cla_tipo_demanda.id')
        ->join('cla_accion_inversion', 'dat_demanda.accion_inversion_id', '=', 'cla_accion_inversion.id')
        ->join('cla_demanda_estado', 'dat_demanda.demanda_estado_id', '=', 'cla_demanda_estado.id')
        ->select('dat_demanda.id','dat_demanda.codigo_sispro','dat_demanda.nombre_demanda','dat_demanda.demanda_estado_id',
            'dat_entidad.sigla','cla_tipo_demanda.tipo_demanda','cla_demanda_estado.demanda_estado')
        ->get()
        ;
        return $this->showAll($demandas);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatDemanda $demanda)
    {
        return $this->showOne($demandas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $sec = DatSecuencia::find('1');
            $valor = (int)$sec->secuencia+1;
            $sec->secuencia=(int)$valor;
            $sec->save();
            $codigo =str_pad($valor,6,"0",STR_PAD_LEFT).Carbon::now()->year;
            $campos = $request->all();
            $campos['codigo_sispro'] = $codigo;
            $demanda = DatDemanda::create($campos);
            DB::commit();

            $resultado = DatDemanda::join('dat_entidad', 'dat_demanda.entidad_id', '=', 'dat_entidad.id')
            ->join('cla_tipo_demanda', 'dat_demanda.tipo_demanda_id', '=', 'cla_tipo_demanda.id')
            ->join('cla_accion_inversion', 'dat_demanda.accion_inversion_id', '=', 'cla_accion_inversion.id')
            ->join('cla_demanda_estado', 'dat_demanda.demanda_estado_id', '=', 'cla_demanda_estado.id')
            ->where('dat_demanda.id','=',$demanda->id)
            ->select('dat_demanda.id','dat_demanda.codigo_sispro','dat_demanda.nombre_demanda','dat_demanda.demanda_estado_id',
                'dat_entidad.sigla','cla_tipo_demanda.tipo_demanda','cla_demanda_estado.demanda_estado')
            ->get();

            return $this->showOne($resultado[0],201); 

        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse("Ocurrio un error.",400);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, DatDemanda $demanda)
    {
        if($request->has('entidad_id'))
        {
            $demanda->entidad_id = $request->entidad_id;
        }

        if($request->has('tipo_demanda_id'))
        {
            $demanda->tipo_demanda_id = $request->tipo_demanda_id;
        }

        if($request->has('accion_inversion_id'))
        {
            $demanda->accion_inversion_id = $request->accion_inversion_id;
        }
        if($request->has('objeto'))
        {
            $demanda->objeto = $request->objeto;
        }
        if($request->has('localizacion'))
        {
            $demanda->localizacion = $request->localizacion;
        }

        if($request->has('nombre_demanda'))
        {
            $demanda->nombre_demanda = $request->nombre_demanda;
        }

        if($request->has('descripcion'))
        {
            $demanda->descripcion = $request->descripcion;
        }

        if($request->has('objetivo_especifico'))
        {
            $demanda->objetivo_especifico = $request->objetivo_especifico;
        }

        if($request->has('objetivo_general'))
        {
            $demanda->objetivo_general = $request->objetivo_general;
        }

        if($request->has('problema'))
        {
            $demanda->problema = $request->problema;
        }


        $demanda->save();

        $resultado = DatDemanda::join('dat_entidad', 'dat_demanda.entidad_id', '=', 'dat_entidad.id')
        ->join('cla_tipo_demanda', 'dat_demanda.tipo_demanda_id', '=', 'cla_tipo_demanda.id')
        ->join('cla_accion_inversion', 'dat_demanda.accion_inversion_id', '=', 'cla_accion_inversion.id')
        ->join('cla_demanda_estado', 'dat_demanda.demanda_estado_id', '=', 'cla_demanda_estado.id')
        ->where('dat_demanda.id','=',$demanda->id)
        ->select('dat_demanda.id','dat_demanda.codigo_sispro','dat_demanda.nombre_demanda','dat_demanda.demanda_estado_id',
            'dat_entidad.sigla','cla_tipo_demanda.tipo_demanda','cla_demanda_estado.demanda_estado','dat_demanda.descripcion','dat_demanda.objetivo_especifico','dat_demanda.objetivo_general','dat_demanda.problema')
        ->get();

        return $this->showOne($resultado[0],201); 
    }

    
}
