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

    <section class="doctor-cards">
        <div class="left">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Filter by doctor names, type or city">
                <button type="submit">Search</button>
            </form>

            <?php
            if (isset($_GET['search'])) {
                $filter = $_GET['search'];
                $sql="SELECT * FROM pharmacist WHERE CONCAT(pharmacy_name, city) LIKE '%$filter%'";
                $result = mysqli_query($mysqli, $sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){ ?>
                        <div class="card">
                            <div class="card-left">
                                <p> <?php echo $row['pharmacy_name'] ?> </p>
                            </div>
                            <div class="card-right">
                                <div>
                                    <p>City : <?php echo $row['city'] ?></p>
                                    <p>Address : <?php echo $row['address'] ?></p>
                                </div>
                                <?php if (isset($user)): ?>
                                    <form action="order-medicine-form.php" method="POST">
                                        <input type="hidden" name="pharmacist_id" id="pharmacist_id" value="<?php echo $row['pharmacist_id'] ?>">
                                        <button>Order</button>
                                    </form>
                                <?php else: ?>
                                    <form action="signup-form.php">
                                        <button>Order</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php }
                }
            }else{
                $sql="SELECT * FROM pharmacist";
                $result = mysqli_query($mysqli, $sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){ ?>
                        <div class="card">
                            <div class="card-left">
                                <p> <?php echo $row['pharmacy_name'] ?> </p>
                            </div>
                            <div class="card-right">
                                <div>
                                    <p>City : <?php echo $row['city'] ?></p>
                                    <p>Address : <?php echo $row['address'] ?></p>
                                </div>
                                <?php if (isset($user)): ?>
                                    <form action="order-medicine-form.php" method="POST">
                                        <input type="hidden" name="pharmacist_id" id="pharmacist_id" value="<?php echo $row['pharmacist_id'] ?>">
                                        <button>Order</button>
                                    </form>
                                <?php else: ?>
                                    <form action="signup-form.php">
                                        <button>Order</button>
                                    </form>
                                <?php endif; ?>
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