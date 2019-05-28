<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaUnidadMedida;
use Modules\Sispro\Entities\ClaTipoIndicador;
use Modules\Sispro\Entities\DatSectorEconomico;
use Modules\Sispro\Entities\DatDemandaIndicador;

class ClaIndicador extends Model
{
	protected $connection = 'sispro'; 
	public $table = "cla_indicador";

    protected $fillable = [
    	'indicador',
    	'abreviacion',
    	'tipo_indicador_id'
    ];
    

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente'
    ];

    public function tipoIndicador()
    {
        return $this->belongsTo(ClaTipoIndicador::class);
    }

    public function unidadMedidas()
    {
    	return $this->belongsToMany(ClaUnidadMedida::class,'rel_indicador_unidad_medida','indicador_id','unidad_medida_id');
    }

    public function sectorEconomicos()
    {
    	return $this->belongsToMany(DatSectorEconomico::class,'rel_indicador_sector_economico','indicador_id','sector_economico_id');
    }

    public function demandaIndicadores()
    {
        return $this->hasMany(DatDemandaIndicador::class);
    }
}
