<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatEntidad;
use Modules\Sispro\Entities\ClaTipoDemanda;
use Modules\Sispro\Entities\ClaDemandaEstado;
use Modules\Sispro\Entities\ClaAccionInversion;
use Modules\Sispro\Entities\DatDemandaTerritorio;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DatDemanda extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda";

    protected $fillable = [
    	'codigo_sispro',
    	'entidad_id',
    	'tipo_demanda_id',
    	'accion_inversion_id',
    	'objeto',
    	'localizacion',
    	'nombre_demanda',
        'problema',
        'descripcion',
        'objetivo_general',
        'objetivo_especifico',
    	'demanda_estado_id',
    	'usuario'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function demandaSectorEconomicos()
    {
        return $this->hasMany(DatDemandaSectorEconomico::class,'demanda_id');
    }

    public function demandaTerritorios()
    {
        return $this->hasMany(DatDemandaTerritorio::class,'demanda_id');
    }

    public function entidad()
    {
        return $this->belongsTo(DatEntidad::class);
    }

    public function tipoDemanda()
    {
        return $this->belongsTo(ClaTipoDemanda::class);
    }

    public function accionInversion()
    {
        return $this->belongsTo(ClaAccionInversion::class);
    }

    public function demandaEstado()
    {
        return $this->belongsTo(ClaDemandaEstado::class);
    }
}
