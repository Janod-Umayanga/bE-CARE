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
                <a href="login.php">LOGIN</a>
                <a href="signup-form.php">SIGN UP</a>
            </div>
        </header>

    <?php endif; ?>

    <section class="patient-approaches">
        <div class="container">
                <a href="channel-a-doctor.php">
                    <div>
                        <div class="image">
                            <img src="Images/page1-img1.jpg" alt="">
                        </div>
                        <h2>Channel a Doctor</h2>
                        <p>Select your preferred pharmacy, order your prescription medicine online and have it delivered straight to your home.</p>  
                    </div>
                </a>
                <a href="#">
                    <div>
                        <div class="image">
                            <img src="Images/page1-img2.jpg" alt="">
                        </div>
                        <h2>Channel a Counsellor</h2>
                        <p>Select your preferred pharmacy, order your prescription medicine online and have it delivered straight to your home.</p>  
                    </div>
                </a>
                <a href="order-medicine.php">
                    <div>
                        <div class="image">
                            <img src="Images/page1-img3.png" alt="">
                        </div>
                        <h2>Order Medicine</h2>
                        <p>Select your preferred pharmacy, order your prescription medicine online and have it delivered straight to your home.</p>  
                    </div>
                </a>
                <a href="#">
                    <div>
                        <div class="image">
                            <img src="Images/page1-img4.jpg" alt="">
                        </div>
                        <h2>Request a Diet Plan</h2>
                        <p>Select your preferred pharmacy, order your prescription medicine online and have it delivered straight to your home.</p>  
                    </div>
                </a>
                <a href="#">
                    <div>
                        <div class="image">
                            <img src="Images/page1-img5.jpg" alt="">
                        </div>
                        <h2>Register for a Meditation Instructor</h2>
                        <p>Select your preferred pharmacy, order your prescription medicine online and have it delivered straight to your home.</p>  
                    </div>
                </a>
                <a href="#">
                    <div>
                        <div class="image">
                            <img src="Images/page1-img6.jpg" alt="">
                        </div>
                        <h2>Register for a Session</h2>
                        <p>Select your preferred pharmacy, order your prescription medicine online and have it delivered straight to your home.</p>  
                    </div>
                </a>
        </div>   
    </section>

    <!--<section class="patient-approaches">
            <ul>
                <li>
                <a href="channel-a-doctor.php">Channel a Doctor</a>
                </li>
                <li>
                <a href="#">Channel a Counsellor</a>
                </li>
                <li>
                <a href="order-medicine.php">Order Medicine</a>
                </li>
                <li>
                <a href="#">Request a Diet Plan</a>
                </li>
                <li>
                <a href="#">Register for a Meditation Instructor</a>
                </li>
                <li>
                <a href="#">Register for a Session</a>
                </li>
            </ul>
    </section>
    -->
    <footer>
        <div class="top">
            <ul>
                <li>
                    <a href="#">ABOUT US</a>
                </li>
                <li>
                    <a href="#">CONTACT US</a>
                </li>
                <li>
                    <a href="#">FEEDBACKS</a>
                </li>
                <?php if (isset($user)): ?>
                    <li>
                        <a href="complaint.php">COMPLAINTS</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="signup-form.php">COMPLAINTS</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="bottom">
            <p>2022 All Rights reserved</p>
        </div>
    </footer> 
</body>
</html>