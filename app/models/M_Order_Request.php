<?php

    class M_Order_Request {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Create order request
        public function createOrderRequest($data, $patient_id) {
            $this->db->query('INSERT INTO order_request (name, contact_number, delivery_address, prescription, pharmacist_id, patient_id, status) VALUES (:name, :contact_number, :delivery_address, :prescription, :pharmacist_id, :patient_id, :status)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':delivery_address', $data['address']);
            $this->db->bind(':prescription', $data['prescription_name']);
            $this->db->bind(':pharmacist_id', $data['pharmacist_id']);
            $this->db->bind(':patient_id', $patient_id);
            $this->db->bind(':status', 'p');

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // get all order requests
        public function getAllOrderRequests($patient_id) {
            $this->db->query('SELECT order_request.*, pharmacist.* FROM order_request INNER JOIN pharmacist ON order_request.pharmacist_id = pharmacist.pharmacist_id  WHERE order_request.patient_id = :patient_id AND order_request.status = "p"');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }

        // get all accepted order requests
        public function getAllAcceptedOrders($patient_id) {
            $this->db->query('SELECT accept_order.*, pharmacist.* FROM accept_order INNER JOIN pharmacist ON accept_order.pharmacist_id = pharmacist.pharmacist_id  WHERE accept_order.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }

        // get all rejected order requests
        public function getAllRejectedOrders($patient_id) {
            $this->db->query('SELECT order_request.*, pharmacist.* FROM order_request INNER JOIN pharmacist ON order_request.pharmacist_id = pharmacist.pharmacist_id  WHERE order_request.patient_id = :patient_id AND order_request.status = "r"');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }

        
    }

?>