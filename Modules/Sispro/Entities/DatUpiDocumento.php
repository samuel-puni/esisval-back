<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaDocumento;
use Modules\Sispro\Entities\DatUpiHojaRuta;

class DatUpiDocumento extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi_documento";

    protected $fillable = [
    	'numero_documento',
    	'fecha_emision',
    	'observacion',
    	'hoja_ruta_id',
    	'documento_id',
    	'documento_digital'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function upiHojaRuta()
    {
        return $this->belongsTo(DatUpiHojaRuta::class);
    }

    public function documento()
    {
        return $this->belongsTo(ClaDocumento::class);
    }
}
