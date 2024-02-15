<?php 

// Se incluyen las clases necesarias
require '../core/Router.php';
require '../app/controllers/Compra.php';
require '../app/controllers/Producto.php';
require '../app/controllers/Usuario.php';
require '../core/DatabaseSingleton.php';
require '../app/model/DTO/CompraDTO.php';
require '../app/model/DTO/ProductoDTO.php';
require '../app/model/DTO/UsuarioDTO.php';
require '../app/model/DAO/CompraDAO.php';
require '../app/model/DAO/ProductoDAO.php';
require '../app/model/DAO/UsuarioDAO.php';



// Se obtiene la URL de la consulta y se descompone en un array
$url = $_SERVER['QUERY_STRING'];
$urlParams = explode('/',$url);
$urlArray = array(
    'HTTP'=>$_SERVER['REQUEST_METHOD'],
    'path'=>$url,
    'controller'=>'',
    'action'=>'',
    'params'=>''
);


// Se instancia la clase Router y se agregan rutas con sus respectivos controladores y acciones
$router = new Router();
$router->addRoute('/user/getAllUsers',                    array('controller'=>'User', 'action'=>'getAllUsers'));
$router->addRoute('/user/getUserById/{id}',               array('controller'=>'User', 'action'=>'getUserById'));
$router->addRoute('/user/createUser',                     array('controller'=>'User', 'action'=>'createUser'));
$router->addRoute('/user/updateUser/{id}',                array('controller'=>'User', 'action'=>'updateUser'));
$router->addRoute('/user/deleteUser/{id}',                array('controller'=>'User', 'action'=>'deleteUser'));

// COMPRAS
$router->addRoute('/compra/getAllPurchases',              array('controller'=>'Compra', 'action'=>'getAllPurchases'));
$router->addRoute('/compra/getPurchaseById/{id}',         array('controller'=>'Compra', 'action'=>'getPurchaseById'));
$router->addRoute('/compra/createPurchase',               array('controller'=>'Compra', 'action'=>'createPurchase'));
$router->addRoute('/compra/updatePurchase/{id}',          array('controller'=>'Compra', 'action'=>'updatePurchaser'));
$router->addRoute('/compra/deletePurchase/{id}',          array('controller'=>'Compra', 'action'=>'deletePurchase'));

// PRODUCTO
$router->addRoute('/producto/getAllProducts',             array('controller'=>'Producto', 'action'=>'getAllProducts'));
$router->addRoute('/producto/getProductById/{id}',        array('controller'=>'Producto', 'action'=>'getProductById'));
$router->addRoute('/producto/deleteProductById/{id}',     array('controller'=>'Producto', 'action'=>'deleteProductById'));

// USUARIOS
$router->addRoute('/usuario/getAllUsers',              array('controller'=>'Usuario', 'action'=>'getAllUsers'));
$router->addRoute('/usuario/getUserById/{id}',            array('controller'=>'Usuario', 'action'=>'getUserById'));
$router->addRoute('/usuario/deleteUserById/{id}',         array('controller'=>'Usuario', 'action'=>'deleteUserById'));




// Se inicializa un array para almacenar información de la URL
if(!empty($urlParams[1])){
    $urlArray['controller'] = ucwords($urlParams[1]);
    if(!empty($urlParams[2])){
        $urlArray['action'] = $urlParams[2];
        if(!empty($urlParams[3])){
            $urlArray['params'] = $urlParams[3];
        }
    } else {
        $urlArray['action'] = 'index';
    }
} else {
    $urlArray['controller'] = 'Home';
    $urlArray['action'] = 'index';
}

// Se determina el método de la solicitud HTTP 
$method = $_SERVER['REQUEST_METHOD'];
$params = [];

// Se preparan los parámetros según el método de la solicitud
if($method === 'GET') {
    $params[] = intval($urlArray['params']) ?? null;
} else if($method === 'POST') {
    $data = file_get_contents('php://input');
    $params[] = json_decode($data,true);
} else if($method === 'PUT') {
    $id = intval($urlArray['params']) ?? null;
    $data = file_get_contents('php://input');
    $params[] = $id;
    $params[] = json_decode($data,true);
} else if($method === 'DELETE') {
    $params[] = intval($urlArray['params']) ?? null;   
}

// Se verifica si la URL coincide con alguna de las rutas definidas
if ($router->matchRoutes($urlArray)) {
    $controller = $urlArray['controller'];
    $action = $urlArray['action'];
    $controller = new $controller();
    if(method_exists($controller, $action)){
        $resp = call_user_func_array([$controller, $action], $params);
    } else {
        // Se devuelve un código de estado 404 si la acción no existe
        // echo HttpStatus::notFound();
    }
} else {
    // Se devuelve un código de estado 404 si no hay coincidencia con ninguna ruta
   //  echo HttpStatus::notFound();
}

?>

