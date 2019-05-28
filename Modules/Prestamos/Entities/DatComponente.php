<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatContratoPrestamo;
use Modules\Prestamos\Entities\DatProgramacionPrestamo;

class DatComponente extends Model
{
    protected $connection = 'prestamo';
    public $table = "dat_componente";

    protected $fillable = [
    	'componente',
    	'abreviacion',
    	'contrato_prestamo_id',
    	'componente_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hijoComponentes()
    {
        return $this->hasMany(DatComponente::class,'componente_id');
    }

	public function hijoComponente()
    {
        return $this->belongsTo(DatComponente::class);
    }

    public function contratoPrestamo()
    {
        return $this->belongsTo(DatContratoPrestamo::class);
    }

    public function programacionPrestamos()
    {
        return $this->hasMany(DatProgramacionPrestamo::class,'componente_id');
    }
}
