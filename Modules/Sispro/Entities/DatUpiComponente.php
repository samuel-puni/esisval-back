<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatUpiFinanciamiento;

class DatUpiComponente extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi_componente";

    protected $fillable = [
    	'componente',
        'upi_id'
    ];
            
    protected $hidden = [
    ];

    public function upi()
    {
        return $this->belongsTo(DatUpi::class);
    }

    public function upiFinanciamientos()
    {
        return $this->hasMany(DatUpiFinanciamiento::class);
    }
}
