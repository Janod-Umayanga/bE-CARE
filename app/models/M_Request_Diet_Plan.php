<?php

    class M_Request_Diet_Plan {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // // Create diet plan request
        // public function createDietPlanRequest($data, $patient_id) {
        //     $this->db->query('INSERT INTO request_diet_plan (name, age, gender, contact_number, weight, height, marital_status, medical_details, allergies, sleeping_hours, water_consumption_per_day, goal, nutritionist_id, patient_id)
        //     VALUES (:name, :age, :gender, :contact_number, :weight, :height, :marital_status, :medical_details, :allergies, :sleeping_hours, :water_consumption_per_day, :goal, :nutritionist_id, :patient_id)');
        //     $this->db->bind(':name', $data['name']);
        //     $this->db->bind(':age', $data['age']);
        //     $this->db->bind(':gender', $data['gender']);
        //     $this->db->bind(':contact_number', $data['cnumber']);
        //     $this->db->bind(':weight', $data['weight']);
        //     $this->db->bind(':height', $data['height']);
        //     $this->db->bind(':marital_status', $data['marital_status']);
        //     $this->db->bind(':medical_details', $data['medical_details']);
        //     $this->db->bind(':allergies', $data['allergies']);
        //     $this->db->bind(':sleeping_hours', $data['sleeping_hours']);
        //     $this->db->bind(':water_consumption_per_day', $data['water_consumption_per_day']);
        //     $this->db->bind(':goal', $data['goal']);
        //     $this->db->bind(':nutritionist_id', $data['nutritionist_id']);
        //     $this->db->bind(':patient_id', $patient_id);

        //     if($this->db->execute()) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // get all diet plan requests
        public function getAllDietPlanRequests($patient_id) {
            $this->db->query('SELECT request_diet_plan.*, nutritionist.* FROM request_diet_plan 
            INNER JOIN nutritionist ON request_diet_plan.nutritionist_id = nutritionist.nutritionist_id 
            AND is_issued = 0 
            WHERE request_diet_plan.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }

        // get all diet plans
        public function getAllDietPlans($patient_id) {
            $this->db->query('SELECT diet_plan.*, nutritionist.*, request_diet_plan.* FROM diet_plan 
            INNER JOIN nutritionist ON diet_plan.nutritionist_id = nutritionist.nutritionist_id 
            INNER JOIN request_diet_plan ON 
            diet_plan.request_diet_plan_id = request_diet_plan.request_diet_plan_id 
           WHERE
            request_diet_plan.patient_id = :patient_id');
            $this->db->bind(':patient_id', $patient_id);

            return $this->db->resultSet();
        }
        
        // get all diet plan requests
        public function getDietPlanRequestById($diet_plan_id) {
            $this->db->query('SELECT * FROM request_diet_plan WHERE request_diet_plan_id = :request_diet_plan_id');
            $this->db->bind(':request_diet_plan_id', $diet_plan_id);

            return $this->db->single();
        }
    }

?>