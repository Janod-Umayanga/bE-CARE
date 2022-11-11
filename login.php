<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__."/database.php";

    $sql = sprintf("SELECT * FROM patient WHERE email = '%s' ", $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["patient_id"];

            header("Location: index.php");
            exit;

        }

    }

    $is_invalid = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Patient-Login</title>
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

                <h1>Login as a Patient</h1>

                <?php if ($is_invalid): ?>
                    <em>Invalid login</em>
                <?php endif; ?>

                <form method="post">
                    <div>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required="true">

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required="true">

                        <button>Log In</button>
                        
                    </div>
                    <div>

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