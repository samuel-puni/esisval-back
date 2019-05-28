<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatEntidad;

class ClaTipoAdministracion extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_administracion";

    protected $fillable = [
    	'tipo_administracion',
    	'abreviacion',
    	'descripcion'
    ];

    public function entidades()
    {
        return $this->hasMany(DatEntidad::class);
    }
}
