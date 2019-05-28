<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\DatUpi;
use Illuminate\Database\Eloquent\Model;

class ClaEstadoDocumento extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_estado_documento";

    protected $fillable = [
    	'estado_documento',
    	'abreviacion'
    ];

    protected $hidden = [
        'vigente',
        'pivot',
    ];

    public function upis()
    {
    	return $this->belongsToMany(DatUpi::class,'rel_estado_documento_upi','estado_documento_id','upi_id');
    }
}
