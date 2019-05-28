<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatSectorEconomico;

class DatUpiSectorEconomico extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi_sector_economico";

    protected $fillable = [
    	'upi_id',
    	'sector_economico_id',
    	'vigente',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function demanda()
    {
        return $this->belongsTo(DatUpi::class,'upi_id');
    }

	public function sectorEconomico()
    {
        return $this->belongsTo(DatSectorEconomico::class,'sector_economico_id');
    }

}
