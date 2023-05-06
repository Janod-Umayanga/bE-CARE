<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4a594ff55.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f1513ae29e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
    <title>Document</title>
</head>
<body>
    <section class="diet-plan-section">
        <div class="diet-plan-leftside">
            <div class="diet-left-side-container">
                <a href="<?php echo URLROOT ?>/Nutritionist/getAllRequests/" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Diet Plans requests Page</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Fill these details to add new session</h2>
                    <p>Login to the application to experience the healthcare services we are providing. If you haven't registered with the application yet, click the <b>sign up</b> button and create an account for free.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <form action="<?php echo URLROOT ?>/Pharmacist/acceptOrderSubmit/" method="POST">
            <input type="hidden" name="order_request_id" value=" <?php echo $data['more']->order_request_id; ?>"> 
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">

                  
                   <!--     <lable for="" >Request Diet Plan ID</lable>
                        <input type="text" id="request_diet_plan_id" name="request_diet_plan_id" value="<?php #echo $details->request_diet_plan_id?>" disabled>
                   
                    <input type="hidden" name="request_diet_plan_id" value="<?php #echo $more->request_diet_plan_id; ?>"> -->
                        <label for="pharmacist_note">Note</label>
                        <textarea name="pharmacist_note" id="pharmacist_note" rows="6" cols="6" value="<?php echo $data['pharmacist_note'] ?>"
                        placeholder="These medicines are Available.You can pay and confirm your order."></textarea>
                        <span class="form-invalid"><?php echo $data['pharmacist_note'] ?></span>

                        <label for="bill">Bill</label>
                        <input type="file" name="bill" id="bill" required value="<?php echo $data['bill'] ?>" >
                        <span class="form-invalid"><?php echo $data['bill_err'] ?></span>

                        
                        <label for="charge">Charge(Rs.)</label>
                        <input name="charge" id="charge" required value="<?php echo $data['charge'] ?>" >
                        <span class="form-invalid"><?php echo $data['charge_err'] ?></span>
             
                        <button type="submit">Accept </button>
                  
                    
                </div>
            </form>
        </div>
    </section>  
</body>
</html>