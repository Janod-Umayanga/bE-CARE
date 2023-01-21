<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Requested Nutritionist</h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminSearchReqNutritionist" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Filter requested nutritionist by first name, last name">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>Requested Date</th>
                <th>Fee</th>
                <th></th>
                <th></th>
                <th></th>


              </tr>

              <?php foreach($data['nutritionist'] as $nutritionist): ?>
               <tr>
               <td><?php echo $nutritionist->first_name ?></td>
               <td><?php echo $nutritionist->last_name ?></td>
               <td><?php echo $nutritionist->contact_number ?></td>
               <td><?php echo $nutritionist->registered_date ?></td>
               <td><?php echo $nutritionist->fee ?></td>
             

             <td>
               <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminViewMoreReqNutritionist/<?php echo $nutritionist->requested_nutritionist_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminVerifyReqNutritionist/<?php echo $nutritionist->requested_nutritionist_id ?>" method="post">
                       <button class="buttonamUzz button1amUzz"  name="verifyD">Verify</button>
                </form>
               </td>
               <td>
                 <form action="<?php echo URLROOT;?>/AdminReqSerProviders/adminNotVerifyReqNutritionist/<?php echo $nutritionist->requested_nutritionist_id ?>" method="post">
                       <button class="buttonamUxx button1amUzz"  name="NotverifyD">Not Verify</button>
                </form>
              </td>

              <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              

               <td>

               </td>
               </tr>

               <?php endforeach;?>

               



           </table>
     </div>
      </div>
  </section>
  
<?php require APPROOT.'/views/inc/footer.php'; ?>
