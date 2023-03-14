<?php

class MedInstrChangeSessionDetails extends Controller{
  private $medInstrChangeSessionDetailsModel; 
  public function __construct(){
    $this->medInstrChangeSessionDetailsModel = $this->model('M_MedInstrChangeSessionDetails');
  }

  public function medInstrChangeSessionDetails()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $sessionDetail= $this->medInstrChangeSessionDetailsModel->getSessionDetails($_SESSION['MedInstr_id']);
   $data=[
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
   ];
   $this->view('MedInstr/MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);
  }else{
    redirect('Login/login');  
  }

  }

  public function searchMedInstrChangeSessionDetails()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
   if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $sessionDetail= $this->medInstrChangeSessionDetailsModel->searchSessionDetails($_SESSION['MedInstr_id'],$search);


        $data=[
          'sessionDetail'=> $sessionDetail,
          'search'=> $search
        ];
        $this->view('MedInstr/MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);


   }else{
        $data=[
          'sessionDetail'=>'',
          'search'=>''
        ];
        $this->view('MedInstr/MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);
    }
  }else{
    redirect('Login/login');  
  }
  }


  public function  medInstrDeleteSessionDetails($sessionId)
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
    $deletesession= $this->medInstrChangeSessionDetailsModel->deleteSession($sessionId);
    $sessionDetail= $this->medInstrChangeSessionDetailsModel->getSessionDetails($_SESSION['MedInstr_id']);

    $data=[
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
    ];

    if($deletesession==true){
        $this->view('MedInstr/MedInstrChangeSessionDetails/v_MedInstrChangeSessionDetails',$data);
    }

  }else{
    redirect('Login/login');  
  }

  }

  public function  newMedInstrSession()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
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
      'noOfParticipants_err'=>'',

    ];

    $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrAddNewSession',$data);
    
  }else{
       redirect('Login/login');  
  }
        
  }






  public function  addNewMedInstrSession()
  {
    if(isset($_SESSION['MedInstr_id'])) {  
  
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
        }

        if(empty($data['address'])){
           $data['address_err']='Please enter a address';
        }
        
        if(empty($data['noOfParticipants'])){
          $data['noOfParticipants_err']='Please enter a noOfParticipants';
        }

        if(empty($data['description'])){
          $data['description_err']='Please enter a description';
       }


        if(empty($data['title_err']) && empty($data['date_err']) && empty($data['starting_time_err'])&& empty($data['ending_time_err'])&& empty($data['fee_err'])&& empty($data['address_err']) && empty($data['noOfParticipants_err'])&& empty($data['description_err'])){

            $addnewSession=$this->medInstrChangeSessionDetailsModel->medInstraddNewSession($_SESSION['MedInstr_id'],$data);

         if($addnewSession){
            redirect('MedInstrChangeSessionDetails/medInstrChangeSessionDetails');

           }
           else{
            $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrAddNewSession',$data);
           }
        }else{
            $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrAddNewSession',$data);
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
        'noOfParticipants_err'=>'',


      ];
       $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrChangeSessionDetails',$data);
    }
  }else{
    redirect('Login/login');  
  }
 }


    public function  medInstrviewSessionDetails($sessionId)
    {

    if(isset($_SESSION['MedInstr_id'])) {  

    $sessionDetail= $this->medInstrChangeSessionDetailsModel->viewSession($sessionId);
    $_SESSION['Med_SESSION_ID']=$sessionId;

    $data=[
    'title'=>$sessionDetail->title,
    'date'=>$sessionDetail->date,
    'starting_time'=>$sessionDetail->starting_time,
    'ending_time'=>$sessionDetail->ending_time,
    'fee'=>$sessionDetail->fee,
    'address'=>$sessionDetail->address,
    'description'=>$sessionDetail->description,
    'session_id'=>$_SESSION['Med_SESSION_ID'],
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

      $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);

    }else{
      redirect('Login/login');  
    }
  


    }

    public function  medInstrupdateSessionDetails($sessionId)
    {
      if(isset($_SESSION['MedInstr_id'])) {  

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
              'session_id'=>$_SESSION['Med_SESSION_ID'],
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
            }

            if(empty($data['address'])){
               $data['addres_err']='Please enter a addres';
            }

            if(empty($data['noOfParticipants'])){
              $data['noOfParticipants_err']='Please enter a noOfParticipants';
            }
          
            if(empty($data['description'])){
               $data['description_err']='Please enter a description';
            }

            if(empty($data['title_err']) && empty($data['date_err']) && empty($data['starting_time_err'])&& empty($data['ending_time_err'])&& empty($data['fee_err'])&& empty($data['noOfParticipants_err'])&& empty($data['address_err']) && empty($data['description_err'])){

                $updateSession=$this->medInstrChangeSessionDetailsModel->medInstrupdateSession($_SESSION['MedInstr_id'],$sessionId,$data);

               if($updateSession){
                  $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);

               }
               else{
                   $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);
                }
            }else{
                $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrUpdateSessionDetails',$data);
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
            'noOfParticipants_err'=>'',


          ];
           $this->view('MedInstr/MedInstrChangeSessionDetails/v_medInstrChangeSessionDetails',$data);
        }

      }else{
        redirect('Login/login');  
      }
    

    }


  }

 ?>
