<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


 <sectionc class="sAdminAM">

       <div class="cAdminAM">

       <h1>Registered Users history</h1>
       <form class="searchform" action="<?php echo URLROOT;?>/MedInstrRegisteredUsersHistory/searchMedInstrRegisteredUsersHistory" method="GET">
             <input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Filter registered users history by day date starting time ending time name, address">&nbsp
             <button type="submit">Search</button>
       </form>

         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Date</th>
                <th>Starting time</th>
                <th>Ending time</th>
                <th>Day</th>
                <th>Name</th>
                <th></th>
              </tr>


                      <?php foreach($data['medChannel'] as $medChannel): ?>
                        
                         <tr>
                         <td><?php echo $medChannel->date ?></td>
                         <td><?php echo $medChannel->starting_time ?></td>
                         <td><?php echo $medChannel->ending_time ?></td>
                         <td><?php echo $medChannel->appointment_day ?></td>
                         <td><?php echo $medChannel->name ?></td>

                         
                          <td>
                            <form  action="<?php echo URLROOT;?>/MedInstrRegisteredUsersHistory/viewMoreMedInstrRegisteredUsersHistory/<?php echo $medChannel->med_timeslot_id?>" method="post">
                                  <button id="myBtn" class="buttonamUzz button1amUzz" name="submit" >View More</button>
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
                        

                        <?php endforeach?> 
                      

           </table>

     </div>

      </div>
  </section>


  <?php require APPROOT.'/views/inc/footer.php'; ?>
