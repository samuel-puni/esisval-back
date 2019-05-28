<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\ClaEtapa;
use Modules\Prestamos\Entities\DatEntidad;
use Modules\Prestamos\Entities\ClaTipoMoneda;
use Modules\Prestamos\Entities\DatContratoPrestamo;
use Modules\Prestamos\Entities\DatComponenteConvenio;

class DatConvenio extends Model
{
    protected $connection = 'prestamo';
    public $table = "dat_convenio";

    protected $fillable = [
    	'convenio',
    	'estudio',
    	'monto_financiamiento',
    	'monto_ejecutado',
    	'fecha_emision',
    	'contrato_prestamo_id',
    	'entidad_id',
    	'tipo_moneda_id',
    	'etapa_id',
        'usuario',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function entidad()
    {
        return $this->belongsTo(DatEntidad::class);
    }

    public function contratoPrestamo()
    {
        return $this->belongsTo(DatContratoPrestamo::class);
    }

    public function tipoMoneda()
    {
        return $this->belongsTo(ClaTipoMoneda::class);
    }

    public function etapa()
    {
        return $this->belongsTo(ClaEtapa::class);
    }

    public function componenteConvenios()
    {
        return $this->hasMany(DatComponenteConvenio::class,'convenio_id');
    }

    public function estadoSituaciones()
    {
        return $this->hasMany(DatComponenteConvenio::class);
    }
}
