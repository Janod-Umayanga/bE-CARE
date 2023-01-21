<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Counsellor
            <button class="buttonam button1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewCounsellor">Add New </a></button>
      </h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchCounsellor" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter counsellor by first name, last name, city">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Registered Date</th>
                <th>City</th>
                <th></th>
                <th></th>
              


              </tr>

              <?php foreach($data['counsellor'] as $counsellor): ?>
               <tr>
               <td><?php echo $counsellor->first_name ?></td>
               <td><?php echo $counsellor->last_name ?></td>
               <td><?php echo $counsellor->registered_date ?></td>
               <td><?php echo $counsellor->city ?></td>
              

             <td>
               <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMoreCounsellor/<?php echo $counsellor->counsellor_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeleteCounsellor/<?php echo $counsellor->counsellor_id ?>" method="post">
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
