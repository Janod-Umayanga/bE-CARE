<?php

// include "database.php";

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Password didn't match!");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__."/database.php";

// $sql = "INSERT INTO patient (first_name, last_name, nic, contact_number, gender, email, password)
//         VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[nic]', '$_POST[cnumber]', '$_POST[gender]', '$_POST[email]', '$_POST[password]')";

$sql = "INSERT INTO patient (first_name, last_name, nic, contact_number, gender, email, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

// $result = mysqli_query($mysqli, $sql);

$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)) {
    die("SQL error: ".$mysqli->error);
}

$stmt->bind_param("sssssss",
                    $_POST["fname"],
                    $_POST["lname"],
                    $_POST["nic"],
                    $_POST["cnumber"],
                    $_POST["gender"],
                    $_POST["email"],
                    $password_hash);

$stmt->execute();

print_r($_POST);
var_dump($password_hash);