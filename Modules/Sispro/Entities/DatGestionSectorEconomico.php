<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\SisGestion;
use Modules\Sispro\Entities\DatSectorEconomico;

class DatGestionSectorEconomico extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_gestion_sector_economico";

    protected $fillable = [
    	'gestion_id',
    	'sector_economico_id',
    	'envio_sigma',

    ];

    public function sectorEconomico()
    {
        return $this->belongsTo(DatSectorEconomico::class,'sector_economico_id');
    }

	public function gestion()
    {
        return $this->belongsTo(SisGestion::class);
    }
}
