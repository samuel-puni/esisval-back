<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatEntidad;

class ClaTipoNivel extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_nivel";

    protected $fillable = [
    	'tipo_nivel',
    	'abreviacion',
    	'descripcion'
    ];

    public function entidades()
    {
        return $this->hasMany(DatEntidad::class);
    }
}
