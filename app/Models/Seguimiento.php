<?php 
namespace App\Models;

use CodeIgniter\Model;

class Seguimiento extends Model{
    protected $table      = 'material';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
    protected $allowedFields= ['descripcion',	'imagen1'	,'imagen2'	,'imagen3'	,'imagen4'];
}