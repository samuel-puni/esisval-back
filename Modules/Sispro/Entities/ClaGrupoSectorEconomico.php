<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatSectorEconomico;

class ClaGrupoSectorEconomico extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_grupo_sector_economico";

    protected $fillable = [
    	'grupo_sector_economico',
    	'abreviacion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function sectorEconomicos()
    {
        return $this->hasMany(DatSectorEconomico::class);
    }
}
