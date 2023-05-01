<?php

    class M_Feedback {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Create Feedback
        public function createFeedback($data, $patient_id) {
            $this->db->query('INSERT INTO feedback (feedback, patient_id) VALUES (:feedback, :patient_id)');
            $this->db->bind(':feedback', $data['feedback']);
            $this->db->bind(':patient_id', $patient_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // get all feedbacks
        public function getAllFeedbacks() {
            $this->db->query('SELECT * FROM feedback INNER JOIN patient ON feedback.patient_id = patient.patient_id ORDER BY feedback_id DESC');

            return $this->db->resultSet();
        }
    }

?>