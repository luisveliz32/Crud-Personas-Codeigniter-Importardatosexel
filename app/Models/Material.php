<?php 
namespace App\Models;

use CodeIgniter\Model;

class Material extends Model{
    protected $table      = 'materiales';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields= ['id_documento',	'nro',	'iten_material'	,'unidades'	,'marca'	,'precio'];
}