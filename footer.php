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
            <?php if (isset($user)): ?>
                 <li>
                    <a href="complaint.php">COMPLAINTS</a>
                </li>
            <?php else: ?>
                 <li>
                    <a href="signup-form.php">COMPLAINTS</a>
                 </li>
            <?php endif; ?>
            </ul>
    </div>
    <div class="bottom">
         <p>2022 All Rights reserved</p>
    </div>
</footer>