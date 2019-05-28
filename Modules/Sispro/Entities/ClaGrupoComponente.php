<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatDemandaGrupoComponente;

class ClaGrupoComponente extends Model
{
	protected $connection = 'sispro'; 
    public $table = "cla_grupo_componente";

    protected $fillable = [
    	'grupo_componente',
    	'sigla',
    	'vigente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function demandaGrupoComponentes()
    {
        return $this->hasMany(DatDemandaGrupoComponente::class);
    }
}
