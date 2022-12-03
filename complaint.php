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

<?php include 'header.php'; ?>

    <section class="signup">

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

    <?php include 'footer.php'; ?>
</body>
</html>