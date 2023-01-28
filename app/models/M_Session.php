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
    }

?>