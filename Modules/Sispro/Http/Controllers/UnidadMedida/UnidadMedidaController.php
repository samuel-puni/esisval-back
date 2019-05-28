<?php

namespace Modules\Sispro\Http\Controllers\UnidadMedida;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ClaUnidadMedida;

class UnidadMedidaController extends ApiController
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
        $unidades = ClaUnidadMedida::where('vigente','1')->get();
        return $this->showAll($unidades);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $unidad = ClaUnidadMedida::create($campos);

        return $this->showOne($unidad,201);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(ClaUnidadMedida $unidadmedida)
    {
        return $this->showOne($unidadmedida);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, ClaUnidadMedida $unidadmedida)
    {
        if($request->has('unidad_medida'))
        {
            $unidadmedida->unidad_medida = $request->unidad_medida;
        }

        if($request->has('abreviacion'))
        {
            $unidadmedida->abreviacion = $request->abreviacion;
        }

        /*if(!$role->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }*/

        $unidadmedida->save();

        return $this->showOne($unidadmedida);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(ClaUnidadMedida $unidadmedida)
    {
        $unidadmedida->delete();
        return $this->showOne($unidadmedida);
    }
}
