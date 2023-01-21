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
                            <a id="navigation-link" class="navigation-link theme" href="<?php echo URLROOT ?>/Pages/index">Home</a>
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
                            <a href="<?php echo URLROOT ?>/Patient/logout" class="nav-buttons register-button">LOG OUT</a>
                        <?php elseif(isset($_SESSION['admin_id'])): ?>
                            <a href="<?php echo URLROOT ?>/Admin/profile" class="nav-buttons"><?php echo strtoupper($_SESSION["admin_gender"].$_SESSION['admin_name']) ?></a>
                            <a href="<?php echo URLROOT ?>/Admin/logout" class="nav-buttons register-button">LOG OUT</a>  
                        <?php elseif(isset($_SESSION['MedInstr_id'])): ?>
                            <a href="<?php echo URLROOT ?>/MedInstr/profile" class="nav-buttons"><?php echo strtoupper($_SESSION["MedInstr_gender"].$_SESSION['MedInstr_name']) ?></a>
                            <a href="<?php echo URLROOT ?>/MedInstr/logout" class="nav-buttons register-button">LOG OUT</a>
                        <?php else: ?>
                            <a href="<?php echo URLROOT ?>/Patient/login" class="nav-buttons">LOGIN</a>
                            <a href="<?php echo URLROOT ?>/Patient/signup" class="nav-buttons register-button">SIGN UP</a>
                        <?php endif; ?>
                    </div>
                    <i id="button-themechange" onclick="changeTheme()" class="fa-solid fa-moon"></i>
                </ul>
            </div>
        </div>
    </nav>