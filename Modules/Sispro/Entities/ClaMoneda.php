<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;

class ClaMoneda extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_moneda";

    protected $fillable = [
    	'moneda',
    	'abreviacion'
    ];
            
    protected $hidden = [
        'vigente'
    ];

    public function upis()
    {
        return $this->hasMany(DatUpi::class);
    }

}
