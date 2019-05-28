<?php

namespace Modules\Rbac\Entities;

use App\User;
use Modules\Rbac\Entities\Menu;
use Modules\Rbac\Entities\Permiso;
use Modules\Rbac\Entities\Sistema;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    public $table = "roles";

    protected $fillable = [
    	'rol',
    	'descripcion',
    	'vigente',
    ];
    
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'vigente'
    ];

    public function setRolAttribute($valor)
    {
        $this->attributes['rol'] = strtoupper($valor);
    }
    public function setDescripcionAttribute($valor)
    {
        $this->attributes['descripcion'] = strtoupper($valor);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function sistemas()
    {
    	return $this->belongsToMany(Sistema::class);
    }

    public function menus()
    {
    	return $this->belongsToMany(Menu::class);
    }

    public function permisos()
    {
    	return $this->belongsToMany(Permiso::class);
    }
}
