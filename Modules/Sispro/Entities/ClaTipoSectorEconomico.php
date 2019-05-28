<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatSectorEconomico;

class ClaTipoSectorEconomico extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_sector_economico";

    protected $fillable = [
    	'tipo_sector_economico',
    	'abreviacion',
    	'descripcion'
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
