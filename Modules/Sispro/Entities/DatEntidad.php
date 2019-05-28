<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatEntidad;
use Modules\Sispro\Entities\ClaTipoNivel;
use Modules\Sispro\Entities\DatUpiEntidad;
use Modules\Sispro\Entities\ClaTipoEntidad;
use Modules\Sispro\Entities\ClaTipoAdministracion;

class DatEntidad extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_entidad";

    protected $fillable = [
    	'sigla',
    	'entidad',
    	'codigo_presupuestario',
    	'entidad_id',
    	'nombre_corto',
    	'tipo_entidad_id',
    	'tipo_administracion_id',
    	'tipo_nivel_id',
    	'vigente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente',
        'entidad_id',
        'tipo_entidad_id',
        'tipo_administracion_id',
        'tipo_nivel_id',
    ];

    public function upis()
    {
        return $this->hasMany(DatUpi::class);
    }

    public function upiEntidades()
    {
        return $this->hasMany(DatUpiEntidad::class);
    }

    public function demandas()
    {
        return $this->hasMany(DatDemanda::class);
    }

    public function entidades()
    {
        return $this->hasMany(DatEntidad::class);
    }

    public function entidad()
    {
        return $this->belongsTo(DatEntidad::class);
    }

    public function tipoEntidad()
    {
        return $this->belongsTo(ClaTipoEntidad::class);
    }

    public function tipoAdministracion()
    {
        return $this->belongsTo(ClaTipoAdministracion::class);
    }

    public function tipoNivel()
    {
        return $this->belongsTo(ClaTipoNivel::class);
    }

}
