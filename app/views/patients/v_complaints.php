<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Complaint</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="signup">

        <div class="content">
                <h1>Report Your Complaint</h1>
                <form action="<?php echo URLROOT ?>/Patient/complaints" method="POST">
                    <div>
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="<?php echo $data['subject'] ?>">
                        <span class="form-invalid"><?php echo $data['subject_err'] ?></span>

                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" value="<?php echo $data['description'] ?>">
                        <span class="form-invalid"><?php echo $data['description_err'] ?></span>
                    </div>
                    <div>

                        <button>Report</button>
                    </div>       
                </form>
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html>