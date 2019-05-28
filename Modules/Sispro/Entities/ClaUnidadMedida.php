<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaIndicador;

class ClaUnidadMedida extends Model
{
	protected $connection = 'sispro'; 
	public $table = "cla_unidad_medida";

    protected $fillable = [
    	'unidad_medida',
    	'abreviacion'
    ];


    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'vigente'
    ];

    public function indicadores()
    {
    	return $this->belongsToMany(ClaIndicador::class,'rel_indicador_unidad_medida','indicador_id','unidad_medida_id');
    }
}
