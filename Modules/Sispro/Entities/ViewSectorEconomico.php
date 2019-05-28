<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ViewSectorEconomico;

class ViewSectorEconomico extends Model
{
	protected $connection = 'sispro'; 
    public $table = "view_sector_economico";

    protected $fillable = [
    	'sector_economico',
    	'codigo_presupuestario',
    	'sector_economico_id',
    ];

    protected $hidden = [
        'tipo_sector_economico_id',
        'grupo_sector_economico_id',
        'abreviacion',
    ];

    public function hijosSectorEconomicos()
    {
        return $this->hasMany(ViewSectorEconomico::class,'sector_economico_id');
    }

	public function hijoSectorEconomico()
    {
        return $this->belongsTo(ViewSectorEconomico::class);
    } 
}
