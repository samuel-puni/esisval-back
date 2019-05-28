<?php

namespace Modules\Rbac\Http\Controllers\Acceso;

use Illuminate\Http\Request;
use Modules\Rbac\Entities\Menu;
use App\Http\Controllers\ApiController;

class MenuController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        //$this->middleware('auth:api');
        //$this->middleware('client_credentials')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return $this->showAll($menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'menu'=>'required',
        ];

        $this->validate($request,$rules);
        $campos = $request->all();
        $menu = Menu::create($campos);

        return $this->showOne($menu,201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return $this->showOne($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if($request->has('menu'))
        {
            $menu->menu = $request->menu;
        }

        if($request->has('descripcion'))
        {
            $menu->descripcion = $request->descripcion;
        }

        if($request->has('orden'))
        {
            $menu->orden = $request->orden;
        }

        if($request->has('ruta'))
        {
            $menu->ruta = $request->ruta;
        }

        if($request->has('tipo'))
        {
            $menu->tipo = $request->tipo;
        }

        if($request->has('nivel'))
        {
            $menu->nivel = $request->nivel;
        }

        if($request->has('icono'))
        {
            $menu->icono = $request->icono;
        }


        if(!$menu->isDirty())
        {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $menu->save();

        return $this->showOne($menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return $this->showOne($menu);
    }
    
}
