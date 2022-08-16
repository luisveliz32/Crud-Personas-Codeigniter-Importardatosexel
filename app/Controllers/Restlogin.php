<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use \App\Libraries\Auth2;
use \OAuth2\Request;
use App\Models\Material;
class Restlogin extends ResourceController{
    protected $modelName = 'App\Models\Material';
    protected $format    = 'json';

    public function login()
    {
        $oauth = new Auth2();
		$request = new Request();
		$respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
		$code = $respond->getStatusCode();
		$body = $respond->getResponseBody();
		//return $this->respond(json_decode($body), $code);
        
        return $this->genericResponce($body,"---",$code);
    }

        //funcion generica para mostrar data mesajes codigo 
        private function genericResponce($data,$msj,$code){
            $materiales= new Material();
            $da=$materiales->orderBy('id','DESC')->first();
            if($code==200){
                return $this->respond(array(
                    "data"=>json_decode($data),
                    "Usuario"=>$da,
                    "code"=>$code,
                ));
            }else{
                return $this->respond(array(
                    "msj"=>$msj,
                    "code"=>json_decode($data),
                ));
            }
        }

}