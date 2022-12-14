
<?php
 require_once "dbh.inc.php";
 require_once "Mfunctions.inc.php";


 $id=$_POST["deletetimeslot"];
 Deletetimeslot($conn,$id);

?>
