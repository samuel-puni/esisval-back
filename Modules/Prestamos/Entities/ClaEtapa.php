<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatConvenio;

class ClaEtapa extends Model
{
    protected $connection = 'prestamo';
    public $table = "cla_etapa";

    protected $fillable = [
    	'etapa',
    	'abreviacion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente',
    ];

    public function convenios()
    {
        return $this->hasMany(DatConvenio::class);
    }
}
