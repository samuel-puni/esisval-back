<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatPlan;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatNodoPlan;

class DatNivelPlan extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_nivel_plan";
    public $timestamps = false;

    protected $fillable = [
    	'nivel_plan',
    	'orden',
    	'habilitado_inversion',
    	'plan_id'
    ];

    public function nodoPlanes()
    {
        return $this->hasMany(DatNodoPlan::class,'nivel_plan_id');
    }

     public function plan()
    {
        return $this->belongsTo(DatPlan::class);
    }

}
