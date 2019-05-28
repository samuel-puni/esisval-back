<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\ClaOrganismo;

class ClaTipoOrganismo extends Model
{
    protected $connection = 'prestamo';
    public $table = "cla_tipo_organismo";

    protected $fillable = [
    	'tipo_organismo',
    	'abreviacion',
    	'descripcion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente',
    ];

    public function organimos()
    {
        return $this->hasMany(ClaOrganismo::class);
    }
}
