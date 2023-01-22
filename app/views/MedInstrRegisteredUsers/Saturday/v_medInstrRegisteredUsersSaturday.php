<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>
?>

 
    <sectionc class="sMAdminAM">
           <div class="cMAdminAM">
              <br>
             <form class="searchform" action="<?php echo URLROOT;?>/MedInstrRegisteredUsers/searchMedInstrRegisteredUsersSaturday" method="GET">
                   <input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Filter by date address fee ">&nbsp
                   <button type="submit">Search</button>
             </form><br>

           <?php foreach($data['saturday'] as $saturday): ?>
                     
            <h1><?php echo $saturday->date; ?> | <?php echo $saturday->appointment_day; ?></h1>
                  <h4 style="color:Green;"><?php echo $saturday->address; ?> | Rs.<?php echo $saturday->fee; ?></h4>


                  <div class="aMmAdmintable">
               

                     <table id="Mreg">
                        <?php $gg=1; ?>
                        <?php foreach($data['medChannel'] as $medChannel): ?>
                          <?php if($saturday->med_timeslot_id==$medChannel->med_timeslot_id){ ?>
                       
                           <?php if($gg==1){ ?> 
                            <tr>
                              <th>Starting time</th>
                              <th>Ending time</th>
                              <th>Name</th>
                              <th>Age</th>
                              <th>Contact number</th>
                              <th>Gender</th>

                            </tr>
                            <?php $gg=0;?>
                            <?php } ?>
                   
                           <tr>
                            <td><?php echo $saturday->starting_time ?></td>
                            <td><?php echo $saturday->ending_time ?></td>
                            <td><?php echo $medChannel->name ?></td>
                            <td><?php echo $medChannel->age ?></td>
                            <td><?php echo $medChannel->contact_number ?></td>
                            <td><?php echo $medChannel->gender ?></td>
                          </tr>
                      
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                       
                           <?php }?>
                        <?php endforeach?> 
    
                    </table>
              </div>
              <?php endforeach;?>
    
          </div>
      </section>





<?php require APPROOT.'/views/inc/footer.php'; ?>