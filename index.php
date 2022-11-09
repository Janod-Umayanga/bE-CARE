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
    <title>Patient-Home</title>
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

                <h1>Paient Home</h1>

                

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