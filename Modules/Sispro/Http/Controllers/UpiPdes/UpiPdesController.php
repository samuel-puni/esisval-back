<?php

namespace Modules\Sispro\Http\Controllers\UpiPdes;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Sispro\Entities\DatUpi;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ViewPdesUpi;

class UpiPdesController extends ApiController
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
    public function update(Request $request, DatUpi $upipde)
    {
        if ($request->tipo == 0)
            $upipde->nodoPlanes()->attach([$request->accion_id]);
        else
            $upipde->nodoPlanes()->detach([$request->accion_id]);
        return $this->showAll($upipde->nodoPlanes);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
