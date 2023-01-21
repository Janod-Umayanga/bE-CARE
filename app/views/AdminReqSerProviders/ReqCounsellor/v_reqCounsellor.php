<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Requested Counsellor</h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminSearchReqCounsellor" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter requested counsellor by first name, last name, city">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Requested Date</th>
                <th>City</th>
                <th></th>
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
               <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminViewMoreReqCounsellor/<?php echo $counsellor->requested_counsellor_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminVerifyReqCounsellor/<?php echo $counsellor->requested_counsellor_id ?>" method="post">
                       <button class="buttonamUzz button1amUzz"  name="verifyD">Verify</button>
                </form>
               </td>
               <td>
                 <form action="<?php echo URLROOT;?>/AdminReqSerProviders/adminNotVerifyReqCounsellor/<?php echo $counsellor->requested_counsellor_id ?>" method="post">
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
