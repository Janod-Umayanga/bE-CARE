<?php

    class M_Doctor_Channel {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // // Create doctor channel
        // public function createDoctorChannel($data, $patient_id) {
        //     $this->db->query('INSERT INTO doctor_channel (name, age, contact_number, gender, date, time, doctor_id, doctor_channel_day_id, patient_id) VALUES (:name, :age, :contact_number, :gender, :date, :time, :doctor_id, :doctor_channel_day_id, :patient_id)');
        //     $this->db->bind(':name', $data['name']);
        //     $this->db->bind(':age', $data['age']);
        //     $this->db->bind(':contact_number', $data['cnumber']);
        //     $this->db->bind(':gender', $data['gender']);
        //     $this->db->bind(':date', $data['date']);
        //     $this->db->bind(':time', $data['time']);
        //     $this->db->bind(':doctor_id', $data['doctor_id']);
        //     $this->db->bind(':doctor_channel_day_id', $data['channel_day_id']);
        //     $this->db->bind(':patient_id', $patient_id);

        //     // add minutes to the time
        //     $time = $data['time'];
        //     $time = date('H:i:s', strtotime($time . ' + 10 minutes'));

        //     if($this->db->execute()) {
        //         return $this->updateCurrentChannelTime($data, $time);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // // Update current channel time
        // public function updateCurrentChannelTime($data, $time) {
        //     $this->db->query('UPDATE doctor_channel_day SET current_channel_time = :current_channel_time WHERE doctor_channel_day_id = :doctor_channel_day_id');
        //     $this->db->bind(':current_channel_time', $time);
        //     $this->db->bind(':doctor_channel_day_id', $data['channel_day_id']);

        //     if($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // get all doctor channels
        public function getAllDoctorChannels($patient_id) {
            $this->db->query('SELECT doctor_channel.*, doctor_timeslot.*, doctor.*, doctor_channel_day.* FROM doctor_channel INNER JOIN doctor_channel_day ON doctor_channel.doctor_channel_day_id = doctor_channel_day.doctor_channel_day_id Inner JOIN doctor_timeslot ON doctor_channel_day.doctor_timeslot_id = doctor_timeslot.doctor_timeslot_id INNER JOIN doctor ON doctor_timeslot.doctor_id = doctor.doctor_id WHERE doctor_channel.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }
    }

?>