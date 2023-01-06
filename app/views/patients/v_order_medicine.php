<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Order-Medicine-Form</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="signup">
        <div class="content">
                <h1>Order Medicine</h1>
                <form action="<?php echo URLROOT ?>/Patient/orderMedicine/<?php echo $data['pharmacist_id'] ?>" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">
                        <span class="form-invalid"><?php echo $data['name_err'] ?></span>

                        <label for="address">Delivery Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>">
                        <span class="form-invalid"><?php echo $data['address_err'] ?></span>
                    </div>
                    <div>
                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                        <label for="prescription">Upload Prescription</label>
                        <input type="file" id="prescription" name="prescription" value="<?php echo $data['prescription'] ?>">
                        <span class="form-invalid"><?php echo $data['prescription_err'] ?></span>

                        <button>Submit</button>
                    </div>     
                </form>
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html>