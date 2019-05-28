<?php

namespace Modules\Rbac\Entities;

use Illuminate\Database\Eloquent\Model;

class ViewMenu extends Model
{
    public $table = "view_menu";

    protected $fillable = [
    	'menu',
    	'descripcion',
    	'orden',
    	'ruta',
    	'tipo',
    	'nivel',
    	'icono',
    	'vigente',
    	'menu_id',
    	'rol_id',
    ];

    public function menusHijos()
    {
        return $this->hasMany(ViewMenu::class,'menu_id','id');
    }
}
