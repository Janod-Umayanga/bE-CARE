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

         // get timeslot by doctor id
         public function getTimeslotByDoctorId($doctor_id) {
            $this->db->query('SELECT * FROM doctor_timeslot WHERE doctor_id = :doctor_id');
            $this->db->bind(':doctor_id', $doctor_id);

            return $this->db->resultSet();
        }

        // create timeslot
        public function createTimeslot($data,$doctor_id) {
            $this->db->query('INSERT INTO doctor_timeslot (channeling_day, starting_time, ending_time, fee, address, doctor_id) VALUES (:channeling_day, :starting_time, :ending_time, :fee, :address, :doctor_id)');
            $this->db->bind(':channeling_day', $data['day']);
            $this->db->bind(':starting_time', $data['starting_time']);
            $this->db->bind(':ending_time', $data['ending_time']);
            $this->db->bind(':fee', $data['fee']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':doctor_id', $doctor_id);

            if($this->db->execute()) {
                $timeslot = $this->getTheLatestTimeslot($doctor_id);
                return $this->createChannelDays($data['day'], $doctor_id, $timeslot->doctor_timeslot_id);
            }
            else {
                return false;
            }
        }

        // create channel days
        public function createChannelDays($day,$doctor_id,$timeslot_id) {
            $count = 0;
            foreach (range(1, 4) as $i) {
                if($i==1) {
                    $mod_string = 'next '.$day;
                }
                if($i==2) {
                    $mod_string = 'second '.$day;
                }
                if($i==3) {
                    $mod_string = 'third '.$day;
                }
                if($i==4) {
                    $mod_string = 'fourth '.$day;
                }
                $channel_day = new DateTime();
                $channel_day->modify($mod_string);
                $this->db->query('INSERT INTO doctor_channel_day (day, active, doctor_timeslot_id, doctor_id) VALUES (:day, :active, :doctor_timeslot_id, :doctor_id)');
                $this->db->bind(':day', $channel_day->format('Y-m-d'));
                $this->db->bind(':active', 1);
                $this->db->bind(':doctor_timeslot_id', $timeslot_id);
                $this->db->bind(':doctor_id', $doctor_id);
                $this->db->execute();
                $count = $count + 1;
            }
            if($count == 4) {
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
    }

?>