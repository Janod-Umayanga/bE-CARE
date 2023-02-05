<?php

class NutritionistChangeSessionDetails extends Controller{
  private $nutritionistChangeSessionDetailsModel; 
  public function __construct(){
    $this->nutritionistChangeSessionDetailsModel = $this->model('M_NutritionistChangeSessionDetails');
  }

// Nutritionist Session Details

  public function nutritionistChangeSessionDetails()
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
    $sessionDetail= $this->nutritionistChangeSessionDetailsModel->getSessionDetails($_SESSION['nutritionist_id']);
   $data=[
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
   ];
   $this->view('Nutritionist/v_nutritionistChangeSessionDetails',$data);
  }else{
    redirect('Login/login');  
  }

  }


  // Nutritionist New Session 

  public function  newNutritionistSession()
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
    $data=[

      'title'=>'',
      'date'=>'',
      'starting_time'=>'',
      'ending_time'=>'',
      'fee'=>'',
      'address'=>'',
      'description'=>'',


      'title_err'=>'',
      'date_err'=>'',
      'starting_time_err'=>'',
      'ending_time_err'=>'',
      'fee_err'=>'',
      'address_err'=>'',
      'description_err'=>''

    ];

    $this->view('Nutritionist/v_nutritionistAddNewSession',$data);
    
  }else{
       redirect('Login/login');  
  }
        
  }


// Nutritionist Add New Session 

  public function  addNewNutritionistSession()
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
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



          'title_err'=>'',
          'date_err'=>'',
          'starting_time_err'=>'',
          'ending_time_err'=>'',
          'fee_err'=>'',
          'address_err'=>'',
          'description_err'=>''
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

        if(empty($data['description'])){
          $data['description_err']='Please enter a description';
       }


        if(empty($data['title_err']) && empty($data['date_err']) && empty($data['starting_time_err'])&& empty($data['ending_time_err'])&& empty($data['fee_err'])&& empty($data['address_err']) && empty($data['description_err'])){

            $addnewSession=$this->nutritionistChangeSessionDetailsModel->nutritionistaddNewSession($_SESSION['nutritionist_id'],$data);

         if($addnewSession){
            redirect('NutritionistChangeSessionDetails/nutritionistChangeSessionDetails');

           }
           else{
            $this->view('Nutritionist/v_nutritionistAddNewSession',$data);
           }
        }else{
            $this->view('Nutritionist/v_nutritionistAddNewSession',$data);
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



        'title_err'=>'',
        'date_err'=>'',
        'starting_time_err'=>'',
        'ending_time_err'=>'',
        'fee_err'=>'',
        'address_err'=>'',
        'description_err'=>''

      ];
       $this->view('Nutritionist/v_nutritionistChangeSessionDetails',$data);
    }
  }else{
    redirect('Login/login');  
  }
 }

  // Nutritionist Session Details Search

  public function searchNutritionistChangeSessionDetails()
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
   if($_SERVER['REQUEST_METHOD']=='GET'){
    $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search=trim($_GET['search']);
        $sessionDetail= $this->nutritionistChangeSessionDetailsModel->searchSessionDetails($_SESSION['nutritionist_id'],$search);


        $data=[
          'sessionDetail'=> $sessionDetail,
          'search'=> $search
        ];
        $this->view('Nutritionist/v_nutritionistChangeSessionDetails',$data);


   }else{
        $data=[
          'sessionDetail'=>'',
          'search'=>''
        ];
        $this->view('Nutritionist/v_nutritionistChangeSessionDetails',$data);
    }
  }else{
    redirect('Login/login');  
  }
  }


  // Nutritionist Session Details Delete

  public function  nutritionistDeleteSessionDetails($sessionId)
  {
    if(isset($_SESSION['nutritionist_id'])) {  
  
    $deletesession= $this->nutritionistChangeSessionDetailsModel->deleteSession($sessionId);
    $sessionDetail= $this->nutritionistChangeSessionDetailsModel->getSessionDetails($_SESSION['nutritionist_id']);

    $data=[
     'sessionDetail'=> $sessionDetail,
     'search'=> ''
    ];

    if($deletesession==true){
        $this->view('Nutritionist/v_nutritionistChangeSessionDetails',$data);
    }

  }else{
    redirect('Login/login');  
  }

  }

      // Nutritionist Update Session Details

    public function  nutritionistupdateSessionDetails($sessionId)
    {
      if(isset($_SESSION['nutritionist_id'])) {  

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
              'session_id'=>$_SESSION['nutritionist_SESSION_ID'],


              'title_err'=>'',
              'date_err'=>'',
              'starting_time_err'=>'',
              'ending_time_err'=>'',
              'fee_err'=>'',
              'address_err'=>'',
              'description_err'=>''
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

             
            if(empty($data['description'])){
               $data['description_err']='Please enter a description';
            }

            if(empty($data['title_err']) && empty($data['date_err']) && empty($data['starting_time_err'])&& empty($data['ending_time_err'])&& empty($data['fee_err'])&& empty($data['address_err']) && empty($data['description_err'])){

                $updateSession=$this->nutritionistChangeSessionDetailsModel->nutritionistupdateSession($_SESSION['nutritionist_id'],$sessionId,$data);

               if($updateSession){
                  $this->view('Nutritionist/v_nutritionistUpdateSessionDetails',$data);

               }
               else{
                   $this->view('Nutritionist/v_nutritionistUpdateSessionDetails',$data);
                }
            }else{
                $this->view('Nutritionist/v_nutritionistUpdateSessionDetails',$data);
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



            'title_err'=>'',
            'date_err'=>'',
            'starting_time_err'=>'',
            'ending_time_err'=>'',
            'fee_err'=>'',
            'address_err'=>'',
            'description_err'=>''

          ];
           $this->view('Nutritionist/v_nutritionistChangeSessionDetails',$data);
        }

      }else{
        redirect('Login/login');  
      }
    

    }

  //nutritionist View session details

    public function  nutritionistviewSessionDetails($sessionId)
    {

    if(isset($_SESSION['nutritionist_id'])) {  

    $sessionDetail= $this->nutritionistChangeSessionDetailsModel->viewSession($sessionId);
    $_SESSION['nutritionist_SESSION_ID']=$sessionId;

    $data=[
    'title'=>$sessionDetail->title,
    'date'=>$sessionDetail->date,
    'starting_time'=>$sessionDetail->starting_time,
    'ending_time'=>$sessionDetail->ending_time,
    'fee'=>$sessionDetail->fee,
    'address'=>$sessionDetail->address,
    'description'=>$sessionDetail->description,
    'session_id'=>$_SESSION['nutritionist_SESSION_ID'],

    

    'title_err'=>'',
    'date_err'=>'',
    'starting_time_err'=>'',
    'ending_time_err'=>'',
    'fee_err'=>'',
    'address_err'=>'',
    'description_err'=>''

    ];

      $this->view('Nutritionist/v_nutritionistUpdateSessionDetails',$data);

    }else{
      redirect('Login/login');  
    }
  


    }



  }

 ?>
