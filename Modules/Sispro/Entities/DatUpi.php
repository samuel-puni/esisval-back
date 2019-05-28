<?php

namespace Modules\Sispro\Entities;

use Modules\Sispro\Entities\ClaMoneda;
use Illuminate\Database\Eloquent\Model;
use Modules\Sispro\Entities\DatEntidad;
use Modules\Sispro\Entities\ClaEtapaUpi;
use Modules\Sispro\Entities\DatNodoPlan;
use Modules\Sispro\Entities\DatUpiEntidad;
use Modules\Sispro\Entities\DatUpiHojaRuta;
use Modules\Sispro\Entities\DatUpiComponente;
use Modules\Sispro\Entities\ClaEstadoDocumento;
use Modules\Sispro\Entities\ClaEstadoSituacion;
use Modules\Sispro\Entities\ClaTipoRequerimiento;
use Modules\Sispro\Entities\DatUpiFinanciamiento;
use Modules\Sispro\Entities\DatUpiSectorEconomico;
use Modules\Sispro\Entities\DatUpiSituacionActual;

class DatUpi extends Model
{
    protected $connection = 'sispro'; 
    public $table = "dat_upi";

    protected $fillable = [
    	'nombre_upi',
    	'responsable',
        'descripcion',
        'entidad_id',
        'tipo_requerimiento_id',
        'created_at',
        'hoja_ruta',
        'fecha_ingreso_mpd',
        'fecha_ingreso_upi',
        'fecha_emision',
        'observacion',
        'estado_programa_id',
        'tipo_cambio_inicial',
        'moneda_inicial_id',
        'tipo_cambio_ajustada',
        'moneda_ajustada_id',
        'etapa_upi_id',
        'estado_situacion_id',
        'sisfin',
        'observacion_dggfe',
        'descripcion_dggfe',
        'repago',
        'observacion_financiamiento',
        'numero_comite'
    ];
            
    protected $hidden = [
        'updated_at',
        'carta_entidad',
    ];

    public function upiSectorEconomicos()
    {
        return $this->hasMany(DatUpiSectorEconomico::class,'upi_id');
    }

    public function upiSituacionActuales()
    {
        return $this->hasMany(DatUpiSituacionActual::class,'upi_id');
    }

    public function entidad()
    {
        return $this->belongsTo(DatEntidad::class);
    }

    public function tipoRequerimiento()
    {
        return $this->belongsTo(ClaTipoRequerimiento::class);
    }

    public function estadoSituacion()
    {
        return $this->belongsTo(ClaEstadoSituacion::class);
    }

    public function upiEntidades()
    {
        return $this->hasMany(DatUpiEntidad::class);
    }

    public function upiHojaRutas()
    {
        return $this->hasMany(DatUpiHojaRuta::class,'upi_id');
    }

    public function territorios()
    {
        return $this->belongsToMany(ClaTerritorio::class,'rel_territorio_upi','upi_id','territorio_id');
    }

    public function estadoDocumentos()
    {
        return $this->belongsToMany(ClaEstadoDocumento::class,'rel_estado_documento_upi','upi_id','estado_documento_id');
    }

    public function nodoPlanes()
    {
        return $this->belongsToMany(DatNodoPlan::class,'rel_nodo_plan_upi','upi_id','nodo_plan_id');
    }

    public function moneda()
    {
        return $this->belongsTo(ClaMoneda::class);
    }

    public function upiComponentes()
    {
        return $this->hasMany(DatUpiComponente::class,'upi_id');
    }

    public function etapaUpi()
    {
        return $this->belongsTo(ClaEtapaUpi::class);
    }
}
