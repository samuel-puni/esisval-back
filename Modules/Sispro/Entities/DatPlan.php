<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaTipoPlan;
use Modules\Sispro\Entities\DatNivelPlan;

class DatPlan extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_plan";
    public $timestamps = false;

    protected $fillable = [
    	'plan',
    	'abreviacion',
    	'vigente',
    	'tipo_plan_id'
    ];

    public function nivelPlanes()
    {
        return $this->hasMany(DatNivelPlan::class);
    }

     public function tipoPlan()
    {
        return $this->belongsTo(ClaTipoPlan::class);
    }
}
