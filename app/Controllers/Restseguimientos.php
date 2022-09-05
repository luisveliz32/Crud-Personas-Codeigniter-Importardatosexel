<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Seguimiento;
class Restseguimientos extends ResourceController{
    protected $modelName = 'App\Models\Seguimiento';
    protected $format    = 'json';

    function create(){
        $material=new Seguimiento();
        
            if($imagen1=$this->request->getFile('imagen1')){
                $nuevonombre1=$imagen1->getRandomName();
                $imagen1->move('../public/uploads/',$nuevonombre1);
            }else {
                $nuevonombre1="";
            }
            if($imagen2=$this->request->getFile('imagen2')){
                $nuevonombre2=$imagen2->getRandomName();
                $imagen2->move('../public/uploads/',$nuevonombre2);
            }else {
                $nuevonombre2="";
            }
            if($imagen3=$this->request->getFile('imagen3')){
                $nuevonombre3=$imagen3->getRandomName();
                $imagen3->move('../public/uploads/',$nuevonombre3);
            }else {
                $nuevonombre3="";
            }
            if($imagen4=$this->request->getFile('imagen4')){
                $nuevonombre4=$imagen4->getRandomName();
                $imagen4->move('../public/uploads/',$nuevonombre4);
            }else {
                $nuevonombre4="";
            }

            $id=$material->insert([
                'descripcion'=>$this->request->getPost('descripcion'),
                'imagen1'=>$nuevonombre1,
                'imagen2'=>$nuevonombre2,
                'imagen3'=>$nuevonombre3,
                'imagen4'=>$nuevonombre4,
            ]);
            return $this->genericResponce($this->request->getPost(),"",200);
       
    }
    //funcion generica para mostrar data mesajes codigo 
    private function genericResponce($data,$msj,$code){
        if($code==200){
            return $this->respond(array(
                "data"=>$data,
                "code"=>$code,
            ));
        }else{
            return $this->respond(array(
                "msj"=>$msj,
                "code"=>$code,
            ));
        }
    }
}