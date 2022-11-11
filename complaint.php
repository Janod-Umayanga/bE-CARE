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
    <title>Patient-Complaint</title>
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
                <a href="signup.html">SIGN UP</a>
            </div>
        </header>

    <?php endif; ?>

    <sectionc class="signup">

        <div class="content">

                <h1>Report Your Complaint</h1>
                <form action="complaint-submit.php" method="post">
                    <div>
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required="true">

                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" required="true">

                    </div>
                    <div>

                        <button>Report</button>
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
                <a href="#">FEEDBACKS</a>
            </li>
            <?php if (isset($user)): ?>
                <li>
                    <a href="complaint.php">COMPLAINTS</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="signup.html">COMPLAINTS</a>
                </li>
            <?php endif; ?>
        </ul>
    </footer>
</body>
</html>