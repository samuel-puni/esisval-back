<?php

namespace Modules\Sispro\Http\Controllers\Indicador;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ClaIndicador;
use Modules\Sispro\Entities\ClaTipoIndicador;

class IndicadorController extends ApiController
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
        $indicador = ClaIndicador::join('cla_tipo_indicador','cla_tipo_indicador.id','=','cla_indicador.tipo_indicador_id')
        ->where('cla_indicador.vigente','1')
        ->select('cla_indicador.id','cla_indicador.indicador','cla_indicador.abreviacion','cla_indicador.tipo_indicador_id','cla_tipo_indicador.tipo_indicador')
        ->get();
        $tipo_indicador = ClaTipoIndicador::where('vigente','1')->get();
        $datos = array_merge(
            ['indicador'=>$indicador],
            ['tipo_indicador'=>$tipo_indicador]
        );

        return response()->json(['data' => $datos], 200);
        //return $this->showAll($indicador);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $indicador = ClaIndicador::create($campos);
        return $this->showOne($indicador,201);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(ClaIndicador $indicador)
    {
        return $this->showOne($indicador);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,ClaIndicador $indicador)
    {
        if($request->has('indicador'))
        {
            $indicador->indicador = $request->indicador;
        }

        if($request->has('abreviacion'))
        {
            $indicador->abreviacion = $request->abreviacion;
        }

        if($request->has('tipo_indicador_id'))
        {
            $indicador->tipo_indicador_id = $request->tipo_indicador_id;
        }

        $indicador->save();

        return $this->showOne($indicador);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(ClaIndicador $indicador)
    {
        $indicador->delete();
        return $this->showOne($indicador);
    }
}
