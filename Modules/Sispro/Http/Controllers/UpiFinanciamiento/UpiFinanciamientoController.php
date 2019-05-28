<?php

namespace Modules\Sispro\Http\Controllers\UpiFinanciamiento;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatUpiFinanciamiento;

class UpiFinanciamientoController extends ApiController
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
        $upifinanciamiento = DatUpiFinanciamiento::create($campos);

        return $this->showOne($upifinanciamiento,201);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, DatUpiFinanciamiento $upifinanciamiento)
    {
        if($request->has('demanda_financiador_id'))
        {
            $upifinanciamiento->demanda_financiador_id = $request->demanda_financiador_id;
        }

        if($request->has('monto'))
        {
            $upifinanciamiento->monto = $request->monto;
        }

        if($request->has('upi_componente_id'))
        {
            $upifinanciamiento->upi_componente_id = $request->upi_componente_id;
        }
        
        if($request->has('tipo_financiamiento_id'))
        {
            $upifinanciamiento->tipo_financiamiento_id = $request->tipo_financiamiento_id;
        }

        $upifinanciamiento->save();

        return $this->showOne($upifinanciamiento,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatUpiFinanciamiento $upifinanciamiento)
    {
        $upifinanciamiento->delete();
        return $this->showOne($upifinanciamiento);
    }
}
