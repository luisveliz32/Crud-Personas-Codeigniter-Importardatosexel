<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;
class Restseguimientos extends ResourceController{
    protected $modelName = 'App\Models\Material';
    protected $format    = 'json';

}