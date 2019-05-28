<?php

namespace Modules\Sispro\Http\Controllers\UpiHojaRuta;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\DatUpiHojaRuta;

class UpiHojaRutaController extends ApiController
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
        return view('sispro::index');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $upihojaruta = DatUpiHojaRuta::create($campos);

        return $this->showOne($upihojaruta,201);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatUpiHojaRuta $upihojarutum)
    {
        $upihojarutum->delete();
        return $this->showOne($upihojarutum);
    }
}
