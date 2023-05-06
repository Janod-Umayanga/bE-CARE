<?php

    class M_Meditation_Instructor_Timeslot {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        

        // get all meditation instrucror timeslots
        public function getAllMeditationInstructorTimeslots($meditation_instructor_id) {
            // $this->db->query('SELECT doctor_timeslot.*, doctor.*, doctor_channel_day.* FROM doctor_channel_day INNER JOIN doctor_timeslot ON doctor_channel_day.doctor_timeslot_id = doctor_timeslot.doctor_timeslot_id INNER JOIN doctor ON doctor_channel_day.doctor_id = doctor.doctor_id WHERE doctor_channel_day.doctor_id = :doctor_id AND (doctor_channel_day.day > :today OR (doctor_channel_day.day = :today AND doctor_channel_day.current_channel_time >= :time)) ORDER BY doctor_channel_day.day ASC');
            $this->db->query('SELECT * FROM med_timeslot WHERE meditation_instructor_id = :meditation_instructor_id');
            $this->db->bind(':meditation_instructor_id', $meditation_instructor_id);

            return $this->db->resultSet();
        }

        // get all channeling days and if there are 4 days and create the missing days
        public function getChannelingDays($med_timeslot_id, $meditation_instructor_id, $day, $starting_time, $ending_time, $fee, $address, $noOfParticipants) {
            date_default_timezone_set("Asia/Kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");

            $this->db->query('SELECT * FROM med_ins_appointment_day WHERE med_timeslot_id = :med_timeslot_id AND (med_ins_appointment_day.date > :today OR (med_ins_appointment_day.date = :today AND med_ins_appointment_day.starting_time >= :time)) ORDER BY med_ins_appointment_day.date ASC');
            $this->db->bind(':med_timeslot_id', $med_timeslot_id);
            $this->db->bind(':today', $currentDate);
            $this->db->bind(':time', $currentTime);

            $days_to_add_count = 0;

            $rows = $this->db->resultSet();
            if($this->db->rowCount() < 4) {
                $days_to_add_count = 4 - $this->db->rowCount();
                return $this->createChannelDays($day, $starting_time, $ending_time, $fee, $address, $noOfParticipants,  $meditation_instructor_id, $med_timeslot_id, $days_to_add_count);
            }
            else {
                return true;
            }
        }
        
        // get all available timeslots with channeling days
        public function getAllMeditationInstructorAppointmentTimeslots($meditation_instructor_id) {
            date_default_timezone_set("Asia/Kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");
            $this->db->query('SELECT med_timeslot.*, meditation_instructor.*, med_ins_appointment_day.* FROM med_ins_appointment_day INNER JOIN med_timeslot ON med_ins_appointment_day.med_timeslot_id = med_timeslot.med_timeslot_id INNER JOIN meditation_instructor ON med_ins_appointment_day.meditation_instructor_id = meditation_instructor.meditation_instructor_id WHERE med_ins_appointment_day.meditation_instructor_id = :meditation_instructor_id AND (med_ins_appointment_day.date > :today OR (med_ins_appointment_day.date = :today AND med_ins_appointment_day.starting_time >= :time)) ORDER BY med_ins_appointment_day.date ASC');
            $this->db->bind(':meditation_instructor_id', $meditation_instructor_id);
            $this->db->bind(':today', $currentDate);
            $this->db->bind(':time', $currentTime);

            return $this->db->resultSet();
        }

        //  // get timeslot by meditation instrucror id
        //  public function getTimeslotByDoctorId($doctor_id) {
        //     $this->db->query('SELECT * FROM doctor_timeslot WHERE doctor_id = :doctor_id');
        //     $this->db->bind(':doctor_id', $doctor_id);

        //     return $this->db->resultSet();
        // }

        // // create timeslot
        // public function createTimeslot($data,$doctor_id) {
        //     $this->db->query('INSERT INTO doctor_timeslot (channeling_day, starting_time, ending_time, fee, address, doctor_id) VALUES (:channeling_day, :starting_time, :ending_time, :fee, :address, :doctor_id)');
        //     $this->db->bind(':channeling_day', $data['day']);
        //     $this->db->bind(':starting_time', $data['starting_time']);
        //     $this->db->bind(':ending_time', $data['ending_time']);
        //     $this->db->bind(':fee', $data['fee']);
        //     $this->db->bind(':address', $data['address']);
        //     $this->db->bind(':doctor_id', $doctor_id);

        //     if($this->db->execute()) {
        //         $timeslot = $this->getTheLatestTimeslot($doctor_id);
        //         return $this->createChannelDays($data['day'],$data['starting_time'] , $doctor_id, $timeslot->doctor_timeslot_id, 4);
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // create appointment days
        public function createChannelDays($day, $starting_time, $ending_time, $fee, $address, $noOfParticipants, $meditation_instructor_id, $med_timeslot_id, $days_to_add_count) {
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
                $this->db->query('INSERT INTO med_ins_appointment_day (date, day, active, starting_time, ending_time, fee, address, noOfParticipants, current_participants, med_timeslot_id, meditation_instructor_id) VALUES (:date, :day, :active, :starting_time, :ending_time, :fee, :address, :noOfParticipants, :current_participants, :med_timeslot_id, :meditation_instructor_id)');
                $this->db->bind(':date', $channel_day->format('Y-m-d'));
                $this->db->bind(':day', $day);
                $this->db->bind(':active', 1);
                $this->db->bind(':starting_time', $starting_time);
                $this->db->bind(':ending_time', $ending_time);
                $this->db->bind(':fee', $fee);
                $this->db->bind(':address', $address);
                $this->db->bind(':noOfParticipants', $noOfParticipants);
                $this->db->bind(':current_participants', 0);
                $this->db->bind(':med_timeslot_id', $med_timeslot_id);
                $this->db->bind(':meditation_instructor_id', $meditation_instructor_id);
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

        // // get the latest timeslot by meditation instrucror id
        // public function getTheLatestTimeslot($doctor_id) {
        //     $this->db->query('SELECT * FROM doctor_timeslot WHERE doctor_id = :doctor_id ORDER BY doctor_timeslot_id DESC');
        //     $this->db->bind(':doctor_id', $doctor_id);

        //     return $this->db->single();
        // }
    }

?>