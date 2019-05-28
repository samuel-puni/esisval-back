<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatNodoPlan;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DatDemandaPlan extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda_plan";

    protected $fillable = [
    	'demanda_sector_economico_id',
    	'pilar_id',
    	'meta_id',
    	'resultado_id',
    	'accion_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function demandaSectorEconomicos()
    {
        return $this->hasMany(DatDemandaSectorEconomico::class,'demanda_sector_economico_id');
    }

    public function Pilar()
    {
        return $this->belongsTo(DatNodoPlan::class);
    }

    public function Meta()
    {
        return $this->belongsTo(DatNodoPlan::class);
    }

    public function Resultado()
    {
        return $this->belongsTo(DatNodoPlan::class);
    }

    public function Accion()
    {
        return $this->belongsTo(DatNodoPlan::class);
    }
}
