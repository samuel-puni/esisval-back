<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\ClaOrganismo;
use Modules\Prestamos\Entities\DatContratoPrestamo;

class ClaOrganismoFinanciador extends Model
{
    protected $connection = 'prestamo';
    public $table = "cla_organismo_financiador";

    protected $fillable = [
    	'organismo_financiador',
    	'abreviacion',
    	'codigo_presupuestario',
    	'descripcion',
    	'organismo_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente',
    ];

    public function organimo()
    {
        return $this->belongsTo(ClaOrganismo::class);
    }

    public function contratoPrestamos()
    {
        return $this->hasMany(DatContratoPrestamo::class);
    }
}
