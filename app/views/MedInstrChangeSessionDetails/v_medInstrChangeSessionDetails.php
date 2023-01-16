<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>


 <sectionc class="sAdminAM">
     <div class="cAdminAM">
            <h1>Change Session Details
            <button class="buttonam button1am"><a href="<?php echo URLROOT;?>/MedInstrChangeSessionDetails/newMedInstrSession">Add New</a></button></h1>

            <form class="searchform" action="<?php echo URLROOT;?>/MedInstrChangeSessionDetails/searchMedInstrChangeSessionDetails" method="GET">
                  <input type="text" name="search" value="<?php echo $data['search'] ?>" placeholder="Filter sessions by title date address fee">&nbsp
                  <button type="submit">Search</button>
            </form>


         <div class="amAdmintable">


            <table id="reg">
              <tr>
                <th>Session Title</th>
                <th>Date</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Address</th>
                <th></th>
                <th></th>
              </tr>


           <?php foreach($data['sessionDetail'] as $sessionDetail): ?>
         
            <tr>
                 <td><?php echo $sessionDetail->title ?></td>
                 <td><?php echo $sessionDetail->date ?></td>
                 <td><?php echo $sessionDetail->starting_time ?></td>
                 <td><?php echo $sessionDetail->ending_time ?></td>
                 <td><?php echo $sessionDetail->address ?></td>
            
                      
            
            <td>
                <form  action="<?php echo URLROOT;?>/MedInstrChangeSessionDetails/medInstrviewSessionDetails/<?php echo  $sessionDetail->session_id?>" method="post">
                       <button class="buttonamUqq button1amUqq" name="updateSession">Update</button>
                </form>
               </td>
               <td>

                 <form action="<?php echo URLROOT;?>/MedInstrChangeSessionDetails/medInstrDeleteSessionDetails/<?php echo  $sessionDetail->session_id?>" method="post">
                       <button class="buttonamUll button1amUll"  name="DeleteSession">Delete</button>
                </form>


               </td>

           </tr>
          
            <tr>
            <td></td>
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
