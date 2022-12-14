<?php

session_start();
require_once("includes/db.inc.php");


if (isset($_SESSION["user_id"])) {

 #   $mysqli = require __DIR__."/database.php";

   # $sql = "SELECT * FROM patient WHERE patient_id = {$_SESSION["user_id"]}";

    #$result = $mysqli->query($sql);

    #$user = $result->fetch_assoc();

     $sql = "SELECT * FROM nutritionist WHERE nutritionist_id = {$_SESSION["user_id"]}";

   # $result = $mysqli->query($sql);
    $q2 = mysqli_query($conn, $sql);
    #$user = $result->fetch_assoc();
    $user = mysqli_fetch_assoc($q2);

}

$sql3 = "INSERT INTO complaint (subject, description, nutritionist_id)
        VALUES (?, ?, ?)";


$stmt = $conn->stmt_init();

if( ! $stmt->prepare($sql3)) {
    die("SQL error: ".$conn->error);
}

$stmt->bind_param("ssd",
                    $_POST["subject"],
                    $_POST["description"],
                    $user["nutritionist_id"]);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {
    die($conn->error."".$conn->errno);
}