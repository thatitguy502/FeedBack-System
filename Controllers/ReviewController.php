<?php
require_once ROOT_PATH . '/models/Review.php';
require_once '../config/config.php';

class ReviewController {
    private $reviewModel;

    public function __construct($db) {
        $this->reviewModel = new Review($db);
    }

    public function create() {
        require_once ROOT_PATH . '/views/layouts/main.php';
        require_once ROOT_PATH . '/views/reviews/create.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->reviewModel->company_name = $_POST['company_name'];
            $this->reviewModel->review_text = $_POST['review_text'];
            $this->reviewModel->rating = $_POST['rating'];
            $this->reviewModel->reviewer_name = $_POST['reviewer_name'];

            if($this->reviewModel->create()) {
                header("Location: " . BASE_URL);
            }
        }
    }
}
?>