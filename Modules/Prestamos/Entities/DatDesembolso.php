<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatComponenteConvenio;

class DatDesembolso extends Model
{
    protected $connection = 'prestamo';
    public $table = "dat_desembolso";

    protected $fillable = [
    	'carta_solicitud',
    	'fecha_ingreso',
    	'solicitud_pago',
    	'fecha_pago',
    	'importe',
    	'tipo_cambio',
    	'concepto_desembolso',
    	'componente_convenio_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function componenteConvenio()
    {
        return $this->belongsTo(DatComponenteConvenio::class);
    }

}
