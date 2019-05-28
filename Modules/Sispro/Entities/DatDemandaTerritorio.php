<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\ClaTerritorio;

class DatDemandaTerritorio extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda_territorio";

    protected $fillable = [
    	'porcentaje_cobertura',
    	'poblacion_beneficiada',
    	'localizacion_geografica',
    	'area_influencia',
    	'demanda_id',
    	'territorio_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function demanda()
    {
        return $this->belongsTo(DatDemanda::class,'demanda_id');
    }

	public function territorio()
    {
        return $this->belongsTo(ClaTerritorio::class,'territorio_id');
    }
}
