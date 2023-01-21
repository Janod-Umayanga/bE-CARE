<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php'; ?>

  <sectionc class="sAdminAM">
      <div class="cAdminAM">
             <h1>Registered Users</h1>
             <form class="searchform" action="<?php echo URLROOT;?>/MedInstrSession/searchMedInstrCompletedSessionRegUsers/" method="GET">
                   <input type="text" name="search"  value="<?php echo $data['search'] ?>" placeholder="Filter registered users by name, age">&nbsp
                   <button type="submit" name="sbt">Search</button>
             </form>

          <div class="amAdmintable">


             <table id="reg">
               <tr>
                 <th>Name</th>
                 <th>Contact Number</th>
                 <th>Age</th>
                 <th>Gender</th>
                 <th>Registered Date and Time</th>
                    
               </tr>

            

            <?php foreach($data['regUser'] as $regUser): ?>
               <tr>
                  <td><?php echo $regUser->name ?></td>
                  <td><?php echo $regUser->contact_number ?></td>
                  <td><?php echo $regUser->age ?></td>
                  <td><?php echo $regUser->gender?></td>
                  <td><?php echo $regUser->registered_date_and_time ?></td>
                 
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

