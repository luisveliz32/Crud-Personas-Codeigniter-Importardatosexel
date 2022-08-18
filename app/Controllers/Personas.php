<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Persona;
class Personas extends BaseController{

    public $db;
    
    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function index(){
        $Persona=new Persona();
        $datos['personas']=$Persona->where('estado', 1)->orderBy('id','ASC')->paginate(5);
        $datos['paginador']=$Persona->pager;
        
        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/pie');
        $datos['js']=view('template/js');

        return view('usuarios/listar',$datos); 
    }
    //data table
    public function get_datatables(){

        $valor_buscado = $this->request->getGet('search')['value'];
        $table_map = [
            0 => 'id',
            1 => 'nombre_completo',
            2 => 'fecha_nacimiento',
            3 => 'imagen',
            4 => 'estado'
        ];
        $sql_count="SELECT count(id) as total From personas";
        $sql_data="SELECT * FROM personas";
        $condition= "";

        if(!empty($valor_buscado)){
            foreach($table_map as $key=>$val){
                if($table_map[$key]== 'id' ){
                    $condition .=" WHERE ".$val." LIKE '%".$valor_buscado."%'";
                }else{
                    $condition .=" OR ".$val." LIKE '%".$valor_buscado."%'";                }
            }
        }

        $sql_count=$sql_count . $condition;
        $sql_data=$sql_data . $condition;

        $total_count=$this->db->query($sql_count)->getRow();

        $sql_data .=" ORDER BY ".$table_map[$this->request->getGet('order')[0]['column']]."
        ".$this->request->getGet('order')[0]['dir']." LIMIT ".$this->request->getGet('start').",
        ".$this->request->getGet('length') ."";

        $data = $this->db->query($sql_data)->getResult();

        $json_data=[
            'draw'=>intval($this->request->getVar('draw')),
            'recordsTotal'=>$total_count->total,
            'recordsFiltered'=>$total_count->total,
            'data'=>$data,
            'debug_query'=>$sql_data
        ];
        
        return json_encode($json_data);
    }

    public function guardar(){
        $persona=new Persona();

        $validacion=$this->validate([
            'nombre_completo'=>'required|min_length[6]',
            'fecha_nacimiento'=>'required',
            'imagen' => [
                
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]'
            ]
        ]);

        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Los Datos Nose Guardaron Complete Todos los Campos');
            return $this->response->redirect(site_url('AdministrarUsuarios'));
        }

        if($imagen=$this->request->getFile('imagen')){
            $nuevonombre=$imagen->getRandomName();
            $imagen->move('../public/uploads/',$nuevonombre);

            $datos=[
                'nombre_completo'=>$this->request->getVar('nombre_completo'),
                'fecha_nacimiento'=>$this->request->getVar('fecha_nacimiento'),
                'imagen'=>$nuevonombre,
                'estado'=>1
            ];

            $persona->insert($datos);
        }
        $session=session();
        $session->setFlashdata('exito','Los Datos se Guardaron con exito');
        return $this->response->redirect(site_url('AdministrarUsuarios'));
        

    }
    public function eliminar($id=null){
        $persona= new Persona();
        
        $datos=[
            'estado'=>0,
        ];
        
        $persona->update($id,$datos);
        $session=session();
        $session->setFlashdata('exito','Los Datos se Guardaron con exito');
        return $this->response->redirect(site_url('AdministrarUsuarios'));
    }
    public function modificar(){
        $persona=new Persona();
        $datos=[
            'nombre_completo'=>$this->request->getVar('nombre_completo'),
            'fecha_nacimiento'=>$this->request->getVar('fecha_nacimiento'),
            
        ];
        $id=$this->request->getVar('id');

        $validacion=$this->validate([
            'nombre_completo'=>'required|min_length[6]',
            'fecha_nacimiento'=>'required',
            
        ]);

        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Los Datos Nose Guardaron Complete Todos los Campos');
            return $this->response->redirect(site_url('AdministrarUsuarios'));
        }

        $persona->update($id,$datos);
        $validacion=$this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]'
            ]
        ]);
        if($validacion){
            if($imagen=$this->request->getFile('imagen')){

                $datospersona=$persona->where('id',$id)->first();
                $ruta=('../public/uploads/'.$datospersona['imagen']);
                
                unlink($ruta);

                $nuevonombre=$imagen->getRandomName();
                $imagen->move('../public/uploads/',$nuevonombre);
    
                $datos=[
                    'imagen'=>$nuevonombre,
                    
                ];
    
                $persona->update($id,$datos);
            }
        }
        $session=session();
        $session->setFlashdata('exito','Los Datos se Guardaron con exito');
        return $this->response->redirect(site_url('AdministrarUsuarios'));
    }
    //EDITAR INPUTS DATATABLE
    public function editar($id=null){
        $persona= new Persona();
       
        $name=$this->request->getVar('name');
        $data=[
            "$name"=>$this->request->getVar('dato'),
            
        ];
        $persona->update($id,$data);
        return $this->request->getVar('dato');
        
    }
}