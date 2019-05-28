<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatConvenio;

class DatEstadoSituacion extends Model
{
    protected $connection = 'prestamo';
    public $table = "dat_estado_situacion";

    protected $fillable = [
    	'estado_situacion',
    	'fecha',
    	'convenio_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function convenio()
    {
        return $this->belongsTo(DatConvenio::class);
    }

}
