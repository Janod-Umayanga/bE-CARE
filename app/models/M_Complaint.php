<?php

    class M_Complaint {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // add complaint
        public function addComplaintPatient($data,$id) {
            $this->db->query('INSERT INTO complaint (subject, description, patient_id) VALUES (:subject, :description, :id)');
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':description', $data['complaint']);
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
       
        //add Complaint Doctor
        public function addComplaintDoctor($data,$id){
            $this->db->query('INSERT INTO complaint (subject, description, doctor_id) VALUES (:subject, :description, :id)');
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':description', $data['complaint']);
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //add Complaint Counsellor
        public function addComplaintCounsellor($data,$id) {
            $this->db->query('INSERT INTO complaint (subject, description, counsellor_id) VALUES (:subject, :description, :id)');
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':description', $data['complaint']);
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //add Complaint Meditation Instructor
        public function addComplaintMedInstr($data,$id) {
            $this->db->query('INSERT INTO complaint (subject, description, meditation_instructor_id	) VALUES (:subject, :description, :id)');
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':description', $data['complaint']);
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //add Complaint Nutritionist
        public function addComplaintNutritionist($data,$id) {
            $this->db->query('INSERT INTO complaint (subject, description, nutritionist_id) VALUES (:subject, :description, :id)');
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':description', $data['complaint']);
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        //add Complaint Pharmacist
        public function addComplaintPharmacist($data,$id) {
            $this->db->query('INSERT INTO complaint (subject, description, pharmacist_id) VALUES (:subject, :description, :id)');
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':description', $data['complaint']);
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
            
    }

?>
