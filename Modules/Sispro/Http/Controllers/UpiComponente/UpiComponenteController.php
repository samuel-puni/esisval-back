<?php

namespace Modules\Sispro\Http\Controllers\UpiComponente;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatUpiComponente;

class UpiComponenteController extends ApiController
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
        $upicomponente = DatUpiComponente::create($campos);

        return $this->showOne($upicomponente,201);
    }

    
    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, DatUpiComponente $upicomponente)
    {
        if($request->has('componente'))
        {
            $upicomponente->componente = $request->componente;
        }

        $upicomponente->save();

        return $this->showOne($upicomponente,201);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatUpiComponente $upicomponente)
    {
        $upicomponente->delete();
        return $this->showOne($upicomponente);
    }
}
