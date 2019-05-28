<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(Request $request){
		
		$reporte = $request->reporte;
		if ($reporte=='upi.rptdesign')
		{
			$id = $request->id;
			$url = $reporte.'&id='.$id;
		}
		if ($reporte=='upireporte.rptdesign')
		{
			$id = $request->id;
			$responsable = $request->responsable;
			$url = $reporte.'&id='.$id.'&responsable='.urlencode($responsable);
		}
		if ($reporte=='listaproyectos.rptdesign')
		{
			$parm = "";
			if(isset($request->responsable))
			{
				$datos = explode(",", $request->responsable);
				foreach ($datos as $key => $value) {
					$datos[$key]="'".$datos[$key]."'";
				}
				$responsable = implode(",", $datos);
				$parm=$parm."&responsable=".urlencode($responsable);
			}
			if(isset($request->tipo_requerimiento))
			{
				$parm=$parm."&tipo_requerimiento=".$request->tipo_requerimiento;
			}
			if(isset($request->estado_situacion))
			{
				$parm=$parm."&estado_situacion=".$request->estado_situacion;
			}
			if(isset($request->documento))
			{
				$parm=$parm."&documento=".$request->documento;
			}
			if(isset($request->sector))
			{
				$parm=$parm."&sector=".$request->sector;
			}
			$usuario = $request->usuario;
			$url = $reporte.'&usuario='.$usuario.$parm;
			$arch = 'reporte_'.date('Ymdhis').'.xlsx';
		    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		    header('Content-Disposition: attachment; filename="'.$arch.'"');
		    readfile('http://172.16.0.144:8080/birt/frameset?__report='.$url.'&&__format=xlsx&');
	    	exit;
		}
		if ($reporte=='listaproyectoscomitepreinversion.rptdesign')
		{
			$url = $reporte;
			$arch = 'reportepreinversion_'.date('Ymdhis').'.xlsx';
		    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		    header('Content-Disposition: attachment; filename="'.$arch.'"');
		    readfile('http://172.16.0.144:8080/birt/frameset?__report='.$url.'&&__format=xlsx&');
	    	exit;
		}
		if ($reporte=='listaproyectoscomiteinversion.rptdesign')
		{
			$url = $reporte;
			$arch = 'reporteinversion_'.date('Ymdhis').'.xlsx';
		    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		    header('Content-Disposition: attachment; filename="'.$arch.'"');
		    readfile('http://172.16.0.144:8080/birt/frameset?__report='.$url.'&&__format=xlsx&');
	    	exit;
		}
	    $arch = 'reporte_'.date('Ymdhis').'.pdf';
	    header('Content-type: application/pdf');
	    header('Content-Disposition: attachment; filename="'.$arch.'"');
	    readfile('http://172.16.0.144:8080/birt/frameset?__report='.$url.'&&__format=pdf&');
    	exit;
    }
}
