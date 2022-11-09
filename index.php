<?php
 include_once "header.php";
?>


 <sectionc class="signup">
     <div class="content">
            <h1>
              <?php

                if(isset($_SESSION["useruid"])){
                    echo "<p>Hello " .$_SESSION["useruid"]."</p>";
                }

               ?>


            </h1>
      </div>
  </section>


<?php
 include_once "footer.php";
?>
