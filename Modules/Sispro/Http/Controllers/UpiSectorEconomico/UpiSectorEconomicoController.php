<?php

namespace Modules\Sispro\Http\Controllers\UpiSectorEconomico;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatUpiSectorEconomico;

class UpiSectorEconomicoController extends ApiController
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
        $upisector = DatUpiSectorEconomico::create($campos);
        return $this->showOne($upisector,201); 
    }

    public function update(Request $request, DatUpiSectorEconomico $upisector)
    {
        
        if($request->has('sector_economico_id'))
        {
            $upisector->sector_economico_id = $request->sector_economico_id;
        }

        if($request->has('upi_id'))
        {
            $upisector->upi_id = $request->upi_id;
        }

        if($request->has('sector_id'))
        {
            $upisector->sector_id = $request->sector_id;
        }

        $upisector->save();

        return $this->showOne($upisector,201); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatUpiSectorEconomico $upisector)
    {
        $upisector->delete();
        return $this->showOne($upisector);
    }

}
