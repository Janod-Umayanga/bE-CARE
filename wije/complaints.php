<?php

session_start();
require_once("includes/db.inc.php");

if (isset($_SESSION["user_id"])) {

  #  $mysqli = require __DIR__."/database.php";

    $sql = "SELECT * FROM nutritionist WHERE nutritionist_id = {$_SESSION["user_id"]}";

   # $result = $mysqli->query($sql);
    $q2 = mysqli_query($conn, $sql);
    #$user = $result->fetch_assoc();
    $user = mysqli_fetch_assoc($q2);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <title>Patient-Complaint</title>
</head>
<body>

<?php include 'n-header.php'; ?>

    <sectionc class="comp">

        <div class="content-5">

                <h1>Report Your Complaint</h1>
                <form action="complaint-submit.php" method="post">
                    <div>
                        <label for="subject">Subject</label>
                        <input type="sub" id="subject" name="subject" required="true">

                        <label for="description">Description</label>
                        <textarea name="des" id="description" name="description" required="true" ></textarea>

                    </div>
                    <div>

                        <button type="submit" name="submit">Report Submit</button>
                    </div>

                    

                </form>

        </div>

    </section>

    <?php include 'n-footer.php'; ?>
</body>
</html>