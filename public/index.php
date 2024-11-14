<?php
require_once '../config/config.php';
require_once '../config/database.php';
include '../views/home/index.php';
include '../views/layouts/main.php';

$database = new Database();
$db = $database->getConnection();

// Usando isset() ao invés do operador de coalescência nula
$route = isset($_GET['route']) ? $_GET['route'] : '';
$route = trim($route, '/');

switch($route) {
    case '':
        require_once ROOT_PATH . '/Controllers/HomeController.php';
        $controller = new HomeController($db);
        $controller->index();
        break;
        
    case 'views/reviews/create':
        require_once ROOT_PATH . '/Controllers/ReviewController.php';
        $controller = new ReviewController($db);
        $controller->create();
        break;
        
    case 'views/reviews/store':
        require_once ROOT_PATH . '/Controllers/ReviewController.php';
        $controller = new ReviewController($db);
        $controller->store();
        break;
        
    default:
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        break;
}
?>