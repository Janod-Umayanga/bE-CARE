<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Requested Meditation Instructor</h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminReqSerProviders/adminSearchReqMeditationInstructor" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Filter requested meditation instructor by first name, last name, city, address">&nbsp
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


              </tr>

              <?php foreach($data['meditationInstructor'] as $meditationInstructor): ?>
               <tr>
               <td><?php echo $meditationInstructor->first_name ?></td>
               <td><?php echo $meditationInstructor->last_name ?></td>
               <td><?php echo $meditationInstructor->registered_date ?></td>
               <td><?php echo $meditationInstructor->city ?></td>
             

             <td>
               <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminViewMoreReqMeditationInstructor/<?php echo $meditationInstructor->requested_meditation_instructor_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminReqSerProviders/adminVerifyReqMeditationInstructor/<?php echo $meditationInstructor->requested_meditation_instructor_id ?>" >
                       <button class="buttonamUzz button1amUzz"  name="verifyD">Verify</button>
                </form>
               </td>
               <td>
                 <form action="<?php echo URLROOT;?>/AdminReqSerProviders/adminNotVerifyReqMeditationInstructor/<?php echo $meditationInstructor->requested_meditation_instructor_id ?>">
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
