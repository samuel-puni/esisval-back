<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemanda;
use Modules\Sispro\Entities\DatDemandaPlan;
use Modules\Sispro\Entities\DatSectorEconomico;
use Modules\Sispro\Entities\DatDemandaIndicador;
use Modules\Sispro\Entities\DatDemandaGrupoComponente;

class DatDemandaSectorEconomico extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda_sector_economico";

    protected $fillable = [
    	'demanda_id',
    	'sector_economico_id',
    	'vigente',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function demanda()
    {
        return $this->belongsTo(DatDemanda::class,'demanda_id');
    }

	public function sectorEconomico()
    {
        return $this->belongsTo(DatSectorEconomico::class,'sector_economico_id');
    }

    public function demandaPlanes()
    {
        return $this->hasMany(DatDemandaPlan::class,'demanda_sector_economico_id');
    }

    public function demandaIndicadores()
    {
        return $this->hasMany(DatDemandaIndicador::class);
    }

    public function demandaGrupoComponentes()
    {
        return $this->hasMany(DatDemandaGrupoComponente::class,'demanda_sector_economico_id');
    }
}
