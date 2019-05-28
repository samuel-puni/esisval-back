<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaTipoFinanciador;
use Modules\Sispro\Entities\DatUpiFinanciamiento;

class DatDemandaFinanciador extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda_financiador";

    protected $fillable = [
    	'demanda_financiador',
    	'abreviacion',
        'descripcion',
        'codigo_presupuestario',
        'tipo_financiador_id'
    ];
            
    protected $hidden = [
        'vigente',
    ];

    public function upiFinanciamientos()
    {
        return $this->hasMany(DatUpiFinanciamiento::class);
    }

    public function tipoFinanciador()
    {
        return $this->belongsTo(ClaTipoFinanciador::class);
    }

}
