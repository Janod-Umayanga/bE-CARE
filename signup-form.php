<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Patient-Signup</title>
</head>
<body>

<?php include 'header.php'; ?>

    <section class="signup">

        <div class="content">

                <h1>Signup as a Patient</h1>
                <form action="signup.php" method="post">
                    <div>
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname" required="true">

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname" required="true">

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" required="true">

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" required="true">
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender" required="true">

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required="true">

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required="true">

                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required="true">

                        <button>Sign Up</button>
                    </div>
                </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>