<?php

namespace Modules\Prestamos\Http\Controllers\Componente;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Prestamos\Entities\DatComponente;

class ComponenteController extends ApiController
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
        $datos = DatComponente::create($campos);

        return $this->showOne($datos,201);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatComponente $componente)
    {
        $componente->delete();
        return $this->showOne($componente);
    }
}
