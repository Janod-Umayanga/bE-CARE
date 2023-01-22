<?php

    class M_Counsellor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All counsellors
        public function getAllCounsellors() {
            $this->db->query('SELECT * FROM counsellor');

            return $this->db->resultSet();
        }

        // Get counsellors by a filter
        public function getCounsellors($filter) {
            $this->db->query("SELECT * FROM counsellor WHERE CONCAT(first_name,last_name) LIKE '%$filter%'");

            return $this->db->resultSet();
        }

        // Get counsellor by id
        public function getCounsellorbyId($counsellor_id) {
            $this->db->query("SELECT * FROM counsellor WHERE counsellor_id = :counsellor_id");
            $this->db->bind(':counsellor_id', $counsellor_id);
            
            return $this->db->single();
        }
    }

?>