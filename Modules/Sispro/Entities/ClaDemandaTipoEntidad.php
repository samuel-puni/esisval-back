<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatUpiEntidad;
use Modules\Sispro\Entities\DatDemandaEntidad;

class ClaDemandaTipoEntidad extends Model
{
	protected $connection = 'sispro'; 
    public $table = "cla_demanda_tipo_entidad";

    protected $fillable = [
    	'demanda_tipo_entidad',
    	'abreviacion',
    	'vigente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function demandaEntidades()
    {
        return $this->hasMany(DatDemandaEntidad::class);
    }

    public function upiEntidades()
    {
        return $this->hasMany(DatUpiEntidad::class);
    }
}
