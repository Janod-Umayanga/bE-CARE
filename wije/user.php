<?php session_start()?>
<?php
require_once('includes/db.inc.php');
$user_id = $_SESSION['user_id'];
//$name = $_SESSION['first_name'];   
?>

<!DOCTYPE html>
<html lang="en">
<?php 
#require_once('connect-database.php');

#$sql2 = "SELECT * FROM  "



//$query = "SELECT * FROM request_diet_plan";
//$result = mysqli_query($mysqli,$query);

# get all attendiees
# $results = $crud->getAttendees();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view-more</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>

   <!--<header>
        <div class="left-side">
            <h1>Be Care</h1>
        </div>
        <div class="logedin">
       <a href="view-profile.php"> <?php 
             #echo $first_name; 
        ?></a>
        </div>
            <a href="logout.php">Logout</a>
        </div>
    </header>--> 

    <?php
 include_once "n1-header.php";
?>


    <?php 

# adala login wena user ge id ta adala details gannwa database eken
$conn = mysqli_connect('localhost', 'root','', 'be_care');
//	 $q=mysqli_query($mysqli,"SELECT * FROM nutritionist where email ='rasika@gmail.com' ;");
$q=mysqli_query($conn,"SELECT * FROM request_diet_plan req
inner join nutritionist nut on 
nut.nutritionist_id = req.nutritionist_id 
where nut.nutritionist_id = '$user_id' ") ;
# $result2 = mysqli_query($connection, $q);
             
  

    #$user_id = $_SESSION['request_diet_plan_id'];
    #$first_name = $_SESSION['first_name'];

    // methana link weddi adala username and password ta galapenna denna 

    

    ?> 

 <sectionc class="ncontent">

    <div class="container-3">
        <h1>Diet Plan Requests</h1>

        <div class="container-4">
        <table id="reg">
            <tr>              
                <th>Diet Plan Id</th>
                <th>Patient Name</th>
                <th>Contact Number</th>
                <th>View</th>  
                <th>Accept</th>
                         
            </tr>
            <tr>
                <?php 
                while($record1 = mysqli_fetch_assoc($q))
                {
                    ?>
                <!--   echo '<tr>';
                    echo '<td>'.$record1['request_diet_plan_id'].'</td>';
                    echo '<td>'.$record1['name'].'</td>';
                    echo '<td>'.$record1['contact_number'].'</td>';--> 

                <td><?php echo $record1['request_diet_plan_id']; ?></td>
                <td><?php echo $record1['name']; ?></td>
                <td><?php echo $record1['contact_number']; ?></td>
                <td><a class="view" onclick="myfunction(); location.href =" href="view-more.php?view=<?=$record1['request_diet_plan_id']; ?> ">View More</td>
                <td><a class ="view" onclick="myfunction(); location.href =" href="accept.php?view=<?=$record1['request_diet_plan_id']; ?> ">Accept</td> 
                    
                   <!-- echo "<td><button type='button' class='btn-info'>View More</button></td>"; 
                <td>
                   <form  action="view-more.php" method="post">
                    <button onclick="myfunction(); location.href=" href="view-more.php?view= <?=$record1['request_diet_plan_id']; ?> " class="btn1 btn3">View More</button>
                 </form></td>
                 <td>
                 <form  action="accept.php.php" method="post">
                    <button class="btn2 btn4" value="<?php echo $row["requested_diet_plan_id"] ?>" name="submit">Accept</button>
                 </form></td>


                 -->

               
        <?php #$id = $row['request_diet_plan_id'];   ?>
      <!-- <td><?php # echo $row['request_diet_plan_id']; ?></td>
        <td><?php #echo $row['name']; ?></td>
        <td><?php #echo $row['contact_number']; ?></td>
        <?php  #$id = $row['request_diet_plan_id'];?> -->
    <!-- <td colspan="3"><a href='view.php?request_diet_plan_id=$id'><button type="button" class="btn" >View More</button></td>  -->

       
        
        <!--<td><a href="view.php" class="btn">View More</a></td> -->

        

            </tr>
            <?php
                   
                }
            ?>
        </table>
        </div>
    </div>


    <?php
 include_once "n-footer.php";
?>


     

    
</body>
</html>