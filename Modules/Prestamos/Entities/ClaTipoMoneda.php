<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatConvenio;
use Modules\Prestamos\Entities\DatContratoPrestamo;

class ClaTipoMoneda extends Model
{
    protected $connection = 'prestamo';
    public $table = "cla_tipo_moneda";

    protected $fillable = [
    	'tipo_moneda',
    	'abreviacion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente',
    ];

    public function contratoPrestamos()
    {
        return $this->hasMany(DatContratoPrestamo::class);
    }

    public function convenios()
    {
        return $this->hasMany(DatConvenio::class);
    }
}
