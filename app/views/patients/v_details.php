<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Details</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="signup">

        <div class="content">
                <h1>Your Details</h1>
                <h3>Registered on <?php echo $data['rdate'] ?></h3>
                <form action="<?php echo URLROOT ?>/Patient/details" method="post">
                    <div>
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $data['fname'] ?>">
                        <span class="form-invalid"><?php echo $data['fname_err'] ?></span>

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $data['lname'] ?>">
                        <span class="form-invalid"><?php echo $data['lname_err'] ?></span>

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?php echo $data['nic'] ?>">
                        <span class="form-invalid"><?php echo $data['nic_err'] ?></span>

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender" value="<?php echo $data['gender'] ?>">
                        <span class="form-invalid"><?php echo $data['gender_err'] ?></span>

                        <label for="email">Email</label>
                        <p><?php echo $data['email'] ?></p>

                        <button>Update</button>
                    </div>
                </form>
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html>