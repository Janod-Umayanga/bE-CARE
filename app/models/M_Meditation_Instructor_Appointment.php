<?php

    class M_Meditation_Instructor_Appointment {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // get all doctor channels
        public function getAllMeditationInstructorAppointments($patient_id) {
            $this->db->query('SELECT med_ins_register.*, meditation_instructor.*, med_ins_appointment_day.* FROM med_ins_register INNER JOIN med_ins_appointment_day ON med_ins_register.med_ins_appointment_day_id = med_ins_appointment_day.med_ins_appointment_day_id Inner JOIN meditation_instructor ON med_ins_appointment_day.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE med_ins_register.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }
    }

?>