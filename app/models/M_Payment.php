<?php

    class M_Payment {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Create diet plan request if the payment is success
        public function createDietPlanRequest($data, $patient_id) {
            $this->db->query('INSERT INTO request_diet_plan (name, age, gender, contact_number, weight, height, marital_status, medical_details, allergies, sleeping_hours, water_consumption_per_day, goal, paid_amount, nutritionist_id, patient_id)
            VALUES (:name, :age, :gender, :contact_number, :weight, :height, :marital_status, :medical_details, :allergies, :sleeping_hours, :water_consumption_per_day, :goal, :paid_amount, :nutritionist_id, :patient_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':weight', $data['weight']);
            $this->db->bind(':height', $data['height']);
            $this->db->bind(':marital_status', $data['marital_status']);
            $this->db->bind(':medical_details', $data['medical_details']);
            $this->db->bind(':allergies', $data['allergies']);
            $this->db->bind(':sleeping_hours', $data['sleeping_hours']);
            $this->db->bind(':water_consumption_per_day', $data['water_consumption_per_day']);
            $this->db->bind(':goal', $data['goal']);
            $this->db->bind(':paid_amount', $data['fee']+$data['fee']*0.1);
            $this->db->bind(':nutritionist_id', $data['nutritionist_id']);
            $this->db->bind(':patient_id', $patient_id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Create doctor channel
        public function createDoctorChannel($data, $patient_id) {
            // Increment the current channel time
            $duration = $data['duration'];
            $time = $data['time'];
            $time = date('H:i:s', strtotime($time . ' + '.$duration.' minutes'));

            // Calculating the appointment number
            $appointment_number = (strtotime($time) - strtotime($data['starting_time'])) / (60 * $duration);
            
            $this->db->query('INSERT INTO doctor_channel (name, age, contact_number, gender, date, time, appointment_number, paid_amount, doctor_id, doctor_channel_day_id, patient_id) VALUES (:name, :age, :contact_number, :gender, :date, :time, :appointment_number, :paid_amount, :doctor_id, :doctor_channel_day_id, :patient_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':appointment_number', $appointment_number);
            $this->db->bind(':paid_amount', $data['fee']+$data['fee']*0.1);
            $this->db->bind(':doctor_id', $data['doctor_id']);
            $this->db->bind(':doctor_channel_day_id', $data['channel_day_id']);
            $this->db->bind(':patient_id', $patient_id);

            // Check if the timeslot would be full after incrementing
            if($time >= $data['ending_time']) { 
                if($this->db->execute()) {
                    if($this->updateCurrentChannelTime($data, $time)) {
                        return $this->disableDoctorChannelDay($data);
                    }
                }
                else {
                    return false;
                }
            }
            else if($this->db->execute()) {
                return $this->updateCurrentChannelTime($data, $time);
            }
            else {
                return false;
            }
        }

        // Update current channel time
        public function updateCurrentChannelTime($data, $time) {
            $this->db->query('UPDATE doctor_channel_day SET current_channel_time = :current_channel_time WHERE doctor_channel_day_id = :doctor_channel_day_id');
            $this->db->bind(':current_channel_time', $time);
            $this->db->bind(':doctor_channel_day_id', $data['channel_day_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Disable the doctor channel day
        public function disableDoctorChannelDay($data) {
            $this->db->query('UPDATE doctor_channel_day SET active = 0 WHERE doctor_channel_day_id = :doctor_channel_day_id');
            $this->db->bind(':doctor_channel_day_id', $data['channel_day_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Create counsellor channel
        public function createCounsellorChannel($data, $patient_id) {
            // Increment the current channel time
            $duration = $data['duration'];
            $time = $data['time'];
            $time = date('H:i:s', strtotime($time . ' + '.$duration.' minutes'));

            // Calculating the appointment number
            $appointment_number = (strtotime($time) - strtotime($data['starting_time'])) / (60 * $duration);
            
            $this->db->query('INSERT INTO counsellor_channel (name, age, contact_number, gender, date, time, appointment_number, paid_amount, counsellor_id, counsellor_channel_day_id, patient_id) VALUES (:name, :age, :contact_number, :gender, :date, :time, :appointment_number, :paid_amount, :counsellor_id, :counsellor_channel_day_id, :patient_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':appointment_number', $appointment_number);
            $this->db->bind(':paid_amount', $data['fee']+$data['fee']*0.1);
            $this->db->bind(':counsellor_id', $data['counsellor_id']);
            $this->db->bind(':counsellor_channel_day_id', $data['channel_day_id']);
            $this->db->bind(':patient_id', $patient_id);

            // Check if the timeslot would be full after incrementing
            if($time >= $data['ending_time']) { 
                if($this->db->execute()) {
                    if($this->updateCurrentCounsellorChannelTime($data, $time)) {
                        return $this->disableCounsellorChannelDay($data);
                    }
                }
                else {
                    return false;
                }
            }
            else if($this->db->execute()) {
                return $this->updateCurrentCounsellorChannelTime($data, $time);
            }
            else {
                return false;
            }
        }

        // Update current channel time
        public function updateCurrentCounsellorChannelTime($data, $time) {
            $this->db->query('UPDATE counsellor_channel_day SET current_channel_time = :current_channel_time WHERE counsellor_channel_day_id = :counsellor_channel_day_id');
            $this->db->bind(':current_channel_time', $time);
            $this->db->bind(':counsellor_channel_day_id', $data['channel_day_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Disable the doctor channel day
        public function disableCounsellorChannelDay($data) {
            $this->db->query('UPDATE counsellor_channel_day SET active = 0 WHERE counsellor_channel_day_id = :counsellor_channel_day_id');
            $this->db->bind(':counsellor_channel_day_id', $data['channel_day_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Create session register
        public function createSessionRegister($data) {
            $this->db->query('INSERT INTO session_register (name, age, contact_number, gender, paid_amount, session_id, patient_id) VALUES (:name, :age, :contact_number, :gender, :paid_amount, :session_id, :patient_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':paid_amount', $data['fee']+$data['fee']*0.1);
            $this->db->bind(':session_id', $data['session_id']);
            $this->db->bind(':patient_id', $_SESSION['patient_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // pay for order
        public function payForOrder($data) {
            // current timestamp
            date_default_timezone_set("Asia/Kolkata");
            $timestamp = date("Y-m-d H:i:s");

            $this->db->query('UPDATE accept_order SET paid_amount = :paid_amount, paid_time = :paid_time WHERE order_id = :order_id');
            $this->db->bind(':paid_amount', $data['fee']+$data['fee']*0.1);
            $this->db->bind(':paid_time', $timestamp);
            $this->db->bind(':order_id', $data['order_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Create meditation instructor registration
        public function createMeditationInstructorRegistration($data, $patient_id) {
            // Increment the current mumber of participants
            $current_participants = $data['current_participants'] + 1;
            
            $this->db->query('INSERT INTO med_ins_register (name, age, contact_number, gender, paid_amount, meditation_instructor_id, med_ins_appointment_day_id, patient_id) VALUES (:name, :age, :contact_number, :gender, :paid_amount, :meditation_instructor_id, :med_ins_appointment_day_id, :patient_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':contact_number', $data['cnumber']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':paid_amount', $data['fee']+$data['fee']*0.1);
            $this->db->bind(':meditation_instructor_id', $data['meditation_instructor_id']);
            $this->db->bind(':med_ins_appointment_day_id', $data['appointment_day_id']);
            $this->db->bind(':patient_id', $patient_id);

            // Check if the timeslot would be full after incrementing
            if($current_participants >= $data['noOfParticipants']) { 
                if($this->db->execute()) {
                    if($this->updateCurrentParticipants($data, $current_participants)) {
                        return $this->disableAppointmentDay($data);
                    }
                }
                else {
                    return false;
                }
            }
            else if($this->db->execute()) {
                return $this->updateCurrentParticipants($data, $current_participants);
            }
            else {
                return false;
            }
        }

        // Update current channel time
        public function updateCurrentParticipants($data, $current_participants) {
            $this->db->query('UPDATE med_ins_appointment_day SET current_participants = :current_participants WHERE med_ins_appointment_day_id = :med_ins_appointment_day_id');
            $this->db->bind(':current_participants', $current_participants);
            $this->db->bind(':med_ins_appointment_day_id', $data['appointment_day_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        // Disable the appointment day for meditation instructing
        public function disableAppointmentDay($data) {
            $this->db->query('UPDATE med_ins_appointment_day SET active = 0 WHERE med_ins_appointment_day_id = :med_ins_appointment_day_id');
            $this->db->bind(':med_ins_appointment_day_id', $data['appointment_day_id']);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        
    }

?>