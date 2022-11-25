<?php
 include_once "sessionfile.php";
?>

<?php
 include_once "header.php";
?>

<?php
  if(isset($_POST["submit"])){
    require_once "includes/dbh.inc.php";
    $complaintid=$_POST["submit"];
    $result = mysqli_query($conn,"SELECT description FROM complaint WHERE complaint_id=$complaintid");
    $row = mysqli_fetch_array($result);
  }
 ?>


<sectionc class="sViewMAMD">

      <div class="cViewMAMD">

              <h1>Complaint</h1>


              <form >
                  <div>
                      <textarea style="resize:none"  name="name" rows="18" cols="70"  ><?php echo $row["description"] ?> </textarea>
                  </div>

              </form>



      </div>

  </section>




<?php
 include_once "footer.php";
?>
