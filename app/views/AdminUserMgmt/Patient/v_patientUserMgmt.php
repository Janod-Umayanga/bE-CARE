<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Patient
            <button class="buttonam button1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewPatient">Add New </a></button>
             </h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchPatient" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter patient by first name, last name">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nic</th>
                <th>Registered Date</th>
                <th></th>
                <th></th>
    


              </tr>

              <?php foreach($data['patient'] as $patient): ?>
               <tr>
               <td><?php echo $patient->first_name ?></td>
               <td><?php echo $patient->last_name ?></td>
               <td><?php echo $patient->nic ?></td>
               <td><?php echo $patient->registered_date ?></td>
              

             <td>
               <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMorePatient/<?php echo $patient->patient_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>
            </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeletePatient/<?php echo $patient->patient_id ?>" method="post">
                       <button class="buttonamD button1amD"  name="DeleteC">Delete</button>
                </form>
               </td>
               
              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
           
               </tr>

               <?php endforeach;?>

               



           </table>
     </div>
      </div>
  </section>
  
<?php require APPROOT.'/views/inc/footer.php'; ?>
