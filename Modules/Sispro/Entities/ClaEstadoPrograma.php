<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;

class ClaEstadoPrograma extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_estado_programa";

    protected $fillable = [
    	'estado_programa',
    	'abreviacion',
    	'vigente'
    ];

    public function upis()
    {
        return $this->hasMany(DatUpi::class);
    }
}
