<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Change Timeslot</h1>
            <form class="searchform" action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/searchMedInstrChangeTimeslot" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>"  placeholder="Filter timeslot by day date address fee starting time ending time">&nbsp
                  <button type="submit">Search</button>
            </form>


         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Day</th>
                <th></th>
                <th></th>
              </tr>

              
          <?php foreach($data['timeslot'] as $timeslot): ?>
          
           <tr>
           <td><?php echo $timeslot->date ?></td>
           <td><?php echo $timeslot->starting_time ?></td>
           <td><?php echo $timeslot->ending_time ?></td>
           <td><?php echo $timeslot->appointment_day ?></td>
           
            
            <td>
                <form  action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/medInstrViewtimeslot/<?php echo $timeslot->med_timeslot_id ?>" method="post">
                       <button class="buttonamUqq button1amUqq"  name="updatetimeslot">Update</button>
                </form>
           </td>

           <td>
                <form action="<?php echo URLROOT;?>/MedInstrChangeTimeslot/deleteMedInstrChangeTimeslot/<?php echo $timeslot->med_timeslot_id ?>" method="post">
                       <button class="buttonamUll button1amUll"  name="deletetimeslot">Delete</button>
                </form>
            </td>

            </tr>

           <tr>
           <td></td>
           <td></td>
           <td></td>
           <td></td>

             <td>
                <form >
                </form>
             </td>

             <td>
                 <form >
                 </form>
             </td>

            </tr>

            <?php endforeach;?>


           </table>
     </div>

     
      </div>
  </section>




  <?php require APPROOT.'/views/inc/footer.php'; ?>

