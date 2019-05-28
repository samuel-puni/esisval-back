<?php

namespace Modules\Rbac\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Rbac\Entities\Sistema;
use Modules\Rbac\Entities\ViewMenu;
use App\Http\Controllers\ApiController;

class UserAccesoController extends ApiController
{
    public function __construct()
    {
        //parent::__construct();
    }
    
    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(User $user,Sistema $acceso)
    {
        $sistema_id = $acceso->id;
        $rol = $user->roles()->whereHas('sistemas', function($q) use ($sistema_id){
            $q->where('id', $sistema_id);
        })
        ->get()
        ->first();
        $rol = json_decode($rol, true);

        //MENUS
        $rol_id = $rol['id'];
        $menus = ViewMenu::with(['menusHijos' => function($q) use ($rol_id){
                    $q->orderBy('orden', 'asc');
                    $q->where('vigente',1);
                    $q->where('rol_id',$rol_id);
                },'menusHijos.menusHijos' => function($q) use ($rol_id){
                    $q->orderBy('orden', 'asc');
                    $q->where('vigente',1);
                    $q->where('rol_id',$rol_id);
                },'menusHijos.menusHijos.menusHijos' => function($q) use ($rol_id){
                    $q->orderBy('orden', 'asc');
                    $q->where('vigente',1);
                    $q->where('rol_id',$rol_id);
                }])
        ->where('rol_id',$rol['id'])
        ->where('nivel',1)
        ->orderBy('orden', 'asc')
        ->get();
        $menus = json_decode($menus, true);

        $user = json_decode($user, true);
        $data = array_merge(
            ['acceso'=>['sistema'=> $acceso,
                'usuario'=>$user,
                'rol'=>$rol,
                'menu'=>$menus]]);

        return response()->json($data,200);
        //return view('rbac::show');
    }
}
