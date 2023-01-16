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
        public function getDoctors($name, $specialization, $city) {
            $this->db->query("SELECT * FROM doctor WHERE CONCAT(first_name,last_name) LIKE '%$name%' AND specialization LIKE '%$specialization%' AND city LIKE '%$city%'");

            return $this->db->resultSet();
        }
    }

?>