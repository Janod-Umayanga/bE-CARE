<?php

    class M_Meditation_Instructor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All meditation instructors
        public function getAllMeditationInstructors() {
            $this->db->query('SELECT * FROM meditation_instructor WHERE delete_flag = 0');

            return $this->db->resultSet();
        }

        // Get meditation instructors by a filter
        public function getMeditationInstructors($name, $city) {
            $this->db->query("SELECT * FROM meditation_instructor WHERE CONCAT(first_name,last_name) LIKE '%$name%' AND city LIKE '%$city%' AND delete_flag = 0");

            return $this->db->resultSet();
        }

        // Get meditation instructor by id
        public function getMeditationInstructorById($meditation_instructor_id) {
            $this->db->query("SELECT * FROM meditation_instructor WHERE meditation_instructor_id = :meditation_instructor_id");
            $this->db->bind(':meditation_instructor_id', $meditation_instructor_id);
            
            return $this->db->single();
        }
    }

?>