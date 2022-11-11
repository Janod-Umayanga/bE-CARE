<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__."/database.php";

    $sql = "SELECT * FROM patient WHERE patient_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

$sql = "INSERT INTO complaint (subject, description, patient_id)
        VALUES (?, ?, ?)";


$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)) {
    die("SQL error: ".$mysqli->error);
}

$stmt->bind_param("ssd",
                    $_POST["subject"],
                    $_POST["description"],
                    $user["patient_id"]);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {
    die($mysqli->error."".$mysqli->errno);
}
