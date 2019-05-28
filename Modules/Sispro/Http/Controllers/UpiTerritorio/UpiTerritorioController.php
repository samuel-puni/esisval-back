<?php

namespace Modules\Sispro\Http\Controllers\UpiTerritorio;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Sispro\Entities\DatUpi;
use App\Http\Controllers\ApiController;

class UpiTerritorioController extends ApiController
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
    public function update(Request $request,DatUpi $upiterritorio)
    {
        
        if($request->tipo == 0)
            $upiterritorio->territorios()->detach($request->datos_departamento);
        else
            $upiterritorio->territorios()->attach($request->datos_departamento);
        return $this->showAll($upiterritorio->territorios);
    }

    


}
