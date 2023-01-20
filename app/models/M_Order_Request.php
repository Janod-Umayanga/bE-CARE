<?php

    class M_Order_Request {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Create order request
        public function createOrderRequest($data, $patient_id) {
            $this->db->query('INSERT INTO order_request (name, contact_number, delivery_address, prescription, pharmacist_id, patient_id) VALUES (:name, :contact_number, :delivery_address, :prescription, :pharmacist_id, :patient_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':delivery_address', $data['address']);
            $this->db->bind(':prescription', $data['prescription_name']);
            $this->db->bind(':pharmacist_id', $data['pharmacist_id']);
            $this->db->bind(':patient_id', $patient_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // get all order request
        public function getAllOrderRequests($patient_id) {
            $this->db->query('SELECT order_request.*, pharmacist.* FROM order_request INNER JOIN pharmacist ON order_request.pharmacist_id = pharmacist.pharmacist_id WHERE order_request.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }
    }

?>