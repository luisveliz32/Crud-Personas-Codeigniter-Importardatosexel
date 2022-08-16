<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use \App\Libraries\Auth2;
use \OAuth2\Request;
use \OAuth2\Response;


class Filtroauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
       $oauth = new Auth2();
       $request = Request::createFromGlobals();
       $response = new Response();

       if(!$oauth->server->verifyResourceRequest($request)){
         $oauth->server->getResponse()->send();
         die();
       }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response,$arguments = null)
    {
        // Do something here
    }
}