<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class ViewListaSectorEconomico extends Model
{
	protected $connection = 'sispro'; 
    public $table = "view_lista_sector_economico";

    protected $fillable = [
    	'codigo_presupuestario',
    	'sector_economico',
    	'id_sub_sector',
    	'cod_sub_sector',
    	'sub_sector',
    	'id_tipo_proyecto',
    	'cod_tipo_proyecto',
    	'tipo_proyecto'
    ];
}
