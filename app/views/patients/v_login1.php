<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title>Patient-Login</title>
</head>
<body>

<?php require APPROOT.'/views/inc/components/header.php'; ?>

    <section class="signup">
        <div class="content">
                <h1>Login as a Patient</h1>
                <form action="" method="POST">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">
                        <span class="form-invalid"><?php echo $data['email_err'] ?></span>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?php echo $data['password'] ?>">
                        <span class="form-invalid"><?php echo $data['password_err'] ?></span>

                        <button>Log In</button>    
                    </div>
                </form>
        </div>
    </section>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

</body>
</html>