<?php

Route::group(['middleware' => 'api', 'prefix' => 'rbac', 'namespace' => 'Modules\Rbac\Http\Controllers'], function()
{
    //Rutas para users
	Route::apiResource('users','Acceso\UserController');
	Route::apiResource('users.sistemas','Acceso\UserRolController',['only' => ['index']]);
	Route::apiResource('users.menus','Acceso\UserMenuController',['only' => ['index']]);
	Route::apiResource('users.acceso','UserAccesoController',['only' => ['show']]);
	
	//rutas para sistemas
	Route::apiResource('sistemas','Acceso\SistemaController');

	//rutas para los roles
	Route::apiResource('roles','Acceso\RolController');

	//rutas para el menu y tabs
	Route::apiResource('menus','Acceso\MenuController');

	//Rutas para objetos
	Route::apiResource('objetos','Acceso\ObjetoController');

	//Rutas para operaciones
	Route::apiResource('operaciones','Acceso\OperacionController');

	//Rutas para operaciones
	Route::apiResource('permisos','Acceso\PermisoController');


});
