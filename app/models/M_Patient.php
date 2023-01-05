<?php

    class M_Patient {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register patient
        public function register($data) {
            $this->db->query('INSERT INTO patient(first_name, last_name, nic, contact_number, gender, email, password)
            VALUES(:first_name, :last_name, :nic, :contact_number, :gender, :email, :password)');
            $this->db->bind(':first_name', $data['fname']);
            $this->db->bind(':last_name', $data['lname']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Find patient by email
        public function findPatientByEmail($email) {
            $this->db->query('SELECT * FROM patient WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // Login patient
        public function login($email, $password) {
            $this->db->query('SELECT * FROM patient WHERE email = :email');
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
    }

?>