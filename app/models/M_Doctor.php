<?php

    class M_Doctor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All doctors
        public function getAllDoctors() {
            $this->db->query('SELECT * FROM doctor');

            return $this->db->resultSet();
        }

        // Get doctors by a filter
        public function getDoctors($filter) {
            $this->db->query("SELECT * FROM doctor WHERE CONCAT(first_name,last_name,specialization) LIKE '%$filter%'");

            return $this->db->resultSet();
        }
    }

?>