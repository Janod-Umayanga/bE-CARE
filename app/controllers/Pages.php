<?php

    class Pages extends Controller {
        private $pagesModel;
        public function __construct() {
            $this->pagesModel = $this->model('M_Pages');
        }

        public function index() {
            $data = [];

            // Load view
            $this->view('pages/v_index_patient');
        }

        public function feedback()
          {
            $feedback= $this->pagesModel->getAllfeedBack();
            $patient= $this->pagesModel->getPatientDetails();
            
            $data=[                      
              'feedback'=>$feedback,
              'patient'=>$patient
              
            ];
            $this->view('pages/v_feedback',$data);
        
          }

        public function about() {
            $users = $this->pagesModel->getUsers();

            $data = [
                'users' => $users
            ];
            
            $this->view('v_about', $data);
        }


        public function verify_email() {
     
          $data = [
          ];
          
          $this->view('pages/v_verifyemail', $data);
      }

     
      public function  verifyEmailAddress($role,$id) {
     
        //$role=1  patient

        if($role==1){
          $verifyEmail= $this->pagesModel->verifyPatientEmail($id);
      

          $data = [  ];
       
          $this->view('pages/v_verifySuccess', $data);

        }

        //$role=2  Doctor

        else if($role==2){
         
          $verifyEmail= $this->pagesModel->verifyDoctorEmail($id);

          $data = [  ];
       
          $this->view('inc/v_pending',$data);       

        }

       //$role=3  Counsellor

       else if($role==3){
         
        $verifyEmail= $this->pagesModel->verifyCounsellorEmail($id);

        $data = [  ];
     
        $this->view('inc/v_pending',$data);       

      }

       //$role=4  Meditation Instructor

       else if($role==4){
         
        $verifyEmail= $this->pagesModel->verifyMeditationInstructorEmail($id);

        $data = [  ];
     
        $this->view('inc/v_pending',$data);       

      }

         //$role=5  Nutritionist

       else if($role==5){
         
        $verifyEmail= $this->pagesModel->verifyNutritionistEmail($id);

        $data = [  ];
     
        $this->view('inc/v_pending',$data);       

      }

      //$role=6  Pharmacist

      else if($role==6){
            
        $verifyEmail= $this->pagesModel->verifyPharmacistEmail($id);

        $data = [  ];
    
        $this->view('inc/v_pending',$data);       

      }




      }
  }
?>
