<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;

class ClaEtapaUpi extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_etapa_upi";

    protected $fillable = [
    	'etapa_upi',
    	'abreviacion',
    	'vigente'
    ];

    public function upis()
    {
        return $this->hasMany(DatUpi::class);
    }
}
