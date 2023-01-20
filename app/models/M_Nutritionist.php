<?php

    class M_Nutritionist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All nutritionists
        public function getAllNutritionists() {
            $this->db->query('SELECT * FROM nutritionist');

            return $this->db->resultSet();
        }

        // Get nutritionists by a filter
        public function getNutritionists($filter) {
            $this->db->query("SELECT * FROM nutritionist WHERE CONCAT(first_name,last_name) LIKE '%$filter%'");

            return $this->db->resultSet();
        }

        // Get doctor by id
        public function getNutritionistbyId($nutritionist_id) {
            $this->db->query("SELECT * FROM nutritionist WHERE nutritionist_id = :nutritionist_id");
            $this->db->bind(':nutritionist_id', $nutritionist_id);
            
            return $this->db->single();
        }
    }

?>