<?php

    class M_Counsellor_Timeslot {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all counsellor timeslots
        public function getAllCounsellorTimeslots($counsellor_id) {
            $this->db->query('SELECT counsellor_timeslot.*, counsellor.*, counsellor_channel_day.* FROM counsellor_channel_day INNER JOIN counsellor_timeslot ON counsellor_channel_day.counsellor_timeslot_id = counsellor_timeslot.counsellor_timeslot_id INNER JOIN counsellor ON counsellor_channel_day.counsellor_id = counsellor.counsellor_id WHERE counsellor_channel_day.counsellor_id = :counsellor_id');
            $this->db->bind(':counsellor_id', $counsellor_id);

            return $this->db->resultSet();
        }
    }

?>