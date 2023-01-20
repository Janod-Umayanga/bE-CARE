<footer class="footer">
        <div class="about-becare">
            <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
            <p>This is a web platform build by CS Group 11 of UCSC batch 19/20 for the second year group project. This would provide an opportunity for service providers in local healchcare sector to provide their service more effectively as well as for people in the country to get their service at the time they need.</p>
        </div>
        <div class="footer-links">
            <div>
                <h3>Home</h3>
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Service</a>
                    </li>
                    <?php if (isset($_SESSION['patient_id'])): ?>
                        <li>
                            <a href="<?php echo URLROOT ?>/Patient/complaints">Complaint</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo URLROOT ?>/Patient/login">Complaint</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div>
                <h3>Services</h3>
                <ul>
                    <li>
                        <a href="#">Find a Doctor</a>
                    </li>
                    <li>
                        <a href="#">Find a Counsellor</a>
                    </li>
                    <li>
                        <a href="#">Find a Pharmacy</a>
                    </li>
                    <li>
                        <a href="#">Find a Nutritionist</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Links</h3>
                <ul>
                    <li>
                        <button class="footer-buttons">Register</button>
                    </li>
                    <li>
                        <button class="footer-buttons footer-login">Login</button>
                    </li>
                </ul>
            </div>
        </div>
        <p class="copyright"><i class="fa-regular fa-copyright"></i> 2022-2024 <a href="#">Be-care</a> All Rights Reserved</p>
    </footer>