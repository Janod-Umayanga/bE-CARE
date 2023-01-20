<footer>
    <div class="top">
         <ul>
            <li>
                <a href="#">ABOUT US</a>
             </li>
             <li>
                <a href="#">CONTACT US</a>
            </li>
            <li>
                <a href="#">FEEDBACKS</a>
            </li>
            <?php if (isset($_SESSION['patient_id'])): ?>
                 <li>
                    <a href="<?php echo URLROOT ?>/Patient/complaints">COMPLAINTS</a>
                </li>
            <?php else: ?>
                 <li>
                    <a href="<?php echo URLROOT ?>/Patient/login">COMPLAINTS</a>
                 </li>
            <?php endif; ?>
            </ul>
    </div>
    <div class="bottom">
         <p>2022 All Rights reserved</p>
    </div>
</footer>