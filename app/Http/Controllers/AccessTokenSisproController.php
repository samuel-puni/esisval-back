<?php

namespace App\Http\Controllers;

use App\User;
use Response;
use Exception;
use Modules\Rbac\Entities\Rol;
use Modules\Rbac\Entities\Sistema;
use Modules\Rbac\Entities\ViewMenu;
use Modules\Rbac\Entities\ViewSistema;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\OAuth2\Server\Exception\OAuthServerException;
use \Laravel\Passport\Http\Controllers\AccessTokenController as ATC;

class AccessTokenSisproController extends ATC
{
    public function issueToken(ServerRequestInterface $request)
    {
        try {
            $usuario = $request->getParsedBody()['username'];
            $user = User::where('usuario', '=', $usuario)->first();
            if(!$user){
            	//No tiene permisos para accedes al sistema
            	throw new OAuthServerException('Credenciales incorrectas....', 6, 'invalid_credentials', 401);
            }
            $sistema_id = $request->getParsedBody()['sistema_id'];
            ////Obtener el sistema asignado al usuario
            /*$sistema = $user->roles()->with('sistemas')->where('id',$sistema_id)
            	->get()
            	->pluck('sistemas')
            	->collapse();*/
            $sistema = ViewSistema::where('id',$sistema_id)->get();
            
            /// ID = 1 para el SISPRO
            if (!$sistema->contains('id', $sistema_id)){
            	//No tiene permisos para accedes al sistema
            	throw new OAuthServerException('Credenciales incorrectas....', 6, 'invalid_credentials', 401);
            }
            $sistema = Sistema::find($sistema_id);
            //$sistema = json_decode($sistema, true);
            $tokenResponse = parent::issueToken($request);
            //dd($tokenResponse);
            $content = $tokenResponse->getContent();
            //dd($content);
            $data = json_decode($content, true);

            if(isset($data["error"]))
                throw new OAuthServerException('Credenciales incorrectas.', 6, 'invalid_credentials', 401);
            //dd($data);
            
            ///ROL
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
                ['token'=>$data],
                ['acceso'=>['sistema'=> $sistema,
                    'usuario'=>$user,
                    'rol'=>$rol,
                    'menu'=>$menus]]);
            return response()->json($data,200);
        }
        catch (ModelNotFoundException $e) { 
            return response(["message" => "EL modelo usuario no existe", "code" => 500], 500);
        }
        catch (OAuthServerException $e) { 
            return response(["message" => "Credenciales incorrectas", "code" => 401], 401);
        }
        catch (Exception $e) {
            return response(["message".$e => "Internal server error".$e, "code" => 500], 500);
        }
    }
}