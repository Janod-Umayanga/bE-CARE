<?php

    class M_Counsellor_Timeslot {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all counsellor timeslots
        public function getAllCounsellorTimeslots($counsellor_id) {
            // $this->db->query('SELECT counsellor_timeslot.*, counsellor.*, counsellor_channel_day.* FROM counsellor_channel_day INNER JOIN counsellor_timeslot ON counsellor_channel_day.counsellor_timeslot_id = counsellor_timeslot.counsellor_timeslot_id INNER JOIN counsellor ON counsellor_channel_day.counsellor_id = counsellor.counsellor_id WHERE counsellor_channel_day.counsellor_id = :counsellor_id');
            $this->db->query('SELECT * FROM counsellor_timeslot WHERE counsellor_id = :counsellor_id');
            $this->db->bind(':counsellor_id', $counsellor_id);

            return $this->db->resultSet();
        }

        // get all channeling days and if there are 4 days and create the missing days
        public function getChannelingDays($counsellor_timeslot_id, $counsellor_id, $day, $time) {
            date_default_timezone_set("Asia/Kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");

            $this->db->query('SELECT * FROM counsellor_channel_day WHERE counsellor_timeslot_id = :counsellor_timeslot_id AND (counsellor_channel_day.day > :today OR (counsellor_channel_day.day = :today AND counsellor_channel_day.current_channel_time >= :time)) ORDER BY counsellor_channel_day.day ASC');
            $this->db->bind(':counsellor_timeslot_id', $counsellor_timeslot_id);
            $this->db->bind(':today', $currentDate);
            $this->db->bind(':time', $currentTime);

            $days_to_add_count = 0;

            $rows = $this->db->resultSet();
            if($this->db->rowCount() < 4) {
                $days_to_add_count = 4 - $this->db->rowCount();
                return $this->createChannelDays($day, $time, $counsellor_id, $counsellor_timeslot_id, $days_to_add_count);
            }
            else {
                return true;
            }
        }

        // get all available timeslots with channeling days
        public function getAllCounsellorChannelingTimeslots($counsellor_id) {
            date_default_timezone_set("Asia/Kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");
            $this->db->query('SELECT counsellor_timeslot.*, counsellor.*, counsellor_channel_day.* FROM counsellor_channel_day INNER JOIN counsellor_timeslot ON counsellor_channel_day.counsellor_timeslot_id = counsellor_timeslot.counsellor_timeslot_id INNER JOIN counsellor ON counsellor_channel_day.counsellor_id = counsellor.counsellor_id WHERE counsellor_channel_day.counsellor_id = :counsellor_id AND (counsellor_channel_day.day > :today OR (counsellor_channel_day.day = :today AND counsellor_channel_day.current_channel_time >= :time)) ORDER BY counsellor_channel_day.day ASC');
            $this->db->bind(':counsellor_id', $counsellor_id);
            $this->db->bind(':today', $currentDate);
            $this->db->bind(':time', $currentTime);

            return $this->db->resultSet();
        }

         // get timeslot by counseelol id
         public function getTimeslotByCounsellorId($counsellor_id) {
            $this->db->query('SELECT * FROM counsellor_timeslot WHERE counsellor_id = :counsellor_id');
            $this->db->bind(':counsellor_id', $counsellor_id);

            return $this->db->resultSet();
        }

    

     // create timeslot
     public function createTimeslot($data,$counsellor_id) {
        $this->db->query('INSERT INTO counsellor_timeslot (channeling_day, starting_time, ending_time, fee, address, counsellor_id) VALUES (:channeling_day, :starting_time, :ending_time, :fee, :address, :counsellor_id)');
        $this->db->bind(':channeling_day', $data['day']);
        $this->db->bind(':starting_time', $data['starting_time']);
        $this->db->bind(':ending_time', $data['ending_time']);
        $this->db->bind(':fee', $data['fee']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':counsellor_id', $counsellor_id);

        if($this->db->execute()) {
            $timeslot = $this->getTheLatestTimeslot($counsellor_id);
            return $this->createChannelDays($data['day'], $data['starting_time'], $counsellor_id, $timeslot->counsellor_timeslot_id, 4);
        }
        else {
            return false;
        }
    }

    // create channel days
    public function createChannelDays($day, $time, $counsellor_id,$timeslot_id, $days_to_add_count) {
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
            $this->db->query('INSERT INTO counsellor_channel_day (day, active, current_channel_time, counsellor_timeslot_id, counsellor_id) VALUES (:day, :active, :current_channel_time, :counsellor_timeslot_id, :counsellor_id)');
            $this->db->bind(':day', $channel_day->format('Y-m-d'));
            $this->db->bind(':active', 1);
            $this->db->bind(':current_channel_time', $time);
            $this->db->bind(':counsellor_timeslot_id', $timeslot_id);
            $this->db->bind(':counsellor_id', $counsellor_id);
            $this->db->execute();
            $count = $count + 1;
        }
        if($count == $days_to_add_count) {
            return true;
        }
        else {
            return false;
        }
    }

    // get the latest timeslot by doctor id
    public function getTheLatestTimeslot($counsellor_id) {
        $this->db->query('SELECT * FROM counsellor_timeslot WHERE counsellor_id = :counsellor_id ORDER BY counsellor_timeslot_id DESC');
        $this->db->bind(':counsellor_id', $counsellor_id);

        return $this->db->single();
    }
}


?>