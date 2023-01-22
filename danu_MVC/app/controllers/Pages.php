<?php

  class Pages extends Controller { // extends base controller class
    
    public function __construct()
    {
      // $this->pagesModel = $this->model('M_Pages');
       // echo 'This is  pages controller';
        
    }

    public function index(){

    }
    public function about($name, $age){
      
       // $this->view('v_about'); // if call the v_about in here,it means it called
   // v_about.php in views folder
    $data = [
      'userName' => $name,
      'userAge' => $age
    ];

    $this->view('v_about', $data);
    }
  }

?>

<!--inherit all the functionalities create to this controller--> 
