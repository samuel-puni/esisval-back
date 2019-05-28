<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaEstadoSituacion;

class DatUpiSituacionActual extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi_situacion_actual";
    public $timestamps = false;

    protected $fillable = [
    	'fecha',
    	'observacion',
    	'upi_id',
    	'estado_situacion_id'
    ];


    public function upi()
    {
        return $this->belongsTo(DatUpi::class);
    }

    public function estadoSituacion()
    {
        return $this->belongsTo(ClaEstadoSituacion::class);
    }
}
