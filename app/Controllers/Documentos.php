<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use App\Models\Documento;
use App\Models\Material;
class Documentos extends Controller{

    public $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function listardocumentos(){
       
        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/pie');
        $datos['js']=view('template/js');
        return view('usuarios/listardocumentos',$datos); 
    }
        //data table
    public function getdocu_datatables(){

            $valor_buscado = $this->request->getGet('search')['value'];
            $table_map = [
                0 => 'id',
                1 => 'url',
                2 => 'descripcion',
                3 => 'fecha',
            ];
            $sql_count="SELECT count(id) as total From documentos";
            $sql_data="SELECT * FROM documentos";
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
            $documentod=new Documento();
            $material=new Material();
    
            
    
            if($exel=$this->request->getFile('exel')){
                $nuevonombre=$exel->getRandomName();
                $exel->move('../public/documents/',$nuevonombre);
    
                $datos=[
                    'descripcion'=>$this->request->getVar('descripcion'),
                    'url'=>$nuevonombre,
                    'fecha'=>date("Y-m-d"),
                ];
                
                $documentod->insert($datos);
                $documento= IOFactory::load('../public/documents/'.$nuevonombre);
                $totalhojas=$documento->getSheetCount();
                
                $hojaactual=$documento->getSheet(0);
                $nurofilas=$hojaactual->getHighestDataRow();
                $letra=$hojaactual->getHighestColumn();
                $numeroletra=Coordinate::ColumnIndexFromString($letra);
                $ultimoinser=$documentod->orderBy('id','DESC')->first();
                $ul=$ultimoinser['id'];
                for($indicefila=2; $indicefila<=$nurofilas; $indicefila++){
                   
                        $datosm=[
                            'id_documento'=>$ul,
                            'nro'=>$hojaactual->getCellByColumnAndRow(1,$indicefila),
                            'iten_material'=>$hojaactual->getCellByColumnAndRow(2,$indicefila),
                            'unidades'=>$hojaactual->getCellByColumnAndRow(3,$indicefila),
                            'marca'=>$hojaactual->getCellByColumnAndRow(4,$indicefila),
                            'precio'=>$hojaactual->getCellByColumnAndRow(5,$indicefila),

                        ];

                        $material->insert($datosm);
                            
                }
               
            }                
    return json_encode($ultimoinser['id']);
    }

    
};