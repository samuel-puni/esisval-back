<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemandaFinanciador;

class ClaTipoFinanciador extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_financiador";

    protected $fillable = [
    	'tipo_financiador',
    	'abreviacion'
    ];
            
    protected $hidden = [
        'vigente',
    ];

    public function demandaFinanciadores()
    {
        return $this->hasMany(DatDemandaFinanciador::class,'tipo_financiador_id');
    }

}
