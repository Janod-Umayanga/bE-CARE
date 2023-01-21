<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Admin
            <button class="buttonam button1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewAdmin">Add New </a></button>
       </h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchAdmin" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter admin by first name, last name">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Registered Date</th>
                <th>Contact Number</th>
                <th></th>
                <th></th>
              


              </tr>

              <?php foreach($data['admin'] as $admin): ?>
               <tr>
               <td><?php echo $admin->first_name ?></td>
               <td><?php echo $admin->last_name ?></td>
               <td><?php echo $admin->registered_date ?></td>
               <td><?php echo $admin->contact_number ?></td>
              

             <td>
               <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMoreAdmin/<?php echo $admin->admin_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeleteAdmin/<?php echo $admin->admin_id ?>" method="post">
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
