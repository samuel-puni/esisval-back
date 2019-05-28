<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatEntidad;
use Modules\Sispro\Entities\ClaDemandaTipoEntidad;

class DatDemandaEntidad extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda_entidad";

    protected $fillable = [
		'entidad_id',
    	'demanda_id',
    	'demanda_tipo_entidad_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    

    public function entidad()
    {
        return $this->belongsTo(DatEntidad::class);
    }

    public function demanda()
    {
        return $this->belongsTo(DatDemanda::class);
    }

    public function demandaTipoEntidad()
    {
        return $this->belongsTo(ClaDemandaTipoEntidad::class);
    }
}
