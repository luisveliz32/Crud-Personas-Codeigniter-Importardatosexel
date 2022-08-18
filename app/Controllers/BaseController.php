<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        echo "HOLA MUNDO";
        $current_UriAux=current_url(true);
        
        $currentUriString=$current_UriAux->getScheme()."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
        $uri =new \CodeIgniter\HTTP\URI($currentUriString); 
        echo $uri->getTotalSegments();
        for ($i=0; $i <$uri->getTotalSegments() ; $i++) { 
            if ($uri->getSegment($i)=="index.php") {
                $uriFinal=str_replace("index.php/","",$uri);
                $uriFinal=str_replace("index.php","",$uriFinal);
                header("Location: $uriFinal");
                echo "esta es la uri ".$uriFinal;
                exit();
            }
        }
        
    
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
