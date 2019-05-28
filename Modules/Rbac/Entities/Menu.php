<?php

namespace Modules\Rbac\Entities;

use Modules\Rbac\Entities\Menu;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    	'menu',
    	'descripcion',
    	'orden',
    	'ruta',
    	'tipo',
    	'nivel',
    	'icono',
    	'vigente',
    	'menu_id'

    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'vigente',
        'menu_id'
    ];

    public function roles()
    {
    	return $this->belongsToMany(Rol::class);
    }

    public function menuHijo()
    {
        return $this->belongsTo(Menu::class);
    }

    public function menusHijos()
    {
        return $this->hasMany(Menu::class);
    }
}
