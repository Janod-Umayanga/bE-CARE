<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Pharmacist
            <button class="buttonam button1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewPharmacist">Add New </a></button>
         </h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchPharmacist" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter Pharmacist by first name, last name, pharmacy name, city, address">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Registered date</th>
                <th>pharmacy name</th>
                <th>city</th>

                <th></th>
                <th></th>
              


              </tr>

              <?php foreach($data['pharmacist'] as $pharmacist): ?>
               <tr>
               <td><?php echo $pharmacist->first_name ?></td>
               <td><?php echo $pharmacist->last_name ?></td>
               <td><?php echo $pharmacist->registered_date ?></td>
               <td><?php echo $pharmacist->pharmacy_name ?></td>
               <td><?php echo $pharmacist->city ?></td>
              

             <td>
               <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMorePharmacist/<?php echo $pharmacist->pharmacist_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeletePharmacist/<?php echo $pharmacist->pharmacist_id ?>" method="post">
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
