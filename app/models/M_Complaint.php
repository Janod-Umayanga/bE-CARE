<?php

    class M_Complaint {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Create complaint
        public function createComplaint($data, $patient_id) {
            $this->db->query('INSERT INTO complaint (subject, description, patient_id) VALUES (:subject, :description, :patient_id)');
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':patient_id', $patient_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
    }

?>