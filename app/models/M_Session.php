<?php

    class M_Session {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all sessions
        public function getAllSessions() {
            $this->db->query('SELECT * from session');
            // SELECT session.*, counsellor.*, nutritionist.* FROM session INNER JOIN counsellor ON session.counsellor_id = counsellor.counsellor_id INNER JOIN nutritionist ON session.nutritionist_id = nutritionist.nutritionist_id
            return $this->db->resultSet();
        }
    }

?>