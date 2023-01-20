<?php

    class M_Doctor_Timeslot {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all doctor timeslots
        public function getAllDoctorTimeslots($doctor_id) {
            $this->db->query('SELECT doctor_timeslot.*, doctor.*, doctor_channel_day.* FROM doctor_channel_day INNER JOIN doctor_timeslot ON doctor_channel_day.doctor_timeslot_id = doctor_timeslot.doctor_timeslot_id INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE doctor_channel_day.doctor_id = :doctor_id');
            $this->db->bind(':doctor_id', $doctor_id);

            return $this->db->resultSet();
        }
    }

?>