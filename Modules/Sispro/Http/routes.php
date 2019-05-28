<?php

Route::group(['middleware' => 'api', 'prefix' => 'sispro', 'namespace' => 'Modules\Sispro\Http\Controllers'], function()
{
	////API PARA EL SISTEMA SISPRO
	Route::apiResource('demanda','Demanda\DemandaController',['only' => ['show','index','store','update']]);
	Route::apiResource('demandaregistro','Demanda\DemandaRegistroController',['only' => ['index','show']]);
	Route::apiResource('demandaentidad','DemandaEntidad\DemandaEntidadController',['only' => ['store','destroy','update']]);
	Route::apiResource('demandasector','DemandaSectorEconomico\DemandaSectorEconomicoController',['only' => ['store','destroy','update']]);
	Route::apiResource('demandaplan','DemandaPlan\DemandaPlanController',['only' => ['show','store','update']]);
	Route::apiResource('demandaterritorio','DemandaTerritorio\DemandaTerritorioController',['only' => ['store','destroy','update']]);
	////
	Route::apiResource('programacionsectoreconomico','Demanda\DemandaProgramacionController',['only' => ['show']]);
	Route::apiResource('programacionpdes','ProgramacionPdes\ProgramacionPdesController',['only' => ['show','index']]);
	Route::apiResource('programacionetapa','ProgramacionEtapa\ProgramacionEtapaController',['only' => ['store','destroy']]);
	////
	Route::apiResource('clasificadores','ClasificadoresController',['only' => ['index']]);
	Route::apiResource('entidad','Entidad\EntidadController',['only' => ['index']]);
	Route::apiResource('accioninversion','AccionInversion\AccionInversionController',['only' => ['index']]);
	Route::apiResource('tipodemanda','TipoDemanda\TipoDemandaController',['only' => ['index']]);
	Route::apiResource('sectoreconomico','SectorEconomico\SectorEconomicoController',['only' => ['index']]);
	Route::apiResource('listasectoreconomico','SectorEconomico\ListaSectorEconomicoController',['only' => ['index']]);
	///
	Route::apiResource('unidadmedida','UnidadMedida\UnidadMedidaController');
	Route::apiResource('indicador','Indicador\IndicadorController');
	Route::apiResource('indicadorunidadmedida','Indicador\IndicadorUnidadMedidaController',['only' => ['show','update']]);
	Route::apiResource('indicadorsectoreconomico','Indicador\IndicadorSectorEconomicoController',['only' => ['show','update']]);
	///Modulo UPI
	Route::apiResource('upi','Upi\UpiController');
	Route::apiResource('upiregistro','Upi\UpiRegistroController',['only' => ['show']]);
	Route::apiResource('upientidad','UpiEntidad\UpiEntidadController',['only' => ['store','destroy','update']]);
	Route::apiResource('upisector','UpiSectorEconomico\UpiSectorEconomicoController',['only' => ['store','destroy','update','delete']]);
	Route::apiResource('upidocumento','UpiDocumento\UpiDocumentoController',['only' => ['store','destroy','update']]);
	Route::apiResource('upiestadodocumento','UpiEstadoDocumento\UpiEstadoDocumentoController',['only' => ['update']]);
	Route::apiResource('upiterritorio','UpiTerritorio\UpiTerritorioController',['only' => ['update','destro']]);
	Route::apiResource('upipdes','UpiPdes\UpiPdesController',['only' => ['update','destroy']]);
	Route::apiResource('upicomponente','UpiComponente\UpiComponenteController',['only' => ['store','destroy','update']]);
	Route::apiResource('upifinanciamiento','UpiFinanciamiento\UpiFinanciamientoController',['only' => ['store','destroy','update']]);
	Route::apiResource('ctrupiusuario','CtrUpiUsuario\CtrUpiUsuarioController',['only' => ['index','store','show']]);
	Route::apiResource('upihojaruta','UpiHojaRuta\UpiHojaRutaController',['only' => ['index','store','destroy','update']]);


});
