<?php

namespace Modules\Sispro\Http\Controllers\Indicador;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ClaIndicador;

class IndicadorUnidadMedidaController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(ClaIndicador $indicadorunidadmedida)
    {
        $unidadmedida = $indicadorunidadmedida->unidadMedidas;
        $datos = array_merge(
            ['indicador'=>$indicadorunidadmedida]
        );

        return response()->json(['data' => $datos], 200);
        //return $this->showAll($unidadmedida);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,ClaIndicador $indicadorunidadmedida)
    {
        $indicadorunidadmedida->unidadMedidas()->detach();
        $indicadorunidadmedida->unidadMedidas()->attach($request->medidas);
        return $this->showAll($indicadorunidadmedida->unidadMedidas);
    }

}
