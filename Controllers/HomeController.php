<?php
require_once ROOT_PATH . '/models/Review.php';
require_once '../config/config.php';

class HomeController {
    private $reviewModel;

    public function __construct($db) {
        $this->reviewModel = new Review($db);
    }

    public function index() {
        // Iniciar buffer de saída
        ob_start();
        
        // Buscar as últimas 3 reviews
        $recentReviews = $this->reviewModel->getLatest(3);
        
        // Incluir a view
        include ROOT_PATH . '/views/home/index.php';
        
        // Pegar o conteúdo do buffer
        $content = ob_get_clean();
        
        // Incluir o layout com o conteúdo
        include ROOT_PATH . '/views/layouts/main.php';
    }
}
?>