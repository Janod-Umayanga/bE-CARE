<?php

    class M_Doctor_Timeslot {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all doctor timeslots
        public function getAllDoctorTimeslots($doctor_id) {
            $this->db->query('SELECT doctor_timeslot.*, doctor.* FROM doctor_timeslot INNER JOIN doctor ON doctor_timeslot.doctor_id = doctor.doctor_id WHERE doctor_timeslot.doctor_id = :doctor_id');
            $this->db->bind(':doctor_id', $doctor_id);

            return $this->db->resultSet();
        }
    }

?>