<?php

namespace Modules\Sispro\Http\Controllers\ProgramacionEtapa;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatDemandaEtapa;
use Modules\Sispro\Entities\DatDemandaGrupoComponente;

class ProgramacionEtapaController extends ApiController
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
        $campos = $request->all();
        $grupo = DatDemandaGrupoComponente::where('demanda_sector_economico_id',$request->demanda_sector_economico_id)
        ->first();
        
        if(is_null($grupo)){
            $grupo = new DatDemandaGrupoComponente;
            $grupo->descripcion = '-';
            $grupo->demanda_sector_economico_id = $request->demanda_sector_economico_id;
            $grupo->grupo_componente_id = 1;
            $grupo->save();    
            $campos['demanda_grupo_componente_id'] = $grupo->id;
        }
        else{
            $campos['demanda_grupo_componente_id'] = $grupo->id;
        }
        $programacionetapa = DatDemandaEtapa::create($campos);
        return $this->showOne($programacionetapa,201);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatDemandaEtapa $programacionetapa)
    {
        $programacionetapa->delete();
        return $this->showOne($programacionetapa);
    }
}
