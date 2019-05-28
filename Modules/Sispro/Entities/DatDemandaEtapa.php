<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaDemandaEtapa;
use Modules\Sispro\Entities\DatDemandaGrupoComponente;

class DatDemandaEtapa extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_demanda_etapa";

    protected $fillable = [
    	'mes_inicio',
    	'duracion',
    	'demanda_etapa_id',
    	'demanda_grupo_componente_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function demandaGrupoComponente()
    {
        return $this->belongsTo(DatDemandaGrupoComponente::class,'demanda_grupo_componente_id');
    }

    public function demandaEtapa()
    {
        return $this->belongsTo(ClaDemandaEtapa::class,'demanda_etapa_id');
    }
}
