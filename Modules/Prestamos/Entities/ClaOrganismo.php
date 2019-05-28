<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\ClaTipoOrganismo;
use Modules\Prestamos\Entities\ClaOrganismoFinanciador;

class ClaOrganismo extends Model
{
    protected $connection = 'prestamo';
    public $table = "cla_organismo";

    protected $fillable = [
    	'organismo',
    	'abreviacion',
    	'descripcion',
    	'tipo_organismo_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente',
    ];

    public function tipoOrganimo()
    {
        return $this->belongsTo(ClaTipoOrganismo::class);
    }

    public function organismoFinanciadores()
    {
        return $this->hasMany(ClaOrganismoFinanciador::class,'organismo_id');
    }
}
