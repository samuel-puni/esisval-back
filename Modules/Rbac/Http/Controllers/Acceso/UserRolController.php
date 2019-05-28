<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\ApiController;

class UserRolController extends ApiController
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
        $sistema = $user->roles()->whereHas('sistemas', function($q){
                    $q->where('id', '=', 1);
                })
                ->first();
        return $this->showOne($sistema,201); 
    }

    
}
