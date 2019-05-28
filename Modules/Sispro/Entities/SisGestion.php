<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class SisGestion extends Model
{
    protected $connection = 'sispro'; 
    public $table = "sis_gestion";

    protected $fillable = [
    	'gestion',
    	'cierre',
    	'tipo_cambio',
    ];
}
