<?php
require_once '../config/config.php';

class Review {
    private $conn;
    private $table_name = "reviews";

    public $id;
    public $company_name;
    public $review_text;
    public $rating;
    public $reviewer_name;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getLatest($limit) {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC LIMIT ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $reviews = [];
        while ($row = $result->fetch_assoc()) {
            $review = new Review($this->conn);
            $review->id = $row['id'];
            $review->company_name = $row['company_name'];
            $review->review_text = $row['review_text'];
            $review->rating = $row['rating'];
            $review->reviewer_name = $row['reviewer_name'];
            $review->created_at = $row['created_at'];
            $reviews[] = $review;
        }

        return $reviews;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                (company_name, review_text, rating, reviewer_name) 
                VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssis", 
            $this->company_name, 
            $this->review_text, 
            $this->rating, 
            $this->reviewer_name
        );

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>