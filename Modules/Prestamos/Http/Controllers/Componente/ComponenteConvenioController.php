<?php

namespace Modules\Prestamos\Http\Controllers\Componente;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ApiController;
use Modules\Prestamos\Entities\DatComponenteConvenio;

class ComponenteConvenioController extends ApiController
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
        $datos = DatComponenteConvenio::create($campos);

        return $this->showOne($datos,201);
    }

        /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, DatComponenteConvenio $conveniocomponente)
    {
        if($request->has('componente_convenio'))
        {
            $conveniocomponente->componente_convenio = $request->componente_convenio;
        }

        if($request->has('monto_presupuestado'))
        {
            $conveniocomponente->monto_presupuestado = $request->monto_presupuestado;
        }

        if($request->has('convenio_id'))
        {
            $conveniocomponente->convenio_id = $request->convenio_id;
        }

        if($request->has('componente_id'))
        {
            $conveniocomponente->componente_id = $request->componente_id;
        }

        $conveniocomponente->save();
        return $this->showOne($conveniocomponente,201); 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DatComponenteConvenio $conveniocomponente)
    {
        $conveniocomponente->delete();
        return $this->showOne($conveniocomponente);
    }
}
