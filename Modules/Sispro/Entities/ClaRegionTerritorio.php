<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaTerritorio;

class ClaRegionTerritorio extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_region_territorio";

    protected $fillable = [
    	'region_territorio',
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
