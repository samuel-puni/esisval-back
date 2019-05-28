<?php

namespace Modules\Sispro\Http\Controllers\UpiEntidad;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatUpiEntidad;

class UpiEntidadController extends ApiController
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
        $upientidad = DatUpiEntidad::create($campos);

        return $this->showOne($upientidad,201); 
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, DatUpiEntidad $upientidad)
    {
        if($request->has('entidad_id'))
        {
            $upientidad->entidad_id = $request->entidad_id;
        }

        if($request->has('demanda_tipo_entidad_id'))
        {
            $upientidad->demanda_tipo_entidad_id = $request->demanda_tipo_entidad_id;
        }

        $upientidad->save();

        return $this->showOne($upientidad,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatUpiEntidad $upientidad)
    {
        $upientidad->delete();
        return $this->showOne($upientidad);
    }
}
