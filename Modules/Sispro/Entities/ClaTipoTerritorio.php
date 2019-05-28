<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaTerritorio;

class ClaTipoTerritorio extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_territorio";

    protected $fillable = [
    	'tipo_territorio',
    	'abreviacion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function territorios()
    {
        return $this->hasMany(ClaTerritorio::class);
    }
}
