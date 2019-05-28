<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;

class ClaAccionInversion extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_accion_inversion";

    protected $fillable = [
    	'accion_inversion',
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
