<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class CtrNumeroComite extends Model
{
    protected $connection = 'sispro'; 
    public $table = "ctr_numero_comite";
    public $timestamps = false;

    protected $fillable = [
    	'gestion',
    	'numero',
    	'vigente'
    ];
}
