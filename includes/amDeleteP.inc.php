
<?php
 require_once "dbh.inc.php";
 require_once "functions.inc.php";


 $id=$_POST["DeleteP"];
 AMdeleteP($conn,$id);

?>
