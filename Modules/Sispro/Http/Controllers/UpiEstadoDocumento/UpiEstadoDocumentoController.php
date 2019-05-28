<?php

namespace Modules\Sispro\Http\Controllers\UpiEstadoDocumento;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Sispro\Entities\DatUpi;
use App\Http\Controllers\ApiController;

class UpiEstadoDocumentoController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }
    
    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,DatUpi $upiestadodocumento)
    {
        $upiestadodocumento->estadoDocumentos()->detach();
        $upiestadodocumento->estadoDocumentos()->attach($request->datos_estado_documento);
        return $this->showAll($upiestadodocumento->estadoDocumentos);
    }
}
