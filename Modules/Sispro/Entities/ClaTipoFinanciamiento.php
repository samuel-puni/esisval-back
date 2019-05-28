<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatUpiFinanciamiento;

class ClaTipoFinanciamiento extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_financiamiento";

    protected $fillable = [
    	'tipo_financiamiento',
    	'abreviacion'
    ];
            
    protected $hidden = [
        'vigente'
    ];

    public function upiFinanciamientos()
    {
        return $this->hasMany(DatUpiFinanciamiento::class);
    }
}
