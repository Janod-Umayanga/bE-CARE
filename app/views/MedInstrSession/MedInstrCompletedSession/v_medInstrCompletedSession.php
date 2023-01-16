<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Sessions</h1>
            <form class="searchform" action="<?php echo URLROOT;?>/MedInstrSession/searchMedInstrOldSession" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Filter Completed sessions by title date address fee">&nbsp
                  <button type="submit">Search</button>
            </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Session Title</th>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th></th>
                <th></th>

              </tr>

         <?php foreach($data['oldSession'] as $oldSession): ?>
           <tr>
              
              <td><?php echo $oldSession->title ?></td>
              <td><?php echo $oldSession->date ?></td>
              <td><?php echo $oldSession->starting_time ?></td>
              <td><?php echo $oldSession->ending_time ?></td>
             <td>
               <form  action="<?php echo URLROOT;?>/MedInstrSession/viewMoreMedInstrOldSession/<?php echo $oldSession->session_id?>" method="post">
                      <button class="buttonamUyy  button1amUyy "  name="submit">View More</button>
               </form>
              </td>


             <td>
               <form  action="<?php echo URLROOT;?>/MedInstrSession/viewRegUsersMedInstrOldSession/<?php echo $oldSession->session_id?>" method="post">
                      <button class="buttonamMS button1amMS"  name="regusersSession">View Registered Users</button>
               </form>
              </td>

             </tr>
           
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


