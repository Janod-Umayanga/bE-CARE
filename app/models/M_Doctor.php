<?php

    class M_Doctor {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get All doctors
        public function getAllDoctors() {
            $this->db->query('SELECT * FROM doctor');

            return $this->db->resultSet();
        }

        // Get doctors by a filter
        public function getDoctors($name, $specialization, $city, $day) {
            $this->db->query("SELECT * FROM doctor WHERE CONCAT(first_name,last_name) LIKE '%$name%' AND specialization LIKE '%$specialization%' AND city LIKE '%$city%'");

            $today = date("Y-m-d");
            $tommorow = date("Y-m-d", strtotime('tomorrow'));

            if($day == 'Today') {
                $this->db->query("SELECT doctor_channel_day.doctor_id, doctor.* FROM doctor_channel_day INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE day = '$today'");
            }
            else if($day == 'Tommorow') {
                $this->db->query("SELECT doctor_channel_day.doctor_id, doctor.* FROM doctor_channel_day INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE day = '$tommorow'");
            }

            return $this->db->resultSet();
        }

        // Get doctor by id
        public function getDoctorbyId($doctor_id) {
            $this->db->query("SELECT * FROM doctor WHERE doctor_id = :doctor_id");
            $this->db->bind(':doctor_id', $doctor_id);
            
            return $this->db->single();
        }

        // // Get doctors for today
        // public function getDoctorsForToday() {
        //     $today = date("Y-m-d");
        // }

        // // Get doctors for Tommorow
        // public function getDoctorsForTommorow() {
        //     $tommorow = date("Y-m-d", strtotime('tomorrow'));
        // }

        // Find doctor by email
        public function findDoctorByEmail($email) {
            $this->db->query('SELECT * FROM doctor WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // Login doctor
        public function login($email, $password) {
            $this->db->query('SELECT * FROM doctor WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Verify password
            $hashed_pw = $row->password;
            if(password_verify($password, $hashed_pw)) {
                return $row;
            }
            else {
                return false;
            }
        }


        public function updatePW($data, $doctor_id) {
            $this->db->query('UPDATE doctor SET password = :password WHERE doctor_id = :doctor_id');
            $this->db->bind(':password', $data['newpw']);
            $this->db->bind(':doctor_id', $doctor_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
    }

?>