<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
require APPPATH . '../vendor\setasign\fpdf\fpdf.php';
use FPDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Persona;
class Reporte extends BaseController{
    public function fpdf()
    {
        $pdf = new Pdf('P','mm',array(215.9,279.4));
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        for($i=1;$i<=100;$i++)
            $pdf->Cell(0,10,utf8_decode('Imprimiendo Producto número ').$i,1,1);
        $pdf->Output();
        exit;


    }

    public function dompdf()
    {
        $Persona=new Persona();
        $datos['personas']=$Persona->where('estado', 1)->orderBy('id','ASC')->paginate(5);
        /*$datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/pie');
        $datos['js']=view('template/js');*/
        $options = new Options();
        $options->set('isHtml5ParserEnabled', 'true');
        $options->set('isRemoteEnabled',true);      
        $dumpdf= new Dompdf($options);
        $html=view('prueva',$datos);
        $dumpdf->loadHtml($html);
        $dumpdf->setPaper( array(0, 0, 612.00, 792.00),);
        $dumpdf->render();
        $dumpdf->stream("pdf",array("Attachment"=>false));


    }

}

class Pdf extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->SetFillColor(52, 152, 219); //color del fondo
        $this->SetDrawColor(52, 152, 219); //color del fondo
        $this->Rect(0,0,250,28,"F") ;
        $this->Image('../public/uploads/1651870587_0f19316cd92c05c97bc3.png',10,5,18,20);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'Productos',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final 
        
        $this->SetY(-15);
        $this->SetFillColor(52, 152, 219); //color del fondo
        $this->SetDrawColor(52, 152, 219); //color del fondo
        $this->Rect(0,251.4,300,28,"F");
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
