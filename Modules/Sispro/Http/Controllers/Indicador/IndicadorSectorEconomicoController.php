<?php

namespace Modules\Sispro\Http\Controllers\Indicador;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ClaIndicador;

class IndicadorSectorEconomicoController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(ClaIndicador $indicadorsectoreconomico)
    {
        $unidadmedida = $indicadorsectoreconomico->sectorEconomicos;
        $datos = array_merge(
            ['indicador'=>$indicadorsectoreconomico]
        );

        return response()->json(['data' => $datos], 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,ClaIndicador $indicadorsectoreconomico)
    {
        $indicadorsectoreconomico->sectorEconomicos()->detach();
        $indicadorsectoreconomico->sectorEconomicos()->attach($request->sectores);
        return $this->showAll($indicadorsectoreconomico->sectorEconomicos);
    }
}
