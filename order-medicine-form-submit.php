<?php
session_start();
$mysqli = require __DIR__."/database.php";

if (isset($_SESSION["user_id"])) {

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
    <title>Patient-Order-Medicine-Form</title>
</head>
<body>

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
            <a href="login.php">LOGIN</a>
            <a href="signup.html">SIGN UP</a>
        </div>
    </header>

    <sectionc class="signup">

        <div class="content">

                <h1>Order Medicine</h1>
                <form action="order-medicine-form.php" method="post">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required="true">

                        <label for="address">Delivery Address</label>
                        <input type="text" id="address" name="address" required="true">
                    </div>
                    <div>
                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" required="true">

                        <label for="prescription">Upload Prescription</label>
                        <input type="text" id="prescription" name="prescription" required="true">

                        <button>Submit</button>
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