<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaIndicador;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DatDemandaIndicador extends Model
{
	protected $connection = 'sispro'; 
	public $table = "dat_demanda_indicador";

    protected $fillable = [
    	'linea_base',
    	'meta'
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function indicador()
    {
        return $this->belongsTo(ClaIndicador::class);
    }

    public function demandaSectorEconomico()
    {
        return $this->belongsTo(DatDemandaSectorEconomico::class);
    }
}
