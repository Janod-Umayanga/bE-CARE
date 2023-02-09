<nav class="theme">
        <div class="top-content-formobile"></div> <!-- This only appear when view width fits for mobile-->

        <div class="aside-menu">
            <span id="line" class="theme"></span>
            <span id="line" class="theme"></span>
            <span id="line" class="theme"></span>
        </div>

        <div class="nav-bottom">
            <div class="content-container theme" id="content-container">
                <h2><i class="fa-solid fa-pills"></i> Be-Care</h2>
                <ul>
                    <div class="links-container">
                        <li>

                        <?php if(isset($_SESSION['admin_id'])): ?>
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/AdminDashboard/adminDashBoard">Home</a>
                              
                        <?php elseif(isset($_SESSION['MedInstr_id'])): ?>
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/MedInstrDashBoard/medInstrDashBoard">Home</a>

                        <?php elseif(isset($_SESSION['doctor_id'])): ?>
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/Doctor/dashboard">Home</a>

                        <?php elseif(isset($_SESSION['counsellor_id'])): ?>
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/Counsellor/dashboard">Home</a>    
                     
                        <?php elseif(isset($_SESSION['nutritionist_id'])): ?>
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/Nutritionist/nutritionistDashBoard">Home</a>

                        <?php elseif(isset($_SESSION['pharmacist_id'])): ?>
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/Pharmacist/pharmacistDashBoard">Home</a>    
                            

                        <?php else: ?>
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/Pages/index">Home</a>
                         
                        <?php endif; ?>   
                           
                        
                        </li>
                        <li>
                            <a id="navigation-link" class="navigation-link theme" href="#">About</a>
                        </li>
                        <li>
                            <a id="navigation-link" class="navigation-link theme" href="#">Service</a>
                        </li>
                        <li>
                            <a id="navigation-link" class="navigation-link theme" href="#">Content</a>
                        </li>
                    </div>
                    <div class="button-container">
                        <p class="register-approach">Register for the system</p> <!-- This only appear when view width fits for mobile-->
                        
                        <?php if(isset($_SESSION['patient_id'])): ?>
                            <a href="<?php echo URLROOT ?>/Patient/details" class="nav-buttons"><?php echo $_SESSION['patient_name'] ?></a>
                            <a href="<?php echo URLROOT ?>/Login/logout" class="nav-buttons register-button">LOG OUT</a>
                        <?php elseif(isset($_SESSION['admin_id'])): ?>
                            <a href="<?php echo URLROOT ?>/Admin/profile" class="nav-buttons"><?php echo strtoupper($_SESSION["admin_gender"].$_SESSION['admin_name']) ?></a>
                            <a href="<?php echo URLROOT ?>/Login/logout" class="nav-buttons register-button">LOG OUT</a>  
                        <?php elseif(isset($_SESSION['MedInstr_id'])): ?>
                            <a href="<?php echo URLROOT ?>/MedInstr/profile" class="nav-buttons"><?php echo strtoupper($_SESSION["MedInstr_gender"].$_SESSION['MedInstr_name']) ?></a>
                            <a href="<?php echo URLROOT ?>/Login/logout" class="nav-buttons register-button">LOG OUT</a>
                        <?php elseif(isset($_SESSION['doctor_id'])): ?>
                            <a href="<?php echo URLROOT ?>/Doctor/details" class="nav-buttons">Dr. <?php echo $_SESSION['doctor_name'] ?></a>
                            <a href="<?php echo URLROOT ?>/Login/logout" class="nav-buttons register-button">LOG OUT</a>
                        <?php elseif(isset($_SESSION['counsellor_id'])): ?>
                            <a href="<?php echo URLROOT ?>/Counsellor/details" class="nav-buttons">Dr. <?php echo $_SESSION['counsellor_name'] ?></a>
                            <a href="<?php echo URLROOT ?>/Login/logout" class="nav-buttons register-button">LOG OUT</a>
                       
                        <?php elseif(isset($_SESSION['nutritionist_id'])): ?>
                            <a href="<?php echo URLROOT ?>/Nutritionist/profDetails" class="nav-buttons"><?php echo $_SESSION['nutritionist_name'] ?></a>
                            <a href="<?php echo URLROOT ?>/Login/logout" class="nav-buttons register-button">LOG OUT</a>
                       
                        <?php elseif(isset($_SESSION['pharmacist_id'])): ?>
                            <a href="<?php echo URLROOT ?>/Pharmacist/profDetails" class="nav-buttons"><?php echo $_SESSION['pharmacist_name'] ?></a>
                            <a href="<?php echo URLROOT ?>/Login/logout" class="nav-buttons register-button">LOG OUT</a>
                       
                        <?php else: ?>
                            <a href="<?php echo URLROOT ?>/Login/login" class="nav-buttons">LOGIN</a>
                            <a href="<?php echo URLROOT ?>/Patient/signup" class="nav-buttons register-button">SIGN UP</a>
                        <?php endif; ?>
                    </div>
                    <i id="button-themechange" onclick="changeTheme()" class="fa-solid fa-moon"></i>
                </ul>
            </div>
        </div>
    </nav>