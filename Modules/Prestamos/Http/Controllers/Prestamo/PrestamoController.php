<?php

namespace Modules\Prestamos\Http\Controllers\Prestamo;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Prestamos\Entities\DatContratoPrestamo;

class PrestamoController extends ApiController
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
        $datos = DatContratoPrestamo::with(['organismoFinanciador','componentes' => function($q){
            $q->where('componente_id',null);
        },'componentes.hijoComponentes','componentes.hijoComponentes.programacionPrestamos'])->get();
        return $this->showAll($datos);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(DatContratoPrestamo $prestamo)
    {
        $id = $prestamo->id;
        $datos = DatContratoPrestamo::where('id',$id)->with(['organismoFinanciador','componentes' => function($q){
            $q->where('componente_id',null);
        },'componentes.hijoComponentes','componentes.hijoComponentes.programacionPrestamos'])->first();
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
        $datos = DatContratoPrestamo::create($campos);

        return $this->showOne($datos,201);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,DatContratoPrestamo $prestamo)
    {
        if($request->has('tipo_moneda_id'))
        {
            $prestamo->tipo_moneda_id = $request->tipo_moneda_id;
        }
        if($request->has('codigo'))
        {
            $prestamo->codigo = $request->codigo;
        }

        if($request->has('nombre'))
        {
            $prestamo->nombre = $request->nombre;
        }

        if($request->has('organismo_financiador_id'))
        {
            $prestamo->organismo_financiador_id = $request->organismo_financiador_id;
        }

        if($request->has('vigente'))
        {
            if ($prestamo->vigente == 1)
                $prestamo->vigente = 0;
            else
                $prestamo->vigente = 1;
        }

        $prestamo->save();
        return $this->showOne($prestamo,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatContratoPrestamo $prestamo)
    {
        $prestamo->delete();
        return $this->showOne($prestamo);
    }
}
