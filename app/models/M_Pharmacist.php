<?php

    class M_Pharmacist {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All pharmacists
        public function getAllPharmacists() {
            $this->db->query('SELECT * FROM pharmacist');

            return $this->db->resultSet();
        }

        // Get pharmacists by a filter
        public function getPharmacists($name, $city) {
            $this->db->query("SELECT * FROM pharmacist WHERE CONCAT(pharmacy_name) LIKE '%$name%' AND city LIKE '%$city%'");

            return $this->db->resultSet();
        }
    }

?>