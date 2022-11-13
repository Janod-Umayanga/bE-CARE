<?php
session_start();
unset($_SESSION['userMid']);
session_destroy();
header("location:../index.php");
exit();
