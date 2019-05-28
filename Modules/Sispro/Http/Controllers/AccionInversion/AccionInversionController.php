<?php

namespace Modules\Sispro\Http\Controllers\AccionInversion;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\ApiController;
use Modules\Sispro\Entities\ClaAccionInversion;

class AccionInversionController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accioninversion = ClaAccionInversion::where('vigente','1')
        ->orderBy('accion_inversion', 'asc')
        ->get();
        return $this->showAll($accioninversion);
    }
}
