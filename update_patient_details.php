<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__."/database.php";

    $sql = "SELECT * FROM patient WHERE patient_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

$sql = "UPDATE patient SET first_name=?, last_name=?, nic=?, contact_number=?, gender=? WHERE patient_id=? ";


$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)) {
    die("SQL error: ".$mysqli->error);
}

$stmt->bind_param("sssssd",
                    $_POST["fname"],
                    $_POST["lname"],
                    $_POST["nic"],
                    $_POST["cnumber"],
                    $_POST["gender"],
                    $user["patient_id"]);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {
    die($mysqli->error."".$mysqli->errno);
}
