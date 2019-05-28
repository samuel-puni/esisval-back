<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;

class ClaTipoDemanda extends Model
{
    //
     protected $connection = 'sispro'; 
     public $table = "cla_tipo_demanda";

     protected $fillable = [
    	'tipo_demanda',
    	'abreviacion',
    	'descripcion',
    	'vigente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente',
    ];

    public function demandas()
    {
        return $this->hasMany(DatDemanda::class);
    }
}
