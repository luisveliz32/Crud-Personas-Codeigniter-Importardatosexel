<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Material;
use App\Models\Documento;

class RestMateriales extends ResourceController
{
    protected $modelName = 'App\Models\Material';
    protected $format    = 'json';


    //Mostrando todos los materiales
    public function index()
    {
        return $this->genericResponce($this->model->findAll(),"",200);
    }


    //Mostrando un material en especfico
    public function show($id=null)
    {
        if ($id==null) {
            return $this->genericResponce(null,"ID NO FUE ENCONTRADO",500);    
        }

        $material=$this->model->find($id);
        if (!$material) {
            return $this->genericResponce(null,"EL MATERIAL NO EXISTE",500);
        }
        return $this->genericResponce($material,"",200);
    }

    //funcion para crear un material
    function create(){
        $material=new Material();
        $documento=new Documento();
        if ($this->validate('materiales')) {
            if (!$this->request->getPost('id_documento')) {
                return $this->genericResponce(null,array("id_documento"=>"Documento no existe"),500);
            }
            if (!$documento->find($this->request->getPost('id_documento'))) {
                return $this->genericResponce(null,array("id_documento"=>"Documento no existe"),500);
            }

            $id=$material->insert([
                'id_documento'=>$this->request->getPost('id_documento'),
                'nro'=>$this->request->getPost('nro'),
                'iten_material'=>$this->request->getPost('iten_material'),
                'unidades'=>$this->request->getPost('unidades'),
                'marca'=>$this->request->getPost('marca'),
                'precio'=>$this->request->getPost('precio'),
                
            ]);
            return $this->genericResponce($this->model->find($id),"",200);
        }
        $validation= \Config\Services::validation();
        return $this->genericResponce(null,$validation->getErrors(),500);
    }


    //editar material 
    function update($id=null){
        $material=new Material();
        $documento=new Documento();

        $data = $this->request->getRawInput();
        
        if ($this->validate('materiales')) {
            if (!$data['id_documento']) {
                return $this->genericResponce(null,array("id_documento"=>"Documento no existe"),500);
            }
            if (!$documento->find($data['id_documento'])) {
                return $this->genericResponce(null,array("id_documento"=>"Documento no existe"),500);
            }

            $material->update($id,[
                'id_documento'=>$data['id_documento'],
                'nro'=>$data['nro'],
                'iten_material'=>$data['iten_material'],
                'unidades'=>$data['unidades'],
                'marca'=>$data['marca'],
                'precio'=>$data['precio'],
                
            ]);
            return $this->genericResponce($this->model->find($id),"",200);
        }
        $validation= \Config\Services::validation();
        return $this->genericResponce(null,$validation->getErrors(),500);
    }

    //eliminando un material un material en especfico
    public function delete($id=null)
    {
        

       // $this->model->delete($id);
        
        return $this->genericResponce("material $id eliminado con exito ","",200);
    }
    public function imagen()
    {
        

        $imagen = $this->request->getFile('imagen');
			if(! $file->isValid())
				return $this->fail($file->getErrorString());

			$imagen->move('./public/uploads');
            

			
        
        return $this->genericResponce("imagen subida con exito","",200);
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