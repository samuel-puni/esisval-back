<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatPlan;
use Illuminate\Database\Eloquent\Model;

class ClaTipoPlan extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_plan";
    public $timestamps = false;

    protected $fillable = [
    	'tipo_plan',
    	'abreviacion',
    	'descripcion'
    ];

    public function planes()
    {
        return $this->hasMany(DatPlan::class);
    }
}
