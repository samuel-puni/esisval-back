<?php

namespace Modules\Rbac\Entities;

use Modules\Rbac\Entities\Permiso;
use Modules\Rbac\Entities\Operacion;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    //
    protected $fillable = [
    	'objeto',
    	'descripcion',
    	'vigente',
    ];

    public function setObjetoAttribute($valor)
    {
        $this->attributes['objeto'] = strtoupper($valor);
    }

    public function permisos()
    {
    	return $this->belongsToMany(Permiso::class);
    }

    public function operaciones()
    {
    	return $this->belongsToMany(Operacion::class);
    }
}
