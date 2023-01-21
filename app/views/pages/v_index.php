<?php require APPROOT.'/views/inc/header.php'; ?>

<?php 

if(isset($_SESSION['admin_id'])){
    require APPROOT.'/views/inc/components/topnavbar.php'; 
}else if(isset($_SESSION['MedInstr_id'])){
    require APPROOT.'/views/inc/components/topnavbar.php'; 
}

?>


<br><br><br>
               <h1>WELCOME<?php echo $_SESSION['admin_gender'] ?></h1>


<?php require APPROOT.'/views/inc/footer.php'; ?>
