<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemandaEtapa;

class ClaDemandaEtapa extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_demanda_etapa";

    protected $fillable = [
    	'demanda_etapa',
    	'abreviacion',
    	'vigente'
    ];

    protected $hidden = [
    	'created_at',
        'updated_at'
    ];

    public function demandaEtapas()
    {
        return $this->hasMany(DatDemandaEtapa::class);
    }
}
