<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatUpiComponente;
use Modules\Sispro\Entities\DatDemandaFinanciador;

class DatUpiFinanciamiento extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi_financiamiento";

    protected $fillable = [
    	'monto',
        'demanda_financiador_id',
        'upi_componente_id',
        'tipo_financiamiento_id'
    ];
            
    protected $hidden = [
    ];


    public function demandaFinanciador()
    {
        return $this->belongsTo(DatDemandaFinanciador::class,'demanda_financiador_id');
    }

    public function upiComponente()
    {
        return $this->belongsTo(DatUpiComponente::class);
    }

    public function tipoFinanciamiento()
    {
        return $this->belongsTo(ClaTipoFinanciamiento::class);
    }

}
