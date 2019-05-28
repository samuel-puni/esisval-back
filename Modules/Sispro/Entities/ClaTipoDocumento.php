<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\ClaDocumento;

class ClaTipoDocumento extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_tipo_documento";

    protected $fillable = [
    	'tipo_documento',
    	'abreviacion'
    ];

    public function documentos()
    {
        return $this->hasMany(ClaDocumento::class);
    }
}
