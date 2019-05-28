<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class ClaEstadoSituacion extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_estado_situacion";

    protected $fillable = [
    	'estado_situacion',
    	'abreviacion',
    	'vigente'
    ];

    public function upis()
    {
        return $this->hasMany(DatUpi::class);
    }

    public function upiEstadoSituaciones()
    {
        return $this->hasMany(DatUpiEstadoSituacion::class);
    }
}
