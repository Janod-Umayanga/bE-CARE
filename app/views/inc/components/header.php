<header>
    <div class="left">
        <div>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <a href="<?php echo URLROOT ?>/Pages/index"><h1>Be-CARE</h1></a>
    </div>

    <div class="right">
        <?php if(!isset($_SESSION['patient_id'])): ?>
            <a href="<?php echo URLROOT ?>/Patient/login">LOGIN</a>
            <a href="<?php echo URLROOT ?>/Patient/signup">SIGN UP</a>
        <?php else: ?>
            <a href="<?php echo URLROOT ?>/Patient/details"><?php echo $_SESSION['patient_name'] ?></a>
            <a href="<?php echo URLROOT ?>/Patient/logout">LOG OUT</a>
        <?php endif; ?>
    </div>
</header>