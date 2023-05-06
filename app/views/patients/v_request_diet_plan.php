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
                <a href="<?php echo URLROOT ?>/Patient/findNutritionist" class="page-change-button-from-diet"><i class="fa-solid fa-arrow-left"></i>Back to Find a Nutritionist</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Enter your details</h2>
                    <p>Fill the relevant details needed for the diet plan request. Make sure to mention any additional medical details if there is any in the relevant field or type "-" if there is none. You need to mention the goal in the relevant field and click submit to proceed with the payment. You will soon receive an email when the nutritionist issued your diet plan and you can download the diet plan via our website.</p>
                </div>
            </div>
        </div>
        <div class="diet-plan-rightside">
            <form action="<?php echo URLROOT ?>/Patient/requestDietPlan/<?php echo $data['nutritionist_id'] ?>/<?php echo $data['fee'] ?>" method="POST">
                <div class="diet-form-inputs-and-buttons">
                    <div class="left">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">
                        <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" value="<?php echo $data['age'] ?>">
                        <span class="form-invalid"><?php echo $data['age_err'] ?></span>

                        <label for="gender">Title</label>
                            <select name="gender" id="gender"  value="<?php echo $data['gender'] ?>">
                                <option value="">Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                            </select>
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="number" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <label for="weight">Weight (Kg)</label>
                        <input type="number" id="weight" name="weight" value="<?php echo $data['weight'] ?>">
                        <span class="form-invalid"><?php echo $data['weight_err'] ?></span>

                        <label for="height">Height (cm)</label>
                        <input type="number" id="height" name="height" value="<?php echo $data['height'] ?>">
                        <span class="form-invalid"><?php echo $data['height_err'] ?></span>

                        <button>Submit</button>
                    </div>
                    <div class="right">
                        <label for="marital_status">Marital status</label>
                        <select name="marital_status" id="marital_status">
                            <option value="married">Married</option>
                            <option value="unmarried">Unmarried</option>
                        </select>

                        <label for="medical_details">Medical details</label>
                        <input type="text" id="medical_details" name="medical_details" value="<?php echo $data['medical_details'] ?>">
                        <span class="form-invalid"><?php echo $data['medical_details_err'] ?></span>

                        <label for="allergies">Allergies</label>
                        <input type="text" id="allergies" name="allergies" value="<?php echo $data['allergies'] ?>">
                        <span class="form-invalid"><?php echo $data['allergies_err'] ?></span>

                        <label for="sleeping_hours">Sleeping hours per day</label>
                        <input type="number" id="sleeping_hours" name="sleeping_hours" value="<?php echo $data['sleeping_hours'] ?>">
                        <span class="form-invalid"><?php echo $data['sleeping_hours_err'] ?></span>

                        <label for="water_consumption_per_day">Water consumption per day (ml)</label>
                        <input type="number" id="water_consumption_per_day" name="water_consumption_per_day" value="<?php echo $data['water_consumption_per_day'] ?>">
                        <span class="form-invalid"><?php echo $data['water_consumption_per_day_err'] ?></span>

                        <label for="goal">Goal</label>
                        <textarea name="goal" id="goal" cols="30" rows="10" value="<?php echo $data['goal'] ?>"></textarea>
                        <span class="form-invalid"><?php echo $data['goal_err'] ?></span>
                    </div>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>