<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Persona;

class Home extends BaseController
{
    public function index()
    {
        //$Persona=new Persona();
        //$datos['personas']=$Persona->where('estado', 1)->orderBy('id','ASC')->paginate(5);
        //return view('prueva');
        return $this->redirect(site_url('/AdministrarUsuarios'));
        //$this->response->redirect();
    }
    

    
}
