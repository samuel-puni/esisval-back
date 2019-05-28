<?php

namespace Modules\Prestamos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Prestamos\Entities\DatConvenio;

class DatEntidad extends Model
{
    protected $connection = 'prestamo'; 
    public $table = "dat_entidad";

    protected $fillable = [
    	'sigla',
    	'entidad',
    	'codigo_presupuestario',
    	'entidad_id',
    	'nombre_corto',
    	'vigente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function convenios()
    {
        return $this->hasMany(DatConvenio::class);
    }

    public function entidades()
    {
        return $this->hasMany(DatEntidad::class);
    }

    public function entidad()
    {
        return $this->belongsTo(DatEntidad::class);
    }

}
