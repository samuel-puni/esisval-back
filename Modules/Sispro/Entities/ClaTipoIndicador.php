<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaIndicador;

class ClaTipoIndicador extends Model
{
	protected $connection = 'sispro'; 
	public $table = "cla_tipo_indicador";

	protected $fillable = [
    	'tipo_indicador',
    	'abreviacion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente'
    ];


    public function indicadores()
    {
        return $this->hasMany(ClaIndicador::class);
    }


}
