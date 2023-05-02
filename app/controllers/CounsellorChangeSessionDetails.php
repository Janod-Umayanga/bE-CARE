<?php

class CounsellorChangeSessionDetails extends Controller{
  private $counsellorChangeSessionDetailsModel; 
  public function __construct(){
    $this->counsellorChangeSessionDetailsModel = $this->model('M_CounsellorChangeSessionDetails');
  }

// Counsellor Session Details

  public function counsellorChangeSessionDetails()
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    $sessionDetail= $this->counsellorChangeSessionDetailsModel->getSessionDetails($_SESSION['counsellor_id']);
   $data=[
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
   ];
   $this->view('counsellor/v_counsellorChangeSessionDetails',$data);
  }else{
    redirect('Login/login');  
  }

  }


  // Counsellor New Session 

  public function  newCounsellorSession()
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    $data=[

      'title'=>'',
      'date'=>'',
      'starting_time'=>'',
      'ending_time'=>'',
      'fee'=>'',
      'address'=>'',
      'description'=>'',
      'noOfParticipants'=>'',


      'title_err'=>'',
      'date_err'=>'',
      'starting_time_err'=>'',
      'ending_time_err'=>'',
      'fee_err'=>'',
      'address_err'=>'',
      'description_err'=>'',
      'noOfParticipants_err'=>''

    ];

    $this->view('counsellor/v_counsellorAddNewSession',$data);
    
  }else{
       redirect('Login/login');  
  }
        
  }


// Counsellor Add New Session 

  public function  addNewCounsellorSession()
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $data = [
          'title'=>trim($_POST['title']),
          'date'=>trim($_POST['date']),
          'starting_time'=>trim($_POST['starting_time']),
          'ending_time'=>trim($_POST['ending_time']),
          'fee'=>trim($_POST['fee']),
          'address'=>trim($_POST['address']),
          'description'=>trim($_POST['description']),
          'noOfParticipants'=>trim($_POST['noOfParticipants']),



          'title_err'=>'',
          'date_err'=>'',
          'starting_time_err'=>'',
          'ending_time_err'=>'',
          'fee_err'=>'',
          'address_err'=>'',
          'description_err'=>'',
          'noOfParticipants_err'=>''
         ];

         if(empty($data['title'])){
          $data['title_err']='Please enter a title';
        }else if(validateTitle($data['title'])!="true"){
          $data['title_err']=validateTitle($data['title']);
         }

        if(empty($data['date'])){
          $data['date_err']='Please select a date';
        }

        if(empty($data['starting_time'])){
           $data['starting_time_err']='Please select a starting time';
        }

        if(empty($data['ending_time'])){
          $data['ending_time_err']='Please select a ending_time';
        }

        if(empty($data['fee'])){
           $data['fee_err']='Please enter a fee';
        }else if(validateFee($data['fee'])!="true"){
          $data['fee_err']=validateFee($data['fee']);
         }

        if(empty($data['address'])){
           $data['address_err']='Please enter a address';
        }else if(validateAddress($data['address'])!="true"){
          $data['address_err']=validateAddress($data['address']);
         }

        if(empty($data['noOfParticipants'])){
          $data['noOfParticipants_err']='Please enter a noOfParticipants';
        }else if(validateMaxParticipants($data['noOfParticipants'])!="true"){
          $data['noOfParticipants_err']=validateMaxParticipants($data['noOfParticipants']);
         }

        if(empty($data['description'])){
          $data['description_err']='Please enter a description';
       }else if(validateDescription($data['description'])!="true"){
        $data['description_err']=validateDescription($data['description']);
      }


        if(empty($data['title_err']) && empty($data['date_err']) && empty($data['starting_time_err'])&& empty($data['ending_time_err'])&& empty($data['fee_err'])&& empty($data['address_err'])&& empty($data['noOfParticipants_err']) && empty($data['description_err'])){

            $addnewSession=$this->counsellorChangeSessionDetailsModel->counselloraddNewSession($_SESSION['counsellor_id'],$data);

         if($addnewSession){
            redirect('CounsellorChangeSessionDetails/counsellorChangeSessionDetails');

           }
           else{
            $this->view('counsellor/v_counsellorAddNewSession',$data);
           }
        }else{
            $this->view('counsellor/v_counsellorAddNewSession',$data);
        }
      }else{

      $data = [
        'title'=>'',
        'date'=>'',
        'starting_time'=>'',
        'ending_time'=>'',
        'fee'=>'',
        'address'=>'',
        'description'=>'',
        'noOfParticipants'=>'',



        'title_err'=>'',
        'date_err'=>'',
        'starting_time_err'=>'',
        'ending_time_err'=>'',
        'fee_err'=>'',
        'address_err'=>'',
        'description_err'=>'',
        'noOfParticipants_err'=>''

      ];
       $this->view('counsellor/v_counsellorChangeSessionDetails',$data);
    }
  }else{
    redirect('Login/login');  
  }
 }

  // Counsellor Session Details Search

  public function searchCounsellorChangeSessionDetails()
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
   if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $sessionDetail= $this->counsellorChangeSessionDetailsModel->searchSessionDetails($_SESSION['counsellor_id'],$search);


        $data=[
          'sessionDetail'=> $sessionDetail,
          'search'=> $search
        ];
        $this->view('counsellor/v_counsellorChangeSessionDetails',$data);


   }else{
        $data=[
          'sessionDetail'=>'',
          'search'=>''
        ];
        $this->view('counsellor/v_counsellorChangeSessionDetails',$data);
    }
  }else{
    redirect('Login/login');  
  }
  }


  // Counsellor Session Details Delete

  public function  counsellorDeleteSessionDetails($sessionId)
  {
    if(isset($_SESSION['counsellor_id'])) {  
  
    $deletesession= $this->counsellorChangeSessionDetailsModel->deleteSession($sessionId);
    $sessionDetail= $this->counsellorChangeSessionDetailsModel->getSessionDetails($_SESSION['counsellor_id']);

    $data=[
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
    ];

    if($deletesession==true){
        $this->view('counsellor/v_counsellorChangeSessionDetails',$data);
    }

  }else{
    redirect('Login/login');  
  }

  }

      // Counsellor Update Session Details

    public function  counsellorupdateSessionDetails($sessionId)
    {
      if(isset($_SESSION['counsellor_id'])) {  

      if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
              'title'=>trim($_POST['title']),
              'date'=>trim($_POST['date']),
              'starting_time'=>trim($_POST['starting_time']),
              'ending_time'=>trim($_POST['ending_time']),
              'fee'=>trim($_POST['fee']),
              'address'=>trim($_POST['address']),
              'description'=>trim($_POST['description']),
              'session_id'=>$_SESSION['counsellor_SESSION_ID'],
              'noOfParticipants'=>trim($_POST['noOfParticipants']),

              'title_err'=>'',
              'date_err'=>'',
              'starting_time_err'=>'',
              'ending_time_err'=>'',
              'fee_err'=>'',
              'address_err'=>'',
              'description_err'=>'',
              'noOfParticipants_err'=>''

             ];

            if(empty($data['title'])){
              $data['title_err']='Please enter a title';
            }else if(validateTitle($data['title'])!="true"){
              $data['title_err']=validateTitle($data['title']);
            }

            if(empty($data['date'])){
              $data['date_err']='Please select a date';
            }

            if(empty($data['starting_time'])){
               $data['starting_time_err']='Please select a starting time';
            }

            if(empty($data['ending_time'])){
              $data['ending_time_err']='Please select a ending_time';
            }

            if(empty($data['fee'])){
               $data['fee_err']='Please enter a fee';
            }else if(validateFee($data['fee'])!="true"){
              $data['fee_err']=validateFee($data['fee']);
            }

            if(empty($data['address'])){
               $data['addres_err']='Please enter a addres';
            }else if(validateAddress($data['address'])!="true"){
              $data['address_err']=validateAddress($data['address']);
             }

            if(empty($data['noOfParticipants'])){
              $data['noOfParticipants_err']='Please enter a noOfParticipants';
            }else if(validateMaxParticipants($data['noOfParticipants'])!="true"){
              $data['noOfParticipants_err']=validateMaxParticipants($data['noOfParticipants']);
             }
             
            if(empty($data['description'])){
               $data['description_err']='Please enter a description';
            }else if(validateDescription($data['description'])!="true"){
              $data['description_err']=validateDescription($data['description']);
            }

            if(empty($data['title_err']) && empty($data['date_err']) && empty($data['starting_time_err'])&& empty($data['ending_time_err'])&& empty($data['fee_err'])&& empty($data['noOfParticipants_err'])&& empty($data['address_err']) && empty($data['description_err'])){

                $updateSession=$this->counsellorChangeSessionDetailsModel->counsellorupdateSession($_SESSION['counsellor_id'],$sessionId,$data);

               if($updateSession){
                  $this->view('counsellor/v_counsellorUpdateSessionDetails',$data);

               }
               else{
                   $this->view('counsellor/v_counsellorUpdateSessionDetails',$data);
                }
            }else{
                $this->view('counsellor/v_counsellorUpdateSessionDetails',$data);
            }
          }else{

          $data = [
            'title'=>'',
            'date'=>'',
            'starting_time'=>'',
            'ending_time'=>'',
            'fee'=>'',
            'address'=>'',
            'description'=>'',
            'noOfParticipants'=> '',




            'title_err'=>'',
            'date_err'=>'',
            'starting_time_err'=>'',
            'ending_time_err'=>'',
            'fee_err'=>'',
            'address_err'=>'',
            'description_err'=>'',
            'noOfParticipants_err'=>''

          ];
           $this->view('counsellor/v_counsellorChangeSessionDetails',$data);
        }

      }else{
        redirect('Login/login');  
      }
    

    }

  //counsellor View session details

    public function  counsellorviewSessionDetails($sessionId)
    {

    if(isset($_SESSION['counsellor_id'])) {  

    $sessionDetail= $this->counsellorChangeSessionDetailsModel->viewSession($sessionId);
    $_SESSION['counsellor_SESSION_ID']=$sessionId;

    $data=[
    'title'=>$sessionDetail->title,
    'date'=>$sessionDetail->date,
    'starting_time'=>$sessionDetail->starting_time,
    'ending_time'=>$sessionDetail->ending_time,
    'fee'=>$sessionDetail->registration_fee,
    'address'=>$sessionDetail->address,
    'description'=>$sessionDetail->description,
    'session_id'=>$_SESSION['counsellor_SESSION_ID'],
    'noOfParticipants'=>$sessionDetail->noOfParticipants,
    

    'title_err'=>'',
    'date_err'=>'',
    'starting_time_err'=>'',
    'ending_time_err'=>'',
    'fee_err'=>'',
    'address_err'=>'',
    'description_err'=>'',
    'noOfParticipants_err'=>''

    ];

      $this->view('counsellor/v_counsellorUpdateSessionDetails',$data);

    }else{
      redirect('Login/login');  
    }
  


    }



  }

 ?>
