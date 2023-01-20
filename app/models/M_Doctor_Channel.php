<?php

    class M_Doctor_Channel {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Create doctor channel
        public function createDoctorChannel($data, $patient_id) {
            $this->db->query('INSERT INTO order_request (name, contact_number, delivery_address, prescription, pharmacist_id, patient_id) VALUES (:name, :contact_number, :delivery_address, :prescription, :pharmacist_id, :patient_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':delivery_address', $data['address']);
            $this->db->bind(':prescription', $data['prescription_name']);
            $this->db->bind(':pharmacist_id', $data['pharmacist_id']);
            $this->db->bind(':patient_id', $patient_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // get all doctor channels
        public function getAllDoctorChannels($patient_id) {
            $this->db->query('SELECT doctor_channel.*, doctor_timeslot.*, doctor.* FROM doctor_channel INNER JOIN doctor_timeslot ON doctor_channel.doctor_timeslot_id = doctor_timeslot.doctor_timeslot_id INNER JOIN doctor ON doctor_timeslot.doctor_id = doctor.doctor_id WHERE doctor_channel.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }
    }

?>