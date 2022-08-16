<?php 
namespace App\Models;

use CodeIgniter\Model;

class Persona extends Model{
    protected $table      = 'personas';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields= ['nombre_completo','fecha_nacimiento','imagen','estado'];
}