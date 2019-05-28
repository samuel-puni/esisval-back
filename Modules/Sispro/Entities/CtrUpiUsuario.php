<?php

namespace Modules\Sispro\Entities;

use Illuminate\Database\Eloquent\Model;

class CtrUpiUsuario extends Model
{
    protected $connection = 'sispro'; 
    public $table = "ctr_upi_usuario";
    public $timestamps = false;

    protected $fillable = [
    	'usuario',
    	'usuario_asignado'
    ];
}
