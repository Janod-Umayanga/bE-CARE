<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Diet-Plan-Form</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="signup">
        <div class="content">
                <h1>Fill these details to request the diet plan</h1>
                <form action="<?php echo URLROOT ?>/Patient/requestDietPlan/<?php echo $data['nutritionist_id'] ?>" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">
                        <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                        <label for="age">Age</label>
                        <input type="text" id="age" name="age" value="<?php echo $data['age'] ?>">
                        <span class="form-invalid"><?php echo $data['age_err'] ?></span>

                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender" value="<?php echo $data['gender'] ?>">
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <label for="weight">Weight (Kg)</label>
                        <input type="text" id="weight" name="weight" value="<?php echo $data['weight'] ?>">
                        <span class="form-invalid"><?php echo $data['weight_err'] ?></span>

                        <label for="height">Height (cm)</label>
                        <input type="text" id="height" name="height" value="<?php echo $data['height'] ?>">
                        <span class="form-invalid"><?php echo $data['height_err'] ?></span>
                    </div>
                    <div>
                        <label for="marital_status">Marital status</label>
                        <input type="text" id="marital_status" name="marital_status" value="<?php echo $data['marital_status'] ?>">
                        <span class="form-invalid"><?php echo $data['marital_status_err'] ?></span>

                        <label for="medical_details">Medical details</label>
                        <input type="text" id="medical_details" name="medical_details" value="<?php echo $data['medical_details'] ?>">
                        <span class="form-invalid"><?php echo $data['medical_details_err'] ?></span>

                        <label for="allergies">Allergies</label>
                        <input type="text" id="allergies" name="allergies" value="<?php echo $data['allergies'] ?>">
                        <span class="form-invalid"><?php echo $data['allergies_err'] ?></span>

                        <label for="sleeping_hours">Sleeping hours per day</label>
                        <input type="text" id="sleeping_hours" name="sleeping_hours" value="<?php echo $data['sleeping_hours'] ?>">
                        <span class="form-invalid"><?php echo $data['sleeping_hours_err'] ?></span>

                        <label for="water_consumption_per_day">Water consumption per day (ml)</label>
                        <input type="text" id="water_consumption_per_day" name="water_consumption_per_day" value="<?php echo $data['water_consumption_per_day'] ?>">
                        <span class="form-invalid"><?php echo $data['water_consumption_per_day_err'] ?></span>

                        <label for="goal">Goal</label>
                        <input type="text" id="goal" name="goal" value="<?php echo $data['goal'] ?>">
                        <span class="form-invalid"><?php echo $data['goal_err'] ?></span>

                        <button>Submit</button>
                    </div>     
                </form>
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html>