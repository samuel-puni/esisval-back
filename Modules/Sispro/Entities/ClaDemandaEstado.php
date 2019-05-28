<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;

class ClaDemandaEstado extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_demanda_estado";

    protected $fillable = [
    	'demanda_estado',
    	'abreviacion',
    	'descripcion'
    ];

    public function demandas()
    {
        return $this->hasMany(DatDemanda::class);
    }
}
