<?php

namespace Modules\Rbac\Entities;

use Illuminate\Database\Eloquent\Model;

class ViewSistema extends Model
{
    public $table = "view_sistema";

    protected $fillable = [
    	'id',
    	'sistema',
    	'id_user',
    	'usuario',
    	'id_rol',
    	'rol'
    ];
}
