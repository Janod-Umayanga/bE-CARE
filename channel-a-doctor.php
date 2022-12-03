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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php include 'header.php'; ?>

    <section class="doctor-cards">
        <div class="left">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Filter by doctor names, type or city">
                <button type="submit">Search</button>
            </form>

            <?php
            if (isset($_GET['search'])) {
                $filter = $_GET['search'];
                $sql="SELECT * FROM doctor WHERE CONCAT(first_name,last_name,city,type) LIKE '%$filter%'";
                $result = mysqli_query($mysqli, $sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){ ?>
                        <div class="card">
                            <div class="card-left">
                                <p>Dr. <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?> <br><?php echo $row['type'] ?></p>
                            </div>
                            <div class="card-right">
                                <div>
                                    <h3><?php echo $row['specialization'] ?></h3>
                                    <p>City : <?php echo $row['city'] ?></p>
                                </div>
                                <a href="">Channel</a>
                            </div>
                        </div>
                    <?php }
                }
            }else{
                $sql="SELECT * FROM doctor";
                $result = mysqli_query($mysqli, $sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){ ?>
                        <div class="card">
                            <div class="card-left">
                                <p>Dr. <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?> <br><?php echo $row['type'] ?></p>
                            </div>
                            <div class="card-right">
                                <div>
                                    <h3><?php echo $row['specialization'] ?></h3>
                                    <p>City : <?php echo $row['city'] ?></p>
                                </div>
                                <a href="">Channel</a>
                            </div>
                        </div>
                    <?php }
                }
            }
            ?>

            
        </div>

        <div class="right">
            <img src="doctor-cards.png" alt="">
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>