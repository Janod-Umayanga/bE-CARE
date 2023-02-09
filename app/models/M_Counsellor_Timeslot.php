<?php

    class M_Counsellor_Timeslot {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all counsellor timeslots
        public function getAllCounsellorTimeslots($counsellor_id) {
            $this->db->query('SELECT counsellor_timeslot.*, counsellor.*, counsellor_channel_day.* FROM counsellor_channel_day INNER JOIN counsellor_timeslot ON counsellor_channel_day.counsellor_timeslot_id = counsellor_timeslot.counsellor_timeslot_id INNER JOIN counsellor ON counsellor_channel_day.counsellor_id = counsellor.counsellor_id WHERE counsellor_channel_day.counsellor_id = :counsellor_id');
            $this->db->bind(':counsellor_id', $counsellor_id);

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
            return $this->createChannelDays($data['day'], $counsellor_id, $timeslot->counsellor_timeslot_id);
        }
        else {
            return false;
        }
    }

    // create channel days
    public function createChannelDays($day,$counsellor_id,$timeslot_id) {
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
            $this->db->query('INSERT INTO counsellor_channel_day (day, active, counsellor_timeslot_id, counsellor_id) VALUES (:day, :active, :counsellor_timeslot_id, :counsellor_id)');
            $this->db->bind(':day', $channel_day->format('Y-m-d'));
            $this->db->bind(':active', 1);
            $this->db->bind(':doctor_timeslot_id', $timeslot_id);
            $this->db->bind(':counsellor_id', $counsellor_id);
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
    public function getTheLatestTimeslot($counsellor_id) {
        $this->db->query('SELECT * FROM counsellor_timeslot WHERE counsellor_id = :counsellor_id ORDER BY counsellor_timeslot_id DESC');
        $this->db->bind(':counsellor_id', $counsellor_id);

        return $this->db->single();
    }
}


?>