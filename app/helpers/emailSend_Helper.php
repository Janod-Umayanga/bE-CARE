<?php                       
       use PHPMailer\PHPMailer\PHPMailer;
       use PHPMailer\PHPMailer\SMTP;
       use PHPMailer\PHPMailer\Exception;
                      
                      
       require '../app/vendor/autoload.php';
                        

      function sendMail($email,$name,$token,$bodyFlag,$password){   
               
       // $flag =1 for forgot_password
       // $flag =2 for send_password_via_email
       // $flag =3 for verify_email

                        // //Server settings
      $mail = new PHPMailer(true);
                        
      try{
          $mail->isSMTP();
       // $mail->SMTPDebug = 1;                      //Enable verbose debug output
                        
                                                                //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'becarecs11@gmail.com';                     //SMTP username
          $mail->Password   = 'smxgohcohghpewpr'; 
    
                                                  //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                        //Recipients
          $mail->setFrom('becarecs11@gmail.com','BeCare CS11');
          $mail->addAddress($email, $name);               //Name is optional
                    
          $mail->isHTML(true);
          $mail->CharSet = 'UTF-8';
                        
                    


          if($bodyFlag == 1){
          $mail->Subject ="Reset Password Notification";    
          $email_template = "
            <html>
                    <head>
                            <title>Password Reset Request</title>
                    </head>
                    <body style='font-family: Arial, sans-serif;'>
            
                      <div style='background-color: #f2f2f2; padding: 20px;'>
                            
                        
                       <div style='padding: 20px;'>
                            <h2>Hello $name,</h2>
                            <p>You are receiving this email because we received a password reset request for your account.</p>
                            <p>To reset your password, please click the button below:</p>
                            <p><a href='http://localhost/be-care/Login/reset_password?token=$token&email=$email' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none;'>Reset Password</a></p>
                            <p>If you did not request a password reset, please ignore this email.</p>
                            <p>Thank you,</p>
                            <p>The BeCare Team</p>
                       </div>
          
                       <div style='background-color: #f2f2f2; padding: 20px;'>
                          <p>Follow us on <a href='https://twitter.com/BeCare' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/BeCare' style='color: #4CAF50;'>Facebook</a></p>
                          <p>You are receiving this email because you have an account with BeCare. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                       </div>
            
                       </div>
                       
                       </body>
            </html>
         
            " ;
          }else if($bodyFlag == 2){
                $mail->Subject ="Login Access for BeCare";  
                $email_template = "
                <html>
                    <head>
                       <title>Login Access for BeCare</title>
                    </head>
                 
                    <body style='font-family: Arial, sans-serif;'>
                               <div style='padding: 20px;'>
                                <h2>Hello $name,</h2>
                                <p>You are receiving this email because you have registered for an account with BeCare.</p>
                                <p>Your password has been generated and is below. To access your account, please use the login credentials provided below.</p>
                                <p><b>As a security precaution, we recommend that you change your password at your earliest convenience. This will help to ensure the safety and security of your account.</b></p>
                                <p>Your username is: $email</p>
                                <p>Your password is: $password</p>
                                
                                
                                <p>If you did not register for an account, please ignore this email.</p>
                                <p>Thank you,</p>
                                <p>The BeCare Team</p>
                             </div>
                             <div style='background-color: #f2f2f2; padding: 20px;'>
                               <p>Follow us on <a href='https://twitter.com/BeCare' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/BeCare' style='color: #4CAF50;'>Facebook</a></p>
                               <p>You are receiving this email because you request to register with BeCare. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                             </div>
             
                     </body>
                </html>
            " ;
            
            }else if($bodyFlag == 3){
            
                $mail->Subject = "Email Verification Code for BeCare";
                $email_template = "
                
                <html>
                    <head>
                      <title>Email Verification Code for BeCare</title>
                    </head>
                
                    <body style='font-family: Arial, sans-serif;'>
                 
                     
                        <div style='padding: 20px;'>
                            <h2>Hello $name,</h2>
                            <p>Thank you for registering with BeCare.</p>
                            <p>To verify your email address and activate your account, please enter the following code on the verification page:</p>
                            <h3 style='color: #4CAF50;'>$token</h3>
                            <p>Please do not share this code with anyone.</p>
                            <p>If you did not register for an account, please ignore this email.</p>
                            <p>Thank you,</p>
                            <p>The BeCare Team</p>
                        </div>
                        
                        <div style='background-color: #f2f2f2; padding: 20px;'>
                               <p>Follow us on <a href='https://twitter.com/BeCare' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/BeCare' style='color: #4CAF50;'>Facebook</a></p>
                               <p>You are receiving this email because you requested to register with BeCare. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                        </div>
                        
                    </body>
                </html>
         ";
     
          }
             $mail->Body  =$email_template;
             $mail->send();
             return true;

       }catch(Exception $e){
               echo "Message could not be sent: {$mail->ErrorInfo}";
       }


    }

    function generateVerificationCode() {
       $length = 10; // Length of the verification code
       $characters = '0123456789'; // Characters to use for the verification code
       $verificationCode = '';
                  for ($i = 0; $i < $length; $i++) {
                    $verificationCode .= $characters[rand(0, strlen($characters) - 1)];
                  }
                  return $verificationCode;
                }
                
?>