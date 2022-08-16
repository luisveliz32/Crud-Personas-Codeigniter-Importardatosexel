<?php 
namespace App\Models;

use CodeIgniter\Model;

class Documento extends Model{
    protected $table      = 'documentos';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     
     protected $allowedFields= ['url','descripcion','fecha'];
}