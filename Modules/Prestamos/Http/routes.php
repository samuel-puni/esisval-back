<?php

Route::group(['middleware' => 'api', 'prefix' => 'prestamo', 'namespace' => 'Modules\Prestamos\Http\Controllers'], function()
{

	Route::apiResource('clasificadores','ClasificadoresController',['only' => ['index']]);
	///Contrato de prestamo
	Route::apiResource('prestamo','Prestamo\PrestamoController',['only' => ['index','show','store','destroy','update']]);
	Route::apiResource('componente','Componente\ComponenteController',['only' => ['store','destroy']]);
	Route::apiResource('programacion','ProgramacionPrestamo\ProgramacionPrestamoController',['only' => ['store','destroy','update']]);
	///Convenios de financiamiento
	Route::apiResource('convenio','Convenio\ConvenioController',['only' => ['index','store','destroy','update','show']]);
	Route::apiResource('conveniocomponente','Componente\ComponenteConvenioController',['only' => ['store','destroy','update']]);
	Route::apiResource('conveniodesembolso','Convenio\ConveinoDesembolsoController',['only' => ['store','destroy','update']]);
	
});
