<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaTipoTerritorio;
use Modules\Sispro\Entities\ClaRegionTerritorio;
use Modules\Sispro\Entities\DatDemandaTerritorio;

class ClaTerritorio extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_territorio";

    protected $fillable = [
    	'territorio',
    	'abreviacion',
    	'vigente',
    	'codigo_presupuestario',
    	'tipo_territorio_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'numero_habitantes_hombres',
    	'numero_habitantes_mujeres',
    	'numero_habitantes_area_urbana',
    	'numero_habitantes_area_rural',
    	'tasa_anual_crecimiento',
    	'hogares_particules',
    	'tamano_promedio_hogar',
    	'latitud',
    	'longitud',
    	'enfoque',
    	'distancia_limite',
    	'region_territorio_id',
    	'unidad',
        'pivot'
    ];

    public function regionTerritorio()
    {
        return $this->belongsTo(ClaRegionTerritorio::class,'region_territorio_id');
    }

	public function tipoTerritorio()
    {
        return $this->belongsTo(ClaTipoTerritorio::class,'tipo_territorio_id');
    }

    public function demandaTerritorios()
    {
        return $this->hasMany(DatDemandaTerritorio::class);
    }

    public function upis()
    {
        return $this->belongsToMany(DatUpi::class,'rel_territorio_upi','territorio_id','upi_id');
    }
}
