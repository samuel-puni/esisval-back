<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;

class ClaTipoRequerimiento extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_requerimiento";

    protected $fillable = [
    	'tipo_requerimiento',
    	'abreviacion',
    	'descripcion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'vigente'
    ];

    public function upis()
    {
        return $this->hasMany(DatUpi::class);
    }
}
