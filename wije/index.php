<?php session_start(); ?>
<?php require_once('includes/db.inc.php')?>
<?php 
   # check for form submission
   if(isset($_POST['submit'])){

    $errors = array(); # created an array for errors

    # check if the username and password has been entered
    if(!isset($_POST['email'])/*check whether email is  not set*/ || strlen(trim($_POST['email']) /*check whether there is no characters*/) < 1 ){
        $errors[] = 'Username is missing or Invalid';
    }
    if(!isset($_POST['password'])/**/ || strlen(trim($_POST['password']) /*check whether there is no characters*/) < 1 ){
        $errors[] = 'Password is missing or Invalid';
    }
    # check if there are any errors in the form
    if(empty($errors)){ # empty errors
       # save username and password into variables
       $email = mysqli_real_escape_string($conn, $_POST['email']);/*database connection and which element*/
       $password = mysqli_real_escape_string($conn, $_POST['password']);
      // $hashed_password = sha1($password); # for get real password instead of hashed one
       # prepare database query
       $query = "SELECT * FROM nutritionist 
                 WHERE email = '{$email}'
                 AND password = '{$password}'
                 LIMIT 1
                 "; # limit 1 = can log one user using these email and pwd
       $result_set = mysqli_query($conn, $query);

       if($result_set)# check whether query is successful
       {
           # check whether relavant user is find according to given details form $result_set
           if(mysqli_num_rows($result_set) == 1) # if yes return value 1
            {  # valid user found
               # saving logging details of user
               $user = mysqli_fetch_assoc($result_set);
               # store user id and first name as login details using $_SESSION
               $_SESSION['user_id'] = $user['nutritionist_id'];
               $_SESSION['first_name'] = $user['first_name'];
				
               # then redirect to user.php
               header('Location: user.php');}
            else{
               # usrname and password invalid
               $errors[] = 'Invalid Username / Password';}
       }else{
            $errors[] = 'Database query failed';
       }    
    }
   }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-page</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>

<?php
 include_once "n-header.php";
?>
<!--<header>
            <div class="left-side">
                <h1>Be Care</h1>
            </div>
            <div class="right-side">
                
                <a href="Signup-home-page.html">Signup</a>
                <a href="login-home-page.html">Logout</a>
            </div>
        </header>

-->


   
<div class="login-form">
<form action="user.php" method="POST" class="lform">



<fieldset class="fs">
    <legend><h1 class="title1">Log In</h1></legend>
       
        <?php
          if(isset($errors) && !empty($errors)){
            echo ' <p class="error">Invalid Username / Password</p>';
          } 
        ?>
        
        <label class="l">User Type</label>
        <select name="usertype" id="usertype" required="true" >
          <option value="nutritionist">Nutritionist</option>
          <option value="pharmacist">Pharmacist</option>
       </select>

        
            <label for="">Username</label>
            <input type="text" name="email" id="email" class="linput" required="true" placeholder="Email Address">
        
        
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="linput"  required="true" placeholder="Password">
        
        
            <button type="submit" name="submit" class="lbutton">LogIn</button>

</fieldset>
            </form>

</div>
  



<?php ?>
<?php
 include_once "n-footer.php";
?>
</body>
</html>
