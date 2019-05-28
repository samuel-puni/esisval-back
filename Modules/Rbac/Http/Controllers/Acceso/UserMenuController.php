<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use Modules\Rbac\Entities\Rol;
use App\User;
use App\Http\Controllers\ApiController;

class UserMenuController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
    	//Obtener el ROL para el sistema SISPRO (ID=1)
       	$rol = $user->roles()->whereHas('sistemas', function($q){
			$q->where('id', 1);
		})
		->get()
		->first();
		$data = json_decode($rol, true);
		//Menus del ROL
		$menus = Rol::find($data['id'])
				->menus()
       			->with(['menusHijos' => function($q){
                        $q->where('vigente',1);
                    },'menusHijos.menusHijos' => function($q){
                        $q->where('vigente',1);
                    },'menusHijos.menusHijos.menusHijos' => function($q){
                        $q->where('vigente',1);
                    }])
       			->get()
       			->where('nivel',1)
       			->where('vigente',1)
       			->values();

       return $this->showAll($menus);
    }
}
