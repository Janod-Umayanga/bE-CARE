
<?php
 require_once "dbh.inc.php";
 require_once "functions.inc.php";


 $id=$_POST["NotverifyD"];
 deleteD($conn,$id);

?>
