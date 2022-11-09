<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__."/database.php";

    $sql = "SELECT * FROM patient WHERE patient_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

?>


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

<?php if (isset($user)): ?>
        <header>
            <div class="left">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1>Be-CARE</h1>
            </div>

            <div class="right">
                <a href="patient_details.php"><?= htmlspecialchars($user["first_name"]) ?></a>
                <a href="logout.php">Log Out</a>
            </div>
        </header>

    <?php else: ?>
        <header>
            <div class="left">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1>Be-CARE</h1>
            </div>

            <div class="right">
                <button>LOGIN</button>
                <button>SIGN UP</button>
            </div>
        </header>

    <?php endif; ?>

    <sectionc class="signup">

        <div class="content">

                <h1><?= htmlspecialchars($user["first_name"] ?? "") ?>'s Details</h1>
                <h3>Registered on <?= htmlspecialchars($user["registered_date"] ?? "") ?></h3>
                <form action="update_patient_details.php" method="post">
                    <div>
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname" value="<?= htmlspecialchars($user["first_name"] ?? "") ?>" required="true">

                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname" value="<?= htmlspecialchars($user["last_name"] ?? "") ?>" required="true">

                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" value="<?= htmlspecialchars($user["nic"] ?? "") ?>" required="true">

                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?= htmlspecialchars($user["contact_number"] ?? "") ?>" required="true">
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender" value="<?= htmlspecialchars($user["gender"] ?? "") ?>" required="true">

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user["email"] ?? "") ?>" required="true">

                        <!-- <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?= htmlspecialchars($user["password"] ?? "") ?>" required="true">

                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required="true"> -->

                        <button>Update</button>
                    </div>

                    

                </form>

        </div>

    </section>

    <footer>
        <p>2022 All Rights reserved</p>
        <ul>
            <li>
                <a href="#">ABOUT US</a>
            </li>
            <li>
                <a href="#">CONTACT US</a>
            </li>
            <li>
                <a href="#">FEED BACKS</a>
            </li>
            <li>
                <a href="#">COMPLAINTS</a>
            </li>
        </ul>
    </footer>
</body>
</html>