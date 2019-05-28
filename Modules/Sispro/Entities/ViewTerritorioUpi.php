<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class ViewTerritorioUpi extends Model
{
    protected $connection = 'sispro'; 
    public $table = "view_territorio_upi";

    protected $fillable = [
    	'upi_id',
    	'territorio',
    	'codigo_presupuestario',
    	'tipo_territorio_id',
        'vigente',
    	'codigo_presupuestario_padre'
    ];

    public function getMunicipios()
    {
        return $this->hasMany(ViewTerritorioUpi::class,'codigo_presupuestario_padre','codigo_presupuestario');
    }

	public function getMunicipio()
    {
        return $this->belongsTo(ViewTerritorioUpi::class);
    } 
}
