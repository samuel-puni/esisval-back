<?php

namespace Modules\Sispro\Http\Controllers\UpiDocumento;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Modules\Sispro\Entities\DatUpiDocumento;

class UpiDocumentoController extends ApiController
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
        $upidocumento = DatUpiDocumento::create($campos);

        return $this->showOne($upidocumento,201);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatUpiDocumento $upidocumento)
    {
        Storage::delete($upidocumento->documento_digital);
        $upidocumento->delete();
        return $this->showOne($upidocumento);
    }

    public function update(Request $request, DatUpiDocumento $upidocumento)
    {
        if($request->has('numero_documento'))
        {
            $upidocumento->numero_documento = $request->numero_documento;
        }
        if($request->has('upi_id'))
        {
            $upidocumento->upi_id = $request->upi_id;
        }
        if($request->has('documento_id'))
        {
            $upidocumento->documento_id = $request->documento_id;
        }
        if($request->has('observacion'))
        {
            $upidocumento->observacion = $request->observacion;
        }
        if($request->has('fecha_emision'))
        {
            $upidocumento->fecha_emision = $request->fecha_emision;
        }
        if($request->has('documento_digital'))
        {
            Storage::delete($upidocumento->documento_digital);
            $upidocumento->documento_digital = $request->documento_digital->store('');
        }

        $upidocumento->save();

        return $this->showOne($upidocumento,201); 
    }
}
