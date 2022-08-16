<?php
namespace App\Libraries;
//use OAuth2\Storage\Pdo;
use App\Libraries\CustomOauthStorage;
class Auth2{
    public $server;
    protected $storage;
    protected $dsn;
    protected $db_username;
    protected $db_password;

    public function __construct(){
        $this->dsn='mysql:dbname='.getenv('database.default.database').
                    ';host='.getenv('database.default.hostname').'';
        $this->db_username=getenv('database.default.username');
        $this->db_password=getenv('database.default.password');

        $this->initialize();
    }
    public function initialize(){
        $this->storage= new CustomOauthStorage([
            'dsn'=>$this->dsn,
            'username'=>$this->db_username,
            'password'=>$this->db_password,

        ]);

        $this->server=new \OAuth2\Server($this->storage,array(
           'always_issue_new_refresh_token' => true,
            'refresh_token_lifetime'         => 2419200,));
        //$this->server->addGrantType(new \OAuth2\GrantType\UserCredentials($this->storage));

    }



}