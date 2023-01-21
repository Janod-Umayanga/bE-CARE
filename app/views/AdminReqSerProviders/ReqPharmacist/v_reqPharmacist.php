<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Requested Pharmacist</h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminSearchReqPharmacist" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Filter requested Pharmacist by first name, last name, pharmacy name, city, address">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Pharmacy name</th>
                <th>City</th>
                <th></th>
                <th></th>
                <th></th>



              </tr>

              <?php foreach($data['pharmacist'] as $pharmacist): ?>
               <tr>
               <td><?php echo $pharmacist->first_name ?></td>
               <td><?php echo $pharmacist->last_name ?></td>
               <td><?php echo $pharmacist->pharmacy_name ?></td>
               <td><?php echo $pharmacist->city ?></td>

             <td>
               <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminViewMoreReqPharmacist/<?php echo $pharmacist->requested_pharmacist_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminVerifyReqPharmacist/<?php echo $pharmacist->requested_pharmacist_id ?>" method="post">
                       <button class="buttonamUzz button1amUzz"  name="verifyD">Verify</button>
                </form>
               </td>
               <td>
                 <form action="<?php echo URLROOT;?>/AdminReqSerProviders/adminNotVerifyReqPharmacist/<?php echo $pharmacist->requested_pharmacist_id ?>" method="post">
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
