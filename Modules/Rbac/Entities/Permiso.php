<?php

namespace Modules\Rbac\Entities;

use Modules\Rbac\Entities\Rol;
use Modules\Rbac\Entities\Objeto;
use Modules\Rbac\Entities\Operacion;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //
    protected $fillable = [
    	'permiso',
    	'descripcion',
    	'vigente',
    	'objeto_id',
    	'operacion_id',
    ];

    public function operaciones()
    {
    	return $this->belongsToMany(Operacion::class);
    }

    public function objetos()
    {
    	return $this->belongsToMany(Objeto::class);
    }

    public function roles()
    {
    	return $this->belongsToMany(Rol::class);
    }
}
