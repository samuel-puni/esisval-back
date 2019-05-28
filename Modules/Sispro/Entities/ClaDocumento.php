<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatUpiDocumento;

class ClaDocumento extends Model
{
    protected $connection = 'sispro'; 
    public $table = "cla_documento";

    protected $fillable = [
    	'documento',
    	'abreviacion',
    	'tipo_documento_id',
    	'vigente'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function upiDocumentos()
    {
        return $this->hasMany(DatUpiDocumento::class);
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(ClatipoDocumento::class,'tipo_documento_id');
    }
}
