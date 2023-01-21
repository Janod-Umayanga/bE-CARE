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
    }

?>
