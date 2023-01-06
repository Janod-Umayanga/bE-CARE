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
        public function getPharmacists($filter) {
            $this->db->query("SELECT * FROM pharmacist WHERE CONCAT(pharmacy_name,city) LIKE '%$filter%'");

            return $this->db->resultSet();
        }
    }

?>