<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Doctor
            <button class="buttonam button1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewDoctor">Add New </a></button>
         </h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchDoctor" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter doctor by first name, last name, city, type, specialization">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
              <th>First Name</th>
                <th>Last Name</th>
                <th>Registered date</th>
                <th>type</th>
                <th>specialization</th>
                <th></th>

                <th></th>
              


              </tr>

              <?php foreach($data['doctor'] as $doctor): ?>
               <tr>
               <td><?php echo $doctor->first_name ?></td>
               <td><?php echo $doctor->last_name ?></td>
               <td><?php echo $doctor->registered_date ?></td>
               <td><?php echo $doctor->type ?></td>
               <td><?php echo $doctor->specialization ?></td>
              

             <td>
               <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMoreDoctor/<?php echo $doctor->doctor_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeleteDoctor/<?php echo $doctor->doctor_id ?>" method="post">
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
