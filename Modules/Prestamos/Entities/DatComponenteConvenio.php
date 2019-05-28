<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatConvenio;
use Modules\Prestamos\Entities\DatDesembolso;

class DatComponenteConvenio extends Model
{
    protected $connection = 'prestamo';
    public $table = "dat_componente_convenio";

    protected $fillable = [
    	'componente_convenio',
    	'monto_presupuestado',
    	'convenio_id',
        'componente_id'
    ];

    protected $hidden = [
        'monto_ejecutado',
        'created_at',
        'updated_at'
    ];

    public function convenio()
    {
        return $this->belongsTo(DatConvenio::class);
    }

    public function desembolsos()
    {
        return $this->hasMany(DatDesembolso::class,'componente_convenio_id');
    }
}
