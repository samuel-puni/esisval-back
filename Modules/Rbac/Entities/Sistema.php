<?php

namespace Modules\Rbac\Entities;

use Modules\Rbac\Entities\Rol;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    //
    protected $fillable = [
    	'sistema',
    	'descripcion',
    	'vigente',
    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'vigente'
    ];

    public function setSistemaAttribute($valor)
    {
        $this->attributes['sistema'] = strtoupper($valor);
    }
    public function setDescripcionAttribute($valor)
    {
        $this->attributes['descripcion'] = strtoupper($valor);
    }

    public function roles()
    {
    	return $this->belongsToMany(Rol::class);
    }
}
