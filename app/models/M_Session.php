<?php

    class M_Session {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all sessions counducted by a counsellor
        public function getAllSessionsByCounsellor() {
            $this->db->query('SELECT session.*, counsellor.* FROM session INNER JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id');
            return $this->db->resultSet();
        }

        // get all sessions counducted by a nutritionist
        public function getAllSessionsByNutritionist() {
            $this->db->query('SELECT session.*, nutritionist.* FROM session INNER JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id');
            return $this->db->resultSet();
        }

        // get all sessions counducted by a meditation instructor
        public function getAllSessionsByMeditationInstructor() {
            $this->db->query('SELECT session.*, meditation_instructor.* FROM session INNER JOIN meditation_instructor ON session.meditation_instructor_id = meditation_instructor.meditation_instructor_id');
            return $this->db->resultSet();
        }

        // get registered sessions by patient
        public function getRegisteredSessions($patient_id) {
            $this->db->query('SELECT session_register.*, session.* FROM session_register INNER JOIN session ON session_register.session_id = session.sesion_id WHERE session_register.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);
            return $this->db->resultSet();
        }

        // get session details
        public function getSessionById($session_id) {
            $this->db->query('SELECT * FROM session WHERE sesion_id = :session_id');
            $this->db->bind(':session_id', $session_id);
            return $this->db->single();
        }

        // find session by contact number (for guest users)
        public function findByNumber($cnumber) {
            $this->db->query('SELECT * FROM session_register WHERE contact_number = :cnumber');
            $this->db->bind(':cnumber', $cnumber);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // get registered sessions by guest user
        public function getRegisteredSessionsByNumber($cnumber) {
            $this->db->query('SELECT session_register.*, session.* FROM session_register INNER JOIN session ON session_register.session_id = session.sesion_id WHERE session_register.contact_number = :cnumber');
            $this->db->bind(':cnumber', $cnumber);
            return $this->db->resultSet();
        }
    }

?>