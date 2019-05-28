<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DatDemandaGrupoComponente extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda_grupo_componente";

    protected $fillable = [
    	'descripcion',
    	'demanda_sector_economico_id',
    	'grupo_componente_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function demandaSectorEconomico()
    {
        return $this->belongsTo(DatDemandaSectorEconomico::class,'demanda_sector_economico_id');
    }

    public function grupoComponente()
    {
        return $this->belongsTo(ClaGrupoComponente::class,'grupo_componente_id');
    }

    public function demandaEtapas()
    {
        return $this->hasMany(DatDemandaEtapa::class,'demanda_grupo_componente_id');
    }
}
