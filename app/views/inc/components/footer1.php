<footer class="footer">
        <div class="about-becare">
            <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
            <p>This is a web platform build by CS Group 11 of UCSC batch 19/20 for the second year group project. This would provide an opportunity for service providers in local healchcare sector to provide their service more effectively as well as for people in the country to get their service at the time they need.</p>
        </div>
        <div class="footer-links">
            <div>
                <h3>Your</h3>
                <ul>
                    <!-- <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li> -->
                    <li>
                        <a href="<?php echo URLROOT ?>/Patient/viewFeedbacks">Feedbacks</a>
                    </li>
                    <?php if (isset($_SESSION['patient_id'])): ?>
                        <li>
                            <a href="<?php echo URLROOT ?>/Patient/addFeedback">Add a feedback</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['patient_id']) || isset($_SESSION['MedInstr_id']) || isset($_SESSION['doctor_id']) || isset($_SESSION['counsellor_id']) || isset($_SESSION['nutritionist_id']) || isset($_SESSION['pharmacist_id'])  ): ?>
                        <li>
                            <a href="<?php echo URLROOT ?>/Complaint/complaint">Complaint</a>
                        </li>
                    <?php elseif(!isset($_SESSION['admin_id']) ): ?>
                        <li>
                            <a href="<?php echo URLROOT ?>/Login/login">Complaint</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <h3>Services</h3>

                <?php if (isset($_SESSION['patient_id'])): ?>
                

                <ul>
                    <li>
                        <a href="<?php echo URLROOT ?>/Patient/findDoctor">Find a Doctor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Patient/findCounsellor">Find a Counsellor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Patient/findPharmacy">Find a Pharmacy</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Patient/findNutritionist">Find a Nutritionist</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Patient/findMeditationInstructor">Find a Meditation Instructor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Patient/findSession">Find a Session</a>
                    </li>
                </ul>

                <?php elseif(isset($_SESSION['admin_id']) ): ?>

                  <ul>
                    <li>
                        <a href="<?php echo URLROOT;?>/AdminReqSerProviders/adminReqSerProviders">Requested Service Providers</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/AdminComplaintMgmt/adminComplaintMgmt">Complaint Management</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/AdminUserMgmt/adminUserMgmt">User Management</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/AdminPayments/doctorChannelPayments">Payments</a>
                    </li>
                   
                </ul>

                <?php elseif(isset($_SESSION['MedInstr_id']) ): ?>

                  <ul>
                    <li>
                        <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsers/medInstrRegisteredUsers">Registered Users for Med Instructions</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/MedInstrRegisteredUsersHistory/medInstrRegisteredUsersHistory">Registered Users History</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/MedInstrChangeSessionDetails/medInstrChangeSessionDetails">Change Session Details</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/MedInstrChangetimeslot/medInstrChangetimeslot">Change Timeslot</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/MedInstrSession/medInstrSession">Session</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT;?>/MedInstrAddtimeslot/medInstrAddtimeslot">Add timeslot</a>
                    </li>
                   
                </ul>

              <?php elseif(isset($_SESSION['doctor_id']) ): ?>

                  <ul>
                    <li>
                        <a href="<?php echo URLROOT ?>/Doctor/timeslots">Timeslots</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/DoctorAppoinments/DoctorAppoinments">Appointments</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/DoctorAppoinments/AppoinmentsHistory">Channeling Patients History</a>
                    </li>
                   
                   
                </ul>


              <?php elseif(isset($_SESSION['counsellor_id']) ): ?>

                  <ul>
                    <li>
                        <a href="<?php echo URLROOT ?>/CounsellorSession/counsellorSession">Session</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Counsellor/timeslots">Timeslots</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/CounsellorChangeSessionDetails/counsellorChangeSessionDetails">Change Sessions</a>
                    </li>

                    <li>
                        <a href="<?php echo URLROOT ?>/CounsellorAppoinments/counsellorAppoinments">Appointments</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/CounsellorAppoinments/AppoinmentsHistory">Channeling Patients History</a>
                    </li>
                   
                   
                </ul>

              <?php elseif(isset($_SESSION['nutritionist_id']) ): ?>

                  <ul>
                    <li>
                        <a href="<?php echo URLROOT ?>/Nutritionist/getAllRequests">Diet Plan Requests</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Nutritionist/nutritionistViewHistory">Issued Diet plans History</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/NutritionistSession/nutritionistSession">Sessions</a>
                    </li>

                    <li>
                        <a href="<?php echo URLROOT ?>/NutritionistChangeSessionDetails/nutritionistChangeSessionDetails">Change Session Details</a>
                    </li>
                   
                   
                </ul>

                
              <?php elseif(isset($_SESSION['pharmacist_id']) ): ?>

                  <ul>
                    <li>
                        <a href="<?php echo URLROOT ?>/Pharmacist/pharmacistViewOrders">Orders</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT ?>/Pharmacist/pharmacistSellingHistory/">Selling History</a>
                    </li>
                  
                   
                </ul>

              <?php endif; ?>


            </div>
            <div>
                <h3>Links</h3>
                <ul>
                    <li>
                        <?php if(isset($_SESSION['admin_id'])): ?>
                            <form action="<?php echo URLROOT ?>/AdminDashboard/adminDashBoard">
                                <button class="footer-buttons">Home</button>
                            </form>
                        <?php elseif(isset($_SESSION['MedInstr_id'])): ?>
                            <form action="<?php echo URLROOT ?>/MedInstrDashBoard/medInstrDashBoard">
                                <button class="footer-buttons">Home</button>
                            </form>
                        <?php elseif(isset($_SESSION['doctor_id'])): ?>
                            <form action="<?php echo URLROOT ?>/Doctor/dashboard">
                                <button class="footer-buttons">Home</button>
                            </form>
                        <?php elseif(isset($_SESSION['counsellor_id'])): ?>
                            <form action="<?php echo URLROOT ?>/Counsellor/dashboard">
                                <button class="footer-buttons">Home</button>
                            </form>
                        <?php elseif(isset($_SESSION['nutritionist_id'])): ?>
                            <form action="<?php echo URLROOT ?>/Nutritionist/nutritionistDashBoard">
                                <button class="footer-buttons">Home</button>
                            </form>
                        <?php elseif(isset($_SESSION['pharmacist_id'])): ?>
                            <form action="<?php echo URLROOT ?>/Pharmacist/pharmacistDashBoard">
                                <button class="footer-buttons">Home</button>
                            </form>
                        <?php else: ?>
                            <form action="<?php echo URLROOT ?>/Pages/index">
                                <button class="footer-buttons">Home</button>
                            </form>
                        <?php endif; ?>
                    </li>
                    <li>
                        <form action="<?php echo URLROOT ?>/Pages/about">
                            <button class="footer-buttons footer-login">About</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <p class="copyright"><i class="fa-regular fa-copyright"></i> 2022-2024 <a href="#">Be-care</a> All Rights Reserved</p>
    </footer>