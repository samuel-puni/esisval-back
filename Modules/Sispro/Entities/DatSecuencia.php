<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class DatSecuencia extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_secuencia";
    public $timestamps = false;

    protected $fillable = [
    	'tabla',
    	'secuencia',
    	'descripcion',
    	'vigente'
    ];
}
