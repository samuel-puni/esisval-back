<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatUpiDocumento;

class DatUpiHojaRuta extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi_hoja_ruta";
    public $timestamps = false;

    protected $fillable = [
    	'hoja_ruta',
    	'fecha_ingreso_mpd',
    	'fecha_ingreso_upi',
    	'upi_id',
    ];

    public function upi()
    {
        return $this->belongsTo(DatUpi::class);
    }

    public function upiDocumentos()
    {
        return $this->hasMany(DatUpiDocumento::class,'hoja_ruta_id');
    }
}
