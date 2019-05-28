<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaIndicador;
use Modules\Sispro\Entities\DatUpiSectorEconomico;
use Modules\Sispro\Entities\ClaTipoSectorEconomico;
use Modules\Sispro\Entities\ClaGrupoSectorEconomico;
use Modules\Sispro\Entities\DatDemandaSectorEconomico;

class DatSectorEconomico extends Model
{
	protected $connection = 'sispro'; 
    public $table = "dat_sector_economico";

    protected $fillable = [
    	'sector_economico',
    	'abreviacion',
    	'codigo_presupuestario',
    	'sector_economico_id',

    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'tipo_sector_economico_id',
        'grupo_sector_economico_id',
    ];

    public function hijosSectorEconomicos()
    {
        return $this->hasMany(DatSectorEconomico::class,'sector_economico_id');
    }

	public function hijoSectorEconomico()
    {
        return $this->belongsTo(DatSectorEconomico::class,'sector_economico_id');
    }    

    public function demandaSectorEconomicos()
    {
        return $this->hasMany(DatDemandaSectorEconomico::class);
    }

    public function upiSectorEconomicos()
    {
        return $this->hasMany(DatUpiSectorEconomico::class);
    }

    public function tipoSectorEconomico()
    {
        return $this->belongsTo(ClaTipoSectorEconomico::class);
    }

	public function grupoSectorEconomico()
    {
        return $this->belongsTo(ClaGrupoSectorEconomico::class);
    }    

    public function indicadores()
    {
        return $this->belongsToMany(ClaIndicador::class);
    }
}
