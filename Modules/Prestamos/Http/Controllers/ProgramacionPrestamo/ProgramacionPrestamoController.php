<?php

namespace Modules\Prestamos\Http\Controllers\ProgramacionPrestamo;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Modules\Prestamos\Entities\DatProgramacionPrestamo;

class ProgramacionPrestamoController extends ApiController
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
        if($request->has('documento_digital'))
        {
            $campos['documento_digital'] = $request->documento_digital->store('');
        }
        $datos = DatProgramacionPrestamo::create($campos);

        return $this->showOne($datos,201);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,DatProgramacionPrestamo $programacion)
    {
        if($request->has('presupuesto_inicial'))
        {
            $programacion->presupuesto_inicial = $request->presupuesto_inicial;
        }

        if($request->has('presupuesto_modificado'))
        {
            $programacion->presupuesto_modificado = $request->presupuesto_modificado;
        }

        if($request->has('presupuesto_vigente'))
        {
            $programacion->presupuesto_vigente = $request->presupuesto_vigente;
        }
        if($request->has('documento_digital'))
        {
            Storage::delete($programacion->documento_digital);
            $programacion->documento_digital = $request->documento_digital->store('');
        }
        $programacion->save();

        return $this->showOne($programacion,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatProgramacionPrestamo $programacion)
    {
        Storage::delete($upidocumento->documento_digital);
        $programacion->delete();
        return $this->showOne($programacion);
    }
}
