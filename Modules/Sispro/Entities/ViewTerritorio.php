<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class ViewTerritorio extends Model
{
    protected $connection = 'sispro'; 
    public $table = "view_territorio";

    protected $fillable = [
    	'localizacion_geografica',
    	'area_influencia',
    	'demanda_id',
    	'territorio_id',
    	'territorio',
    	'codigo_presupuestario',
    	'tipo_territorio_id',
        'vigente',
    	'codigo_presupuestario_padre',
    ];

    public function getMunicipios()
    {
        return $this->hasMany(ViewTerritorio::class,'codigo_presupuestario_padre','codigo_presupuestario');
    }

	public function getMunicipio()
    {
        return $this->belongsTo(ViewTerritorio::class);
    } 
}
