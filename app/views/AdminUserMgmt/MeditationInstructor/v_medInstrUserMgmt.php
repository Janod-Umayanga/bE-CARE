<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

<sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Meditation Instructor
            <button class="buttonam button1am"><a href="<?php echo URLROOT;?>/AdminUserMgmt/addnewMeditationInstructor">Add New </a></button>
          </h1>

            <form class="searchform" action="<?php echo URLROOT;?>/AdminUserMgmt/adminSearchMeditationInstructor" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter meditation instructor by first name, last name, city, address">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Registered date</th>
                <th>city</th>
                <th>fee</th>
                <th></th>
                <th></th>

              


              </tr>

              <?php foreach($data['meditationInstructor'] as $meditationInstructor): ?>
               <tr>
               <td><?php echo $meditationInstructor->first_name ?></td>
               <td><?php echo $meditationInstructor->last_name ?></td>
               <td><?php echo $meditationInstructor->registered_date ?></td>
               <td><?php echo $meditationInstructor->city ?></td>
               <td><?php echo $meditationInstructor->fee ?></td>
              

             <td>
               <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminViewMoremeditationInstructor/<?php echo $meditationInstructor->meditation_instructor_id ?>">
                 <button class="buttonamUyy button1amUxx">View More</button>
               </form>

               

             </td>


              <td>
                <form  action="<?php echo URLROOT;?>/AdminUserMgmt/adminDeletemeditationInstructor/<?php echo $meditationInstructor->meditation_instructor_id ?>" method="post">
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
