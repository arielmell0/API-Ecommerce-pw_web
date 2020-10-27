<?php
session_start();

$requestMethod = $_SERVER['REQUEST_METHOD']; //get, post, put, delete
$local = $_SERVER['SCRIPT_NAME']; //localhost/rest_api/index.php
$uri = $_SERVER['PHP_SELF']; //localhost/rest_api/index.php/xxx/123
$rout = str_replace($local,'', $uri); // /xx/123/a

$uriSegments = explode('/', $rout);//faz o array com os seguimentos de url

if(isset($uriSegments[1])){
    $controller = $uriSegments[1];
    switch ($controller) {
        case 'contacts':
        require_once('controllers/ClientsController.php');
        $Clients = new ClientsController();
            switch ($requestMethod) {
                case 'GET':
                    if(isset($uriSegments[2]) && $uriSegments[2] != ''){
                        $Clients -> listClient($uriSegments[2]);
                    }else{
                        $Clients -> listClients();
                    }
                break;
                
                case 'POST':
                    $Clients -> insertClient();
                break;

            }

        break;

        case 'users':
        require_once('controllers/UsersController.php');
        $Users = new UsersController();
            switch ($requestMethod) {
                case 'GET':
                    if(isset($uriSegments[2]) && $uriSegments[2] == 'login'){
                        if(!isset($uriSegments[3]) || $uriSegments[3] == ''){
                            $Users -> login();
                    }
                }
                break;
                
                default:
                    # code...
                    break;
            }
            
        break;
    }
}

?>
