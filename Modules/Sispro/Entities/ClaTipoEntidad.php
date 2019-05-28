<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatEntidad;

class ClaTipoEntidad extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_entidad";

    protected $fillable = [
    	'tipo_entidad',
    	'abreviacion',
    	'descripcion'
    ];

    public function entidades()
    {
        return $this->hasMany(DatEntidad::class);
    }
}
