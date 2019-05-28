<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatNivelPlan;
use Modules\Sispro\Entities\DatDemandaPlan;

class DatNodoPlan extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_nodo_plan";
    public $timestamps = false;

    protected $fillable = [
    	'nodo_plan',
    	'codigo_presupuestario',
    	'nodo_plan_id',
    	'nivel_plan_id'
    ];

    public function hijosNodoPlanes()
    {
        return $this->hasMany(DatNodoPlan::class,'nodo_plan_id');
    }

	public function hijoNodoPlan()
    {
        return $this->belongsTo(DatNodoPlan::class);
    }

    public function Pilares()
    {
        return $this->hasMany(DatDemandaPlan::class,'pilar_id');
    }

    public function Metas()
    {
        return $this->hasMany(DatDemandaPlan::class,'meta_id');
    }

    public function Resultados()
    {
        return $this->hasMany(DatDemandaPlan::class,'resultado_id');
    }

    public function Acciones()
    {
        return $this->hasMany(DatDemandaPlan::class,'accion_id');
    }

    public function demandaPlanes()
    {
        return $this->hasMany(DatDemandaPlan::class);
    }

    public function nivelPlan()
    {
        return $this->belongsTo(DatNivelPlan::class);
    }

    public function upis()
    {
        return $this->belongsToMany(DatUpi::class,'rel_nodo_plan_upi','nodo_plan_id','upi_id');
    }
}
