<?php                       
       use PHPMailer\PHPMailer\PHPMailer;
       use PHPMailer\PHPMailer\SMTP;
       use PHPMailer\PHPMailer\Exception;
                      
                      
       require '../app/vendor/autoload.php';
                        

      function sendMail($email,$name,$token,$bodyFlag,$other){   
               
       // $flag =1 Password Reset Request for Your BeCare Account
       // $flag =2 Your BeCare Account has been created!
       // $flag =3 BeCare Account Verified
       // $flag =4 BeCare Account Status - Service Provider Qualification Not Verified
       // $flag =5 Your BeCare account has been activated
       // $flag =6 Your BeCare account has been deactivated
       // $flag =7 Verify Your BeCare Account

       // $flag =8 Notification for pharmacist(Patient paid for medicine order)

       // Patient's notifications
        // $flag =11 Doctor Channel Created
        // $flag =12 Counsellor Channel Created
        // $flag =13 Meditation instructing appointment created

       // //Server settings
      $mail = new PHPMailer(true);
                        
      try{
          $mail->isSMTP();
                        
                                                                      //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'becarecs11@gmail.com';                 //SMTP username
          $mail->Password   = 'smxgohcohghpewpr';                     //SMTP password
      
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                        
          $mail->setFrom('becarecs11@gmail.com','BeCare CS11');       //set from address of the email  
          $mail->addAddress($email, $name);               //Name is optional
                    
          $mail->isHTML(true);                            // email format to HTML
          $mail->CharSet = 'UTF-8';                      // character encoding of the email to UTF-8                
                        
                    
         // font-family: Arial, sans-serif;  browser will use sans-serif if Arial is not 
         // margin: 0 auto; auto left and right center
         //box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
                  
         //0  horizontal offset of the shadow
         //2px  vertical offset of the shadow
         //4px blur radius of the shadow
         //transparency of 0.1
        
        // display: inline-block;  element will be rendered on a single line
             



          if($bodyFlag == 1){
          $mail->Subject ="Password Reset Request for Your BeCare Account";    
          $email_template = "
          <!DOCTYPE html>
          <html>
            <head>
              <title> Reset Your BeCare Account Password</title>
              <style>
                body {
                  font-family: Arial, sans-serif; 
                  margin: 0;
                  padding: 0;
                  background-color: #f4f4f4;
                  color: #333333;
                }
          
                .container {
                  max-width: 600px;
                  margin: 0 auto; 
                  padding: 20px;
                  background-color: #ffffff;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
                  
           
                }
          
                h1 {
                  font-size: 28px;
                  font-weight: bold;
                  margin: 0;
                  margin-bottom: 20px;
                  color: #333333;
                }
          
                p {
                  font-size: 16px;
                  line-height: 24px;
                  margin: 0;
                  margin-bottom: 20px;
                  color: #333333;
                }
          
                .button {
                  display: inline-block;  
                  padding: 10px 20px;
                  background-color: #007bff;
                  color: #ffffff;
                  text-decoration: none;
                  border-radius: 4px;
                  margin-top: 20px;
                  border: none;
                  font-size: 16px;
                  font-weight: bold;
                  cursor: pointer;
                }
          
                .button:hover {
                  background-color: #0069d9;
                }
              </style>
            </head>
            <body>
              <div class='container'>
                <h1>Reset your BeCare password</h1>
                <p>Dear $name,</p>
                <p>We received a request to reset your BeCare password. Please click the button below to reset your password:</p>
                <p><a class='button' href='http://localhost/be-care/Login/reset_password?token=$token&email=$email&usertype=$other'  style='color:white'>Reset Password</a></p>
                <p>If you did not request a password reset, please ignore this email.</p>
                <p>Best regards,</p>
                <p>The BeCare Team</p>
              </div>
            </body>
          </html>
          
         
            " ;
          }else if($bodyFlag == 2){
            $mail->Subject = "Your BeCare Account has been created!";  
            $email_template = "
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Welcome to BeCare</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #f4f4f4;
                            color: #333333;
                        }
        
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #ffffff;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                        }
        
                        h1 {
                            font-size: 28px;
                            font-weight: bold;
                            margin: 0;
                            margin-bottom: 20px;
                            color: #333333;
                        }
        
                        p {
                            font-size: 16px;
                            line-height: 24px;
                            margin: 0;
                            margin-bottom: 20px;
                            color: #333333;
                        }
        
                        .button {
                            display: inline-block;
                            padding: 10px 20px;
                            background-color: #007bff;
                            color: #ffffff;
                            text-decoration: none;
                            border-radius: 4px;
                            margin-top: 20px;
                            border: none;
                            font-size: 16px;
                            font-weight: bold;
                            cursor: pointer;
                            color: #ffffff;
                        }

                        
        
                        .button:hover {
                            background-color: #0069d9;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1>Welcome to BeCare!</h1>
                        <p>Dear {$name},</p>
                        <p>We are pleased to inform you that an account has been created for you on BeCare, the online platform connecting service providers with patients.</p>
                        <p>Your username is <strong>{$email}</strong>. You can access the platform by clicking on the following button:</p>
                        <p><a href='http://localhost/be-care/Login/login' style='color:white' class='button'>Login to BeCare</a></p>
                        <p>Please use the following temporary password to log in for the first time:</p>
                        <p><strong>{$other}</strong></p>
                        <p>You will be prompted to change your password upon logging in for the first time.</p>
                        <p>Thank you for joining BeCare. We look forward to your participation on the platform.</p>
                        <p>Best regards,</p>
                        <p>The BeCare Team</p>
                    </div>
                </body>
                </html>
            ";
                   
            }else if($bodyFlag == 3){
               $mail->Subject ="BeCare Account Verified";  
               $email_template = "
               <!DOCTYPE html>
               <html>
                 <head>
                   <title>Your BeCare Account has been verified!</title>
                   <style>
                     /* CSS styles */
                     body {
                       font-family: Arial, sans-serif;
                       margin: 0;
                       padding: 0;
                       background-color: #f4f4f4;
                       color: #333;
                     }
                     .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                     }

                     h1 {
                        font-size: 28px;
                        font-weight: bold;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                     }

                     p {
                           font-size: 16px;
                           line-height: 24px;
                           margin: 0;
                           margin-bottom: 20px;
                           color: #333333;
                     }

                     .btn {
                       display: inline-block;
                       padding: 10px 20px;
                       background-color: #007bff;
                       color: #ffffff;
                       text-decoration: none;
                       border-radius: 4px;
                       font-size: 16px;
                       font-weight: bold;
                     }
                     .btn:hover {
                       background-color: #0069d9;
                     }
                   </style>
                 </head>
                 <body>
                   <div class='container'>
                     <h1>Your BeCare Account has been verified!</h1>
                     <p>Dear {$name},</p>
                     <p>We are pleased to inform you that your account on BeCare has been verified and is now active.</p>
                     <p>To access your account, please click the button below:</p>
                     <p>
                        <a href='http://localhost/be-care/Login/login' style='color:white' class='btn'>Login to BeCare</a>
                     </p>
                     <p>Please use the username and password you entered during the signup process to login.</p>
                     <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
                     <p>Thank you for choosing BeCare!</p>
                     <p>Best regards,</p>
                     <p>The BeCare Team</p>

                   </div>
                 </body>
               </html>
                                        
               ";
           }
           
          else if($bodyFlag == 4){
            $mail->Subject ="BeCare Account Status - Service Provider Qualification Not Verified";  
            $email_template = "
            
            <!DOCTYPE html>
            <html>
            <head>
               <title>Service Provider Qualification Not Verified</title>
               <style>
                  body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f4f4f4;
                        color: #333333;
                  }

                  .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                  }

                  h1 {
                        font-size: 28px;
                        font-weight: bold;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                  }

                  p {
                        font-size: 16px;
                        line-height: 24px;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                  }

                  .button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #ffffff;
                        text-decoration: none;
                        border-radius: 4px;
                        margin-top: 20px;
                        border: none;
                        font-size: 16px;
                        font-weight: bold;
                        cursor: pointer;
                  }

                  .button:hover {
                        background-color: #0069d9;
                  }
               </style>
            </head>
            <body>
            <div class='container'>
               <h1>BeCare Account Verification</h1>
               <p>Dear {$name},</p>
               <p>We regret to inform you that your application to become a service provider on BeCare has been unsuccessful. Our administrators have carefully reviewed your qualifications and determined that they do not meet our standards at this time. We encourage you to continue building your skills and qualifications, and to reapply in the future.</p>
               <p>Thank you for your interest in BeCare, and we wish you all the best in your endeavors.</p>
               <p>If you have any questions or concerns, please contact us at becarecs11@gmail.com.</p>
               <p>Best regards,</p>
               <p>The BeCare Team</p>
            </div>
            </body>
            </html>

        " ;
        
        }
        else if($bodyFlag == 5){
         $mail->Subject ="Your BeCare account has been activated";  
         $email_template = "
          <!DOCTYPE html>
            <html>
            <head>
               <title>Your BeCare Account is now Active!</title>
               <style>
                  body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f4f4f4;
                        color: #333333;
                  }

                  .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                  }

                  h1 {
                        font-size: 28px;
                        font-weight: bold;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                  }

                  p {
                        font-size: 16px;
                        line-height: 24px;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                  }

                  .button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #ffffff;
                        text-decoration: none;
                        border-radius: 4px;
                        margin-top: 20px;
                        border: none;
                        font-size: 16px;
                        font-weight: bold;
                        cursor: pointer;
                  }

                  .button:hover {
                        background-color: #0069d9;
                  }
               </style>
            </head>
            <body>
               <div class='container'>
                  <h1>Your BeCare Account is now Active!</h1>
                  <p>Dear {$name},</p>
                  <p>We are pleased to inform you that your account on BeCare has been activated by the administrator.</p>
                  <p>You can now log in to the platform using your email address and the password that you set up when you created your account.</p>
                  <p>Thank you for joining BeCare. We look forward to your participation on the platform.</p>
                  <p>Best regards,</p>
                  <p>The BeCare Team</p>
               </div>
            </body>
            </html>

     " ;
     
     }else if($bodyFlag == 6){
      $mail->Subject ="Your BeCare account has been deactivated";  
      $email_template = "
         <!DOCTYPE html>
            <html>
            <head>
               <title>Your BeCare account has been deactivated</title>
               <style>
                  body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f4f4f4;
                        color: #333333;
                  }

                  .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                  }

                  h1 {
                        font-size: 28px;
                        font-weight: bold;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                  }

                  p {
                        font-size: 16px;
                        line-height: 24px;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                  }

                  .button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #ffffff;
                        text-decoration: none;
                        border-radius: 4px;
                        margin-top: 20px;
                        border: none;
                        font-size: 16px;
                        font-weight: bold;
                        cursor: pointer;
                  }

                  .button:hover {
                        background-color: #0069d9;
                  }
               </style>
            </head>
            <body>
               <div class='container'>
                  <h1>Account Deactivated</h1>
                  <p>Dear {$name},</p>
                  <p>We are sorry to inform you that your account on BeCare has been deactivated by the administrator.</p>
                  <p>If you have any questions or concerns, please contact us at becarecs11@gmail.com.</p>
                  <p>Best regards,</p>
                  <p>The BeCare Team</p>
               </div>
            </body>
            </html>
                  
  " ;
  
  }else if($bodyFlag == 7){
   $mail->Subject ="Verify Your BeCare Account";  
   $email_template = "
         <!DOCTYPE html>
         <html>
         <head>
            <title>BeCare Account Verification</title>
            <style>
               body {
                  font-family: Arial, sans-serif;
                  margin: 0;
                  padding: 0;
                  background-color: #f4f4f4;
                  color: #333;
               }
               .container {
                  max-width: 600px;
                  margin: 0 auto;
                  padding: 20px;
                  background-color: #ffffff;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                  
               }
               h1 {
                  font-size: 28px;
                  font-weight: bold;
                  margin: 0;
                  margin-bottom: 20px;
                  color: #333333;
               }

               p {
                     font-size: 16px;
                     line-height: 24px;
                     margin: 0;
                     margin-bottom: 20px;
                     color: #333333;
               }

               .btn {
                 display: inline-block;
                 padding: 10px 20px;
                 background-color: #007bff;
                 color: #ffffff;
                 text-decoration: none;
                 border-radius: 4px;
                 font-size: 16px;
                 font-weight: bold;
               }
               .btn:hover {
                 background-color: #0069d9;
               }

            </style>
         </head>
         <body>
            <div class='container'>
               <h1>Welcome to Be Care</h1>
               <h2>Verify Your Email Address</h2>
               <p>Dear {$name},</p>
               <p>Thank you for signing up for Be Care. To complete your registration, please verify your email address by clicking the button below:</p>
               <p><a href='http://localhost/be-care/Pages/verifyEmailAddress/$token/$other' style='color:white' class='btn' >Verify Email Address</a></p>
               <p>If you did not sign up for Be Care, please ignore this email.</p>
               <p>Thank you,</p>
               <p>The Be Care Team</p>
            </div>
         </body>
         </html>
   
               
" ;

}else if($bodyFlag == 8){
  $mail->Subject ="Patient paid for medicine order";  
  $email_template = "
        <!DOCTYPE html>
        <html>
        <head>
           <title>BeCare Account Verification</title>
           <style>
              body {
                 font-family: Arial, sans-serif;
                 margin: 0;
                 padding: 0;
                 background-color: #f4f4f4;
                 color: #333;
              }
              .container {
                 max-width: 600px;
                 margin: 0 auto;
                 padding: 20px;
                 background-color: #ffffff;
                 box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                 
              }
              h1 {
                 font-size: 28px;
                 font-weight: bold;
                 margin: 0;
                 margin-bottom: 20px;
                 color: #333333;
              }

              p {
                    font-size: 16px;
                    line-height: 24px;
                    margin: 0;
                    margin-bottom: 20px;
                    color: #333333;
              }

              .btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                color: #ffffff;
                text-decoration: none;
                border-radius: 4px;
                font-size: 16px;
                font-weight: bold;
              }
              .btn:hover {
                background-color: #0069d9;
              }

           </style>
        </head>
        <body>
           <div class='container'>
              <h1>Be Care notification</h1>
              <h2>Patient paid for medicine order</h2>
              <p>Dear {$name},</p>
              <p>{$other['patient_title']}. {$other['patient_name']} paid for the medicine order and now you can preceed with deliver. Click below for details</p>
              <p><a href='http://localhost/be-care/Pages' style='color:white' class='btn' >Order Details</a></p>
              <p>Thank you,</p>
              <p>The Be Care Team</p>
           </div>
        </body>
        </html>
  
              
" ;

} // Send email after reject order of patient
else if($bodyFlag == 9){
   $mail->Subject ="BeCare Order Medicine";  
   $email_template = "
   <!DOCTYPE html>
   <html>
     <head>
       <title>Your order has been rejected!</title>
       <style>
         /* CSS styles */
         body {
           font-family: Arial, sans-serif;
           margin: 0;
           padding: 0;
           background-color: #f4f4f4;
           color: #333;
         }
         .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         }

         h1 {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            margin-bottom: 20px;
            color: #333333;
         }

         p {
               font-size: 16px;
               line-height: 24px;
               margin: 0;
               margin-bottom: 20px;
               color: #333333;
         }

         .btn {
           display: inline-block;
           padding: 10px 20px;
           background-color: #007bff;
           color: #ffffff;
           text-decoration: none;
           border-radius: 4px;
           font-size: 16px;
           font-weight: bold;
         }
         .btn:hover {
           background-color: #0069d9;
         }
       </style>
     </head>
     <body>
       <div class='container'>
         <h1>Your order has been rejected!</h1>
         <p>Dear {$name},</p>
         <p>We are pleased to inform you that your order has been rejected.This pharmacy may have rejected your order because they do not have the requested medicines available in their inventory.</p>
         <p>To access your account, please click the button below:</p>
         <p>
            <a href='http://localhost/be-care/Login/login' style='color:white' class='btn'>Login to BeCare</a>
         </p>
         <p>Please use the username and password you entered during the signup process to login.</p>
         <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
         <p>Thank you for choosing BeCare!</p>
         <p>Best regards,</p>
         <p>The BeCare Team</p>

       </div>
     </body>
   </html>
                            
   ";
}
//  Send email after accept order of patient
else if($bodyFlag == 10){
  $mail->Subject ="BeCare Order Medicine";  
  $email_template = "
  <!DOCTYPE html>
  <html>
    <head>
      <title>Your order has been rejected!</title>
      <style>
        /* CSS styles */
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f4f4f4;
          color: #333;
        }
        .container {
           max-width: 600px;
           margin: 0 auto;
           padding: 20px;
           background-color: #ffffff;
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
           font-size: 28px;
           font-weight: bold;
           margin: 0;
           margin-bottom: 20px;
           color: #333333;
        }

        p {
              font-size: 16px;
              line-height: 24px;
              margin: 0;
              margin-bottom: 20px;
              color: #333333;
        }

        .btn {
          display: inline-block;
          padding: 10px 20px;
          background-color: #007bff;
          color: #ffffff;
          text-decoration: none;
          border-radius: 4px;
          font-size: 16px;
          font-weight: bold;
        }
        .btn:hover {
          background-color: #0069d9;
        }
      </style>
    </head>
    <body>
    <div class='container'>
    <h1>Your order has been Accepted!</h1>
    <p>Dear {$name},</p>
    <p>We are pleased to inform you that your order has been Accepted.You can pay and confirm your order.</p>
    <p>To access your account, please click the button below:</p>
    <p>
       <a href='http://localhost/be-care/Login/login' style='color:white' class='btn'>Login to BeCare</a>
    </p>
    <p>Please use the username and password you entered during the signup process to login.</p>
    <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
    <p>Thank you for choosing BeCare!</p>
    <p>Best regards,</p>
    <p>The BeCare Team</p>

  </div>
    </body>
  </html>
                           
  ";
}
//  Send email after send diet plan for patient
else if($bodyFlag == 14){
  $mail->Subject ="BeCare Diet Plan";  
  $email_template = "
  <!DOCTYPE html>
  <html>
    <head>
      <title>Your diet plan has been sent!</title>
      <style>
        /* CSS styles */
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f4f4f4;
          color: #333;
        }
        .container {
           max-width: 600px;
           margin: 0 auto;
           padding: 20px;
           background-color: #ffffff;
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
           font-size: 28px;
           font-weight: bold;
           margin: 0;
           margin-bottom: 20px;
           color: #333333;
        }

        p {
              font-size: 16px;
              line-height: 24px;
              margin: 0;
              margin-bottom: 20px;
              color: #333333;
        }

        .btn {
          display: inline-block;
          padding: 10px 20px;
          background-color: #007bff;
          color: #ffffff;
          text-decoration: none;
          border-radius: 4px;
          font-size: 16px;
          font-weight: bold;
        }
        .btn:hover {
          background-color: #0069d9;
        }
      </style>
    </head>
    <body>
    <div class='container'>
    <h1>Your diet plan is ready!</h1>
    <p>Dear {$name},</p>
    <p>We are pleased to inform you that your diet plan has been sent.Follow it and achieve your goals.Good luck!</p>
    <p>To access your account, please click the button below:</p>
    <p>
       <a href='http://localhost/be-care/Login/login' style='color:white' class='btn'>Login to BeCare</a>
    </p>
    <p>Please use the username and password you entered during the signup process to login.</p>
    <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
    <p>Thank you for choosing BeCare!</p>
    <p>Best regards,</p>
    <p>The BeCare Team</p>

  </div>
    </body>
  </html>
                           
  ";


} else if($bodyFlag == 11){
  $mail->Subject ="Be-Care Doctor Channel";
  $email_template = "
    <!DOCTYPE html>
    <html>
      <head>
        <title>Channel Created</title>
        <style>
          /* CSS styles */
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
          }
          .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          }

          h1 {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            margin-bottom: 20px;
            color: #333333;
          }

          p {
                font-size: 16px;
                line-height: 24px;
                margin: 0;
                margin-bottom: 20px;
                color: #333333;
          }

          .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
          }
          .btn:hover {
            background-color: #0069d9;
          }
        </style>
      </head>
      <body>
        <div class='container'>
          <h1>Your Doctor Channel Appointment Created Successfully!</h1>
          <p>Dear {$name},</p>
          <p>We are pleased to inform you that your channelling appointment has been successfully created.</p>
          <p>The details of your appointment are listed below.</p>
          <li>Patient Name: {$other['patient_title']}. {$other['patient_name']}</li>
          <li>Patient Age: {$other['patient_age']}</li>
          <li>Patient Contact Number: {$other['patient_contact_number']}</li>
          <li>Doctor Name: Dr. {$other['doctor_first_name']} {$other['doctor_last_name']}</li>
          <li>Appointment Date: {$other['date']}</li>
          <li>Appointment Time: {$other['time']}</li>
          <li>Venue: {$other['venue']}</li>
          <li>Your Appointment number: {$other['appointment_number']}</li>
          <li>Paid amount: Rs. {$other['fee']}</li>
          <p>You can visit Be Care website to see more details by clicking the button below:</p>
          <p>
            <a href='http://localhost/be-care/Patient/viewDoctorAppointments' style='color:white' class='btn'>BeCare Appointments</a>
          </p>
          <p>Use your username and password to login.</p>
          <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
          <p>Thank you for choosing BeCare!</p>
          <p>Best regards,</p>
          <p>The BeCare Team</p>

        </div>
      </body>
    </html>
                            
    ";
      } else if($bodyFlag == 12){
        $mail->Subject ="Be-Care Counsellor Channel";
        $email_template = "
          <!DOCTYPE html>
          <html>
            <head>
              <title>Channel Created</title>
              <style>
                /* CSS styles */
                body {
                  font-family: Arial, sans-serif;
                  margin: 0;
                  padding: 0;
                  background-color: #f4f4f4;
                  color: #333;
                }
                .container {
                  max-width: 600px;
                  margin: 0 auto;
                  padding: 20px;
                  background-color: #ffffff;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
      
                h1 {
                  font-size: 28px;
                  font-weight: bold;
                  margin: 0;
                  margin-bottom: 20px;
                  color: #333333;
                }
      
                p {
                      font-size: 16px;
                      line-height: 24px;
                      margin: 0;
                      margin-bottom: 20px;
                      color: #333333;
                }
      
                .btn {
                  display: inline-block;
                  padding: 10px 20px;
                  background-color: #007bff;
                  color: #ffffff;
                  text-decoration: none;
                  border-radius: 4px;
                  font-size: 16px;
                  font-weight: bold;
                }
                .btn:hover {
                  background-color: #0069d9;
                }
              </style>
            </head>
            <body>
              <div class='container'>
                <h1>Your Counsellor Channel Appointment Created Successfully!</h1>
                <p>Dear {$name},</p>
                <p>We are pleased to inform you that your channelling appointment has been successfully created.</p>
                <p>The details of your appointment are listed below.</p>
                <li>Patient Name: {$other['patient_title']}. {$other['patient_name']}</li>
                <li>Patient Age: {$other['patient_age']}</li>
                <li>Patient Contact Number: {$other['patient_contact_number']}</li>
                <li>Counsellor Name: Dr. {$other['counsellor_first_name']} {$other['counsellor_last_name']}</li>
                <li>Appointment Date: {$other['date']}</li>
                <li>Appointment Time: {$other['time']}</li>
                <li>Venue: {$other['venue']}</li>
                <li>Your Appointment number: {$other['appointment_number']}</li>
                <li>Paid amount: Rs. {$other['fee']}</li>
                <p>You can visit Be Care website to see more details by clicking the button below:</p>
                <p>
                  <a href='http://localhost/be-care/Patient/viewCounsellorAppointments' style='color:white' class='btn'>BeCare Appointments</a>
                </p>
                <p>Use your username and password to login.</p>
                <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
                <p>Thank you for choosing BeCare!</p>
                <p>Best regards,</p>
                <p>The BeCare Team</p>
      
              </div>
            </body>
          </html>
                                  
          ";
            } else if($bodyFlag == 13){
              $mail->Subject ="Be-Care Meditation Instructing Registration";
              $email_template = "
                <!DOCTYPE html>
                <html>
                  <head>
                    <title>Appointment Created</title>
                    <style>
                      /* CSS styles */
                      body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f4f4f4;
                        color: #333;
                      }
                      .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                      }
            
                      h1 {
                        font-size: 28px;
                        font-weight: bold;
                        margin: 0;
                        margin-bottom: 20px;
                        color: #333333;
                      }
            
                      p {
                            font-size: 16px;
                            line-height: 24px;
                            margin: 0;
                            margin-bottom: 20px;
                            color: #333333;
                      }
            
                      .btn {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #ffffff;
                        text-decoration: none;
                        border-radius: 4px;
                        font-size: 16px;
                        font-weight: bold;
                      }
                      .btn:hover {
                        background-color: #0069d9;
                      }
                    </style>
                  </head>
                  <body>
                    <div class='container'>
                      <h1>Your Meditation Instructing Appointment Created Successfully!</h1>
                      <p>Dear {$name},</p>
                      <p>We are pleased to inform you that your meditation instructing appointment has been successfully created.</p>
                      <p>The details of your appointment are listed below.</p>
                      <li>Patient Name: {$other['patient_title']}. {$other['patient_name']}</li>
                      <li>Patient Age: {$other['patient_age']}</li>
                      <li>Patient Contact Number: {$other['patient_contact_number']}</li>
                      <li>Meditating Instructor Name: {$other['instructor_title']}. {$other['instructor_first_name']} {$other['instructor_last_name']}</li>
                      <li>Date: {$other['date']}</li>
                      <li>Starting Time: {$other['starting_time']}</li>
                      <li>Ending Time: {$other['ending_time']}</li>
                      <li>Venue: {$other['venue']}</li>
                      <li>Paid amount: Rs. {$other['fee']}</li>
                      <p>You can visit Be Care website to see more details by clicking the button below:</p>
                      <p>
                        <a href='http://localhost/be-care/Patient/viewDoctorAppointments' style='color:white' class='btn'>BeCare Appointments</a>
                      </p>
                      <p>Use your username and password to login.</p>
                      <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
                      <p>Thank you for choosing BeCare!</p>
                      <p>Best regards,</p>
                      <p>The BeCare Team</p>
            
                    </div>
                  </body>
                </html>
                                        
                ";
                  } else if($bodyFlag == 15){
                    $mail->Subject ="Be-Care Diet Plans";
                    $email_template = "
                      <!DOCTYPE html>
                      <html>
                        <head>
                          <title>Appointment Created</title>
                          <style>
                            /* CSS styles */
                            body {
                              font-family: Arial, sans-serif;
                              margin: 0;
                              padding: 0;
                              background-color: #f4f4f4;
                              color: #333;
                            }
                            .container {
                              max-width: 600px;
                              margin: 0 auto;
                              padding: 20px;
                              background-color: #ffffff;
                              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            }
                  
                            h1 {
                              font-size: 28px;
                              font-weight: bold;
                              margin: 0;
                              margin-bottom: 20px;
                              color: #333333;
                            }
                  
                            p {
                                  font-size: 16px;
                                  line-height: 24px;
                                  margin: 0;
                                  margin-bottom: 20px;
                                  color: #333333;
                            }
                  
                            .btn {
                              display: inline-block;
                              padding: 10px 20px;
                              background-color: #007bff;
                              color: #ffffff;
                              text-decoration: none;
                              border-radius: 4px;
                              font-size: 16px;
                              font-weight: bold;
                            }
                            .btn:hover {
                              background-color: #0069d9;
                            }
                          </style>
                        </head>
                        <body>
                          <div class='container'>
                            <h1>You have received a diet plan request!</h1>
                            <p>Dear {$name},</p>
                            <p>you have received a diet plan request from {$other['patient_title']}. {$other['patient_name']}.</p>
                            <p>You can visit Be Care website to see more details by clicking the button below:</p>
                            <p>
                              <a href='http://localhost/be-care/pages' style='color:white' class='btn'>BeCare Diet Plans</a>
                            </p>
                            <p>Use your username and password to login.</p>
                            <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
                            <p>Thank you for choosing BeCare!</p>
                            <p>Best regards,</p>
                            <p>The BeCare Team</p>
                  
                          </div>
                        </body>
                      </html>
                                              
                      ";
                        } else if($bodyFlag == 16){
                          $mail->Subject ="Be-Care Medicine Order";
                          $email_template = "
                            <!DOCTYPE html>
                            <html>
                              <head>
                                <title>Appointment Created</title>
                                <style>
                                  /* CSS styles */
                                  body {
                                    font-family: Arial, sans-serif;
                                    margin: 0;
                                    padding: 0;
                                    background-color: #f4f4f4;
                                    color: #333;
                                  }
                                  .container {
                                    max-width: 600px;
                                    margin: 0 auto;
                                    padding: 20px;
                                    background-color: #ffffff;
                                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                  }
                        
                                  h1 {
                                    font-size: 28px;
                                    font-weight: bold;
                                    margin: 0;
                                    margin-bottom: 20px;
                                    color: #333333;
                                  }
                        
                                  p {
                                        font-size: 16px;
                                        line-height: 24px;
                                        margin: 0;
                                        margin-bottom: 20px;
                                        color: #333333;
                                  }
                        
                                  .btn {
                                    display: inline-block;
                                    padding: 10px 20px;
                                    background-color: #007bff;
                                    color: #ffffff;
                                    text-decoration: none;
                                    border-radius: 4px;
                                    font-size: 16px;
                                    font-weight: bold;
                                  }
                                  .btn:hover {
                                    background-color: #0069d9;
                                  }
                                </style>
                              </head>
                              <body>
                                <div class='container'>
                                  <h1>You have received a diet plan request!</h1>
                                  <p>Dear {$name},</p>
                                  <p>you have received a medicine order request from {$other['patient_title']}. {$other['patient_name']}.</p>
                                  <p>You can visit Be Care website to see more details by clicking the button below:</p>
                                  <p>
                                    <a href='http://localhost/be-care/pages' style='color:white' class='btn'>BeCare Medicine Orders</a>
                                  </p>
                                  <p>Use your username and password to login.</p>
                                  <p>If you have any questions or concerns, please do not hesitate to contact us.</p>
                                  <p>Thank you for choosing BeCare!</p>
                                  <p>Best regards,</p>
                                  <p>The BeCare Team</p>
                        
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

  
?>