<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\ClaTipoMoneda;
use Modules\Prestamos\Entities\DatComponente;
use Modules\Prestamos\Entities\DatContratoPrestamo;
use Modules\Prestamos\Entities\ClaOrganismoFinanciador;

class DatContratoPrestamo extends Model
{
    protected $connection = 'prestamo';
    public $table = "dat_contrato_prestamo";

    protected $fillable = [
    	'codigo',
    	'nombre',
        'tipo_moneda_id',
    	'documento_digital',
        'organismo_financiador_id',
        'usuario',
        'vigente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function tipoMoneda()
    {
        return $this->belongsTo(ClaTipoMoneda::class);
    }

    public function organismoFinanciador()
    {
        return $this->belongsTo(ClaOrganismoFinanciador::class);
    }

    public function componentes()
    {
        return $this->hasMany(DatComponente::class,'contrato_prestamo_id');
    }
}
