<?php

    class M_Doctor_Timeslot {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all doctor timeslots
        public function getAllDoctorTimeslots($doctor_id) {
            // $this->db->query('SELECT doctor_timeslot.*, doctor.*, doctor_channel_day.* FROM doctor_channel_day INNER JOIN doctor_timeslot ON doctor_channel_day.doctor_timeslot_id = doctor_timeslot.doctor_timeslot_id INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE doctor_channel_day.doctor_id = :doctor_id AND (doctor_channel_day.day > :today OR (doctor_channel_day.day = :today AND doctor_channel_day.current_channel_time >= :time)) ORDER BY doctor_channel_day.day ASC');
            $this->db->query('SELECT * FROM doctor_timeslot WHERE doctor_id = :doctor_id');
            $this->db->bind(':doctor_id', $doctor_id);

            return $this->db->resultSet();
        }

        // get all channeling days and if there are 4 days and create the missing days
        public function getChannelingDays($doctor_timeslot_id, $doctor_id, $day, $time) {
            date_default_timezone_set("Asia/Kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");

            $this->db->query('SELECT * FROM doctor_channel_day WHERE doctor_timeslot_id = :doctor_timeslot_id AND (doctor_channel_day.day > :today OR (doctor_channel_day.day = :today AND doctor_channel_day.current_channel_time >= :time)) ORDER BY doctor_channel_day.day ASC');
            $this->db->bind(':doctor_timeslot_id', $doctor_timeslot_id);
            $this->db->bind(':today', $currentDate);
            $this->db->bind(':time', $currentTime);

            $days_to_add_count = 0;

            $rows = $this->db->resultSet();
            if($this->db->rowCount() < 4) {
                $days_to_add_count = 4 - $this->db->rowCount();
                return $this->createChannelDays($day, $time, $doctor_id, $doctor_timeslot_id, $days_to_add_count);
            }
            else {
                return true;
            }
        }
        
        // get all available timeslots with channeling days
        public function getAllDoctorChannelingTimeslots($doctor_id) {
            date_default_timezone_set("Asia/Kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");
            $this->db->query('SELECT doctor_timeslot.*, doctor.*, doctor_channel_day.* FROM doctor_channel_day INNER JOIN doctor_timeslot ON doctor_channel_day.doctor_timeslot_id = doctor_timeslot.doctor_timeslot_id INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE doctor_channel_day.doctor_id = :doctor_id AND (doctor_channel_day.day > :today OR (doctor_channel_day.day = :today AND doctor_channel_day.current_channel_time >= :time)) ORDER BY doctor_channel_day.day ASC');
            $this->db->bind(':doctor_id', $doctor_id);
            $this->db->bind(':today', $currentDate);
            $this->db->bind(':time', $currentTime);

            return $this->db->resultSet();
        }

         // get timeslot by doctor id
         public function getTimeslotByDoctorId($doctor_id) {
            $this->db->query('SELECT * FROM doctor_timeslot WHERE doctor_id = :doctor_id');
            $this->db->bind(':doctor_id', $doctor_id);

            return $this->db->resultSet();
        }

        // create timeslot
        public function createTimeslot($data,$doctor_id) {
            $this->db->query('INSERT INTO doctor_timeslot (channeling_day, starting_time, ending_time, duration_for_one_patient, fee, address, doctor_id, continue_flag) VALUES (:channeling_day, :starting_time, :ending_time, :duration_for_one_patient, :fee, :address, :doctor_id, :continue_flag)');
            $this->db->bind(':channeling_day', $data['day']);
            $this->db->bind(':starting_time', $data['starting_time']);
            $this->db->bind(':ending_time', $data['ending_time']);
            $this->db->bind(':duration_for_one_patient', $data['duration']);
            $this->db->bind(':fee', $data['fee']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':doctor_id', $doctor_id);
            $this->db->bind(':continue_flag', 1);

            if($this->db->execute()) {
                $timeslot = $this->getTheLatestTimeslot($doctor_id);
                return $this->createChannelDays($data['day'],$data['starting_time'] , $doctor_id, $timeslot->doctor_timeslot_id, 4);
            }
            else {
                return false;
            }
        }

        // create channel days
        public function createChannelDays($day, $time, $doctor_id,$timeslot_id, $days_to_add_count) {
            $count = 0;
            foreach (range(1, $days_to_add_count) as $i) {
                if($i==4) {
                    $mod_string = 'next '.$day;
                }
                if($i==3) {
                    $mod_string = 'second '.$day;
                }
                if($i==2) {
                    $mod_string = 'third '.$day;
                }
                if($i==1) {
                    $mod_string = 'fourth '.$day;
                }
                $channel_day = new DateTime();
                $channel_day->modify($mod_string);
                $this->db->query('INSERT INTO doctor_channel_day (day, current_channel_time, active, doctor_timeslot_id, doctor_id) VALUES (:day, :current_channel_time, :active, :doctor_timeslot_id, :doctor_id)');
                $this->db->bind(':day', $channel_day->format('Y-m-d'));
                $this->db->bind(':current_channel_time', $time);
                $this->db->bind(':active', 1);
                $this->db->bind(':doctor_timeslot_id', $timeslot_id);
                $this->db->bind(':doctor_id', $doctor_id);
                if($this->db->execute()) {
                    $count = $count + 1;
                }
            }
            if($count == $days_to_add_count) {
                return true;
            }
            else {
                return false;
            }
        }

        // get the latest timeslot by doctor id
        public function getTheLatestTimeslot($doctor_id) {
            $this->db->query('SELECT * FROM doctor_timeslot WHERE doctor_id = :doctor_id ORDER BY doctor_timeslot_id DESC');
            $this->db->bind(':doctor_id', $doctor_id);

            return $this->db->single();
        }

        // Disable the doctor channel day
        public function disableDoctorChannelDay($channel_day_id) {
            $this->db->query('UPDATE doctor_channel_day SET active = 0 WHERE doctor_channel_day_id = :doctor_channel_day_id');
            $this->db->bind(':doctor_channel_day_id', $channel_day_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // enable the doctor channel day
        public function enableDoctorChannelDay($channel_day_id) {
            $this->db->query('UPDATE doctor_channel_day SET active = 1 WHERE doctor_channel_day_id = :doctor_channel_day_id');
            $this->db->bind(':doctor_channel_day_id', $channel_day_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Discontinue the doctor timeslot
        public function discontinueDoctorChannelDay($timeslot_id) {
            $this->db->query('UPDATE doctor_timeslot SET continue_flag = 0 WHERE doctor_timeslot_id = :doctor_timeslot_id');
            $this->db->bind(':doctor_timeslot_id', $timeslot_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Continue the doctor timeslot
        public function continueDoctorChannelDay($timeslot_id) {
            $this->db->query('UPDATE doctor_timeslot SET continue_flag = 1 WHERE doctor_timeslot_id = :doctor_timeslot_id');
            $this->db->bind(':doctor_timeslot_id', $timeslot_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }


     
       

    }

?>