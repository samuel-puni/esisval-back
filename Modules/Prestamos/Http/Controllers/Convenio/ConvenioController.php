<?php

namespace Modules\Prestamos\Http\Controllers\Convenio;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Prestamos\Entities\DatConvenio;

class ConvenioController extends ApiController
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
        $datos = DatConvenio::with(['contratoPrestamo','entidad',
            'tipoMoneda','etapa','componenteConvenios','componenteConvenios.desembolsos'])->get();
        return $this->showAll($datos);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatConvenio $convenio)
    {
        $id = $convenio->id;
        $datos = DatConvenio::where('id',$id)->with(['contratoPrestamo','entidad',
            'tipoMoneda','etapa','componenteConvenios','componenteConvenios.desembolsos'])->first();
        return $this->showOne($datos);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $datos = DatConvenio::create($campos);

        return $this->showOne($datos,201);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, DatConvenio $convenio)
    {
        if($request->has('convenio'))
        {
            $convenio->convenio = $request->convenio;
        }
        if($request->has('estudio'))
        {
            $convenio->estudio = $request->estudio;
        }

        if($request->has('monto_financiamiento'))
        {
            $convenio->monto_financiamiento = $request->monto_financiamiento;
        }

        if($request->has('entidad_id'))
        {
            $convenio->entidad_id = $request->entidad_id;
        }

        if($request->has('tipo_moneda_id'))
        {
            $convenio->tipo_moneda_id = $request->tipo_moneda_id;
        }

        if($request->has('etapa_id'))
        {
            $convenio->etapa_id = $request->etapa_id;
        }

        if($request->has('usuario'))
        {
            $convenio->usuario = $request->usuario;
        }

        $convenio->save();
        return $this->showOne($convenio,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatConvenio $convenio)
    {
        $convenio->delete();
        return $this->showOne($convenio);
    }
}
