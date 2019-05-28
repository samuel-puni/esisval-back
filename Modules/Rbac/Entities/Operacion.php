<?php

namespace Modules\Rbac\Entities;

use Modules\Rbac\Entities\Objeto;
use Modules\Rbac\Entities\Permiso;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    //
    public $table = "operaciones";

    protected $fillable = [
    	'operacion',
    	'descripcion',
    	'vigente',
    ];

    public function setOperacionAttribute($valor)
    {
        $this->attributes['operacion'] = strtoupper($valor);
    }

    public function permisos()
    {
    	return $this->belongsToMany(Permiso::class);
    }

    public function objetos()
    {
    	return $this->belongsToMany(Objeto::class);
    }
}
