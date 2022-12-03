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

<?php include 'header.php'; ?>

    <section class="signup">

        <div class="content">

                <h1>Order Medicine</h1>
                <form action="order-medicine-form-submit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="pharmacist_id" id="pharmacist_id" value="<?php echo $_POST['pharmacist_id'] ?>">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user["first_name"] ?? "") ?>" required="true">

                        <label for="address">Delivery Address</label>
                        <input type="text" id="address" name="address" required="true">
                    </div>
                    <div>
                        <label for="cnumber">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?= htmlspecialchars($user["contact_number"] ?? "") ?>" required="true">

                        <label for="prescription">Upload Prescription</label>
                        <input type="file" id="prescription" name="prescription" required="true">

                        <button>Submit</button>
                    </div>

                    

                </form>

        </div>

    </section>

    <?php include 'footer.php'; ?>
</body>
</html>