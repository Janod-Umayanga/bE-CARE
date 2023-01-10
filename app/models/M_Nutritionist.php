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
    }

?>