<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class ViewPdesUpi extends Model
{
    protected $connection = 'sispro'; 
    public $table = "view_pdes_upi";

    protected $fillable = [
    	'nodo_plan_id',
    	'upi_id',
    	'cod_accion',
    	'accion',
    	'cod_resultado',
    	'resultado',
    	'cod_meta',
        'cod_pilar',
    	'pilar',
    ];
}
