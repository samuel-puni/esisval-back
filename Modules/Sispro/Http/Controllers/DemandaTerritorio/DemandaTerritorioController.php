<?php

namespace Modules\Sispro\Http\Controllers\DemandaTerritorio;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\ViewTerritorio;
use Modules\Sispro\Entities\DatDemandaTerritorio;

class DemandaTerritorioController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $campos = $request->all();
            $demandaterritorio = DatDemandaTerritorio::create($campos);
            DB::commit();

            //$dato = ViewTerritorio::find($demandaterritorio->id);
            $id = $demandaterritorio->demanda_id;
            $territorio = ViewTerritorio
            ::where('demanda_id',$id)
            ->where('codigo_presupuestario_padre',null)
            ->with(['getMunicipios' => function($q) use ($id){
                $q->where('demanda_id',$id);
            }])
            ->get();

            return response()->json(['data' => $territorio], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse("Ocurrio un error.",400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatDemandaTerritorio $demandaterritorio)
    {
        $demandaterritorio->delete();

        $id = $demandaterritorio->demanda_id;
        $territorio = ViewTerritorio
        ::where('demanda_id',$id)
        ->where('codigo_presupuestario_padre',null)
        ->with(['getMunicipios' => function($q) use ($id){
            $q->where('demanda_id',$id);
        }])
        ->get();

        return response()->json(['data' => $territorio], 200);
    }

    public function update(Request $request, DatDemandaTerritorio $demandaterritorio)
    {
        if($request->has('localizacion_geografica'))
        {
            $demandaterritorio->localizacion_geografica = $request->localizacion_geografica;
        }

        if($request->has('area_influencia'))
        {
            $demandaterritorio->area_influencia = $request->area_influencia;
        }

        $demandaterritorio->save();

        $id = $demandaterritorio->demanda_id;
        $territorio = ViewTerritorio
        ::where('demanda_id',$id)
        ->where('codigo_presupuestario_padre',null)
        ->with(['getMunicipios' => function($q) use ($id){
            $q->where('demanda_id',$id);
        }])
        ->get();

        return response()->json(['data' => $territorio], 200);
    }

}
