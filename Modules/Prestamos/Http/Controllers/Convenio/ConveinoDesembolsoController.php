<?php

namespace Modules\Prestamos\Http\Controllers\Convenio;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Prestamos\Entities\DatDesembolso;

class ConveinoDesembolsoController extends ApiController
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
        $datos = DatDesembolso::create($campos);
        return $this->showOne($datos,201);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, DatDesembolso $conveniodesembolso)
    {
        if($request->has('carta_solicitud'))
        {
            $conveniodesembolso->carta_solicitud = $request->carta_solicitud;
        }
        if($request->has('fecha_ingreso'))
        {
            $conveniodesembolso->fecha_ingreso = $request->fecha_ingreso;
        }

        if($request->has('solicitud_pago'))
        {
            $conveniodesembolso->solicitud_pago = $request->solicitud_pago;
        }

        if($request->has('fecha_pago'))
        {
            $conveniodesembolso->fecha_pago = $request->fecha_pago;
        }

        if($request->has('importe'))
        {
            $conveniodesembolso->importe = $request->importe;
        }

        if($request->has('tipo_cambio'))
        {
            $conveniodesembolso->tipo_cambio = $request->tipo_cambio;
        }

        if($request->has('concepto_desembolso'))
        {
            $conveniodesembolso->concepto_desembolso = $request->concepto_desembolso;
        }

        if($request->has('componente_convenio_id'))
        {
            $conveniodesembolso->componente_convenio_id = $request->componente_convenio_id;
        }

        $conveniodesembolso->save();
        return $this->showOne($conveniodesembolso,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatDesembolso $conveniodesembolso)
    {
        $conveniodesembolso->delete();
        return $this->showOne($conveniodesembolso);
    }
}
