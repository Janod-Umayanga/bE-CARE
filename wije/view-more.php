<?php session_start();?>
<?php
include 'includes/db.inc.php';



?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view-more</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>

<?php
 include_once "n1-header.php";
?>


   <!-- <header>
        <div class="left-side">
            <h1>Be Care</h1>
        </div>
        <div class="right-side">
         
            <a href="logout.php">Logout</a>
        </div>
    </header> -->

    <?php
    include 'includes/db.inc.php';
    $conn=mysqli_connect('localhost','root','','be_care');
    //make query and get result1
#$mysqli = new mysqli('localhost', 'root','', 'be_care');
#  $result1 = mysqli_query($mysqli, $q);

if(isset($_GET['view']))
{
    $req_id = $_GET['view'];
    $sql2 = "SELECT * FROM request_diet_plan WHERE request_diet_plan_id = $req_id ";
    $row = mysqli_query($conn, $sql2);
}

?>

<sectionc class="ncontent">

    <div class="container-3">
        <h1>Details of Diet Plan</h1>

        <div class="container-4">
        <table id="reg">
            <tr>              
                <th>Diet Plan Id</th>
                <th>Age</th>
                <th>Gender</th>
                <th>weight</th>
                <th>Height</th>
                <th>Marital Status</th>
                <th>Medical Details</th>
                <th>Allergies</th>
                <th>Sleeping Hours</th>
                <th>Water Consumption Per Day</th>
                <th>Goals</th>
                            
            </tr>
            <tr>
                <?php 
                while($row2 = mysqli_fetch_assoc($row))
                {
                ?>
                <td><?php echo $row2['request_diet_plan_id']; ?></td>
                <td><?php echo $row2['age']; ?></td>
                <td><?php echo $row2['gender']; ?></td>
                <td><?php echo $row2['weight']; ?></td>
                <td><?php echo $row2['height']; ?></td>
                <td><?php echo $row2['marital_status']; ?></td>
                <td><?php echo $row2['medical_details']; ?></td>
                <td><?php echo $row2['allergies']; ?></td>
                <td><?php echo $row2['sleeping_hours']; ?></td>
                <td><?php echo $row2['water_consumption_per_day']; ?></td>
                <td><?php echo $row2['goal']; ?></td>
               
               
            </tr>
            <?php
                }
            ?>
        </table>
        </div>
    </div>

</sectionc>


    <?php
 include_once "n-footer.php";
?>


    
</body>
</html>