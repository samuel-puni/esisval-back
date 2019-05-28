<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatEntidad;
use Modules\Sispro\Entities\ClaDemandaTipoEntidad;

class DatUpiEntidad extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi_entidad";

    protected $fillable = [
		'entidad_id',
    	'upi_id',
    	'demanda_tipo_entidad_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    

    public function entidad()
    {
        return $this->belongsTo(DatEntidad::class);
    }

    public function upi()
    {
        return $this->belongsTo(DatUpi::class);
    }

    public function demandaTipoEntidad()
    {
        return $this->belongsTo(ClaDemandaTipoEntidad::class);
    }
}
