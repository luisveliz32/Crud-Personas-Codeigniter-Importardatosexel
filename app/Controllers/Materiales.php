<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Material;
use App\Models\Documento;
class Materiales extends Controller{
    public $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function materiales($id=null){
        $documento=new Documento();
        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/pie');
        $datos['js']=view('template/js');
        $datos['documento']=$documento->where('id',$id )->first();
        return view('usuarios/listarmateriales',$datos); 
    }
    //data table
    public function listarmateriales($id=null){
        $valor_buscado = $this->request->getGet('search')['value'];
            $table_map = [
               // 0 => 'id',
                //1 => 'id_documento',
                0 => 'nro',
                1 => 'iten_material',
                2 => 'unidades',
                3 => 'marca',
                4 => 'precio',
                
            ];
            $sql_count="SELECT count(id) as total From materiales WHERE id_documento=".$id;
            $sql_data="SELECT * FROM materiales WHERE id_documento=".$id;
            $condition= "";
    
            if(!empty($valor_buscado)){
                foreach($table_map as $key=>$val){
                    if ($table_map[$key]== 'precio') {
                        $condition .=" OR ".$val." LIKE '%".$valor_buscado."%')";
                    }
                    if($table_map[$key]== 'nro' ){
                        $condition .=" AND (".$val." LIKE '%".$valor_buscado."%'";
                    }
                    if (($table_map[$key]!== 'nro') && ($table_map[$key]!== 'precio')) {
                        $condition .=" OR ".$val." LIKE '%".$valor_buscado."%'";  
                    }
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

    //EDITAR INPUTS DATATABLE
    public function editarmaterial($id=null){
        $material= new Material();
       
        $name=$this->request->getVar('name');
        $data=[
            "$name"=>$this->request->getVar('dato'),
            
        ];
        $material->update($id,$data);
        return $this->request->getVar('dato');
        
    }
    //exportando a exel
    public function exportarexel($id=null){
        $material= new Material();
       
       $datos=$material->where('id_documento', $id)->findAll();
       
       
       $exel= new Spreadsheet();
       $hojaactiva=$exel->getActiveSheet();
       $hojaactiva->setTitle("Materiales");

       $hojaactiva->setCellValue('A1','Nro');
       $hojaactiva->setCellValue('B1','ItemMaterial');
       $hojaactiva->setCellValue('C1','unidades');
       $hojaactiva->setCellValue('D1','Marca');
       $hojaactiva->setCellValue('E1','Precio');
       $fila=2;
       foreach ( $datos as $rows) {
        $hojaactiva->setCellValue('A'. $fila,$rows['nro']);
        $hojaactiva->setCellValue('B'. $fila,$rows['iten_material']);
        $hojaactiva->setCellValue('C'. $fila,$rows['unidades']);
        $hojaactiva->setCellValue('D'. $fila,$rows['marca']);
        $hojaactiva->setCellValue('E'. $fila,$rows['precio']);
        $fila++;
       };

       header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
       header('Content-Disposition: attachment;filename="materiales.xlsx"');
       header('Cache-Control: max-age=0');
       
       $writer = new Xlsx($exel);
      // $writer = IOFactory::createWriter($exel, 'xlsx');
       
       $writer->save('php://output');
       exit;
        
    }
}