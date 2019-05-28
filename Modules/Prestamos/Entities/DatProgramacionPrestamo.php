<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatComponente;
use Modules\Prestamos\Entities\ClaOrganismoFinanciador;

class DatProgramacionPrestamo extends Model
{
    protected $connection = 'prestamo';
    public $table = "dat_programacion_prestamo";

    protected $fillable = [
    	'presupuesto_inicial',
    	'presupuesto_modificado',
    	'presupuesto_vigente',
    	'componente_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

	public function componente()
    {
        return $this->belongsTo(DatComponente::class,'componente_id');
    }
    
}
