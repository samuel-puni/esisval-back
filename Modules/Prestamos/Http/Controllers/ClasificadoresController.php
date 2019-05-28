<?php

namespace Modules\Prestamos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\ApiController;
use Modules\Prestamos\Entities\ClaEtapa;
use Modules\Prestamos\Entities\DatEntidad;
use Modules\Prestamos\Entities\ClaOrganismo;
use Modules\Prestamos\Entities\ClaTipoMoneda;
use Modules\Prestamos\Entities\DatComponente;
use Modules\Prestamos\Entities\DatContratoPrestamo;
use Modules\Prestamos\Entities\ClaOrganismoFinanciador;


class ClasificadoresController extends ApiController
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
        $organimos = ClaOrganismoFinanciador::where('vigente','1')
        ->orderBy('organismo_financiador', 'asc')
        ->get();

        $monedas = ClaTipoMoneda::where('vigente','1')
        ->orderBy('tipo_moneda', 'asc')
        ->get();

        $etapas = ClaEtapa::where('vigente','1')
        ->orderBy('etapa', 'asc')
        ->get();

        $entidades = DatEntidad::where('vigente','1')
        ->orderBy('entidad', 'asc')
        ->get();

        $contratos = DatContratoPrestamo::where('vigente','1')
        ->orderBy('nombre', 'asc')
        ->get();

        $componentes = DatComponente::where('componente_id','<>',null)
        ->get();

        $datos = array_merge(
            ['organimos' => $organimos],
            ['monedas' => $monedas],
            ['etapas' => $etapas],
            ['entidades' => $entidades],
            ['contratos' => $contratos], 
            ['componentes' => $componentes]

        );

        return response()->json($datos, 200);
    }

    
}
