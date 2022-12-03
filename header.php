
    <?php if (isset($user)): ?>
        <header>
            <div class="left">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="index.php"><h1>Be-CARE</h1></a>
            </div>

            <div class="right">
                <a href="patient_details.php"><?= htmlspecialchars($user["first_name"]) ?></a>
                <a href="logout.php">Log Out</a>
            </div>
        </header>

    <?php else: ?>
        <header>
            <div class="left">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="index.php"><h1>Be-CARE</h1></a>
            </div>

            <div class="right">
                <a href="login.php">LOGIN</a>
                <a href="signup-form.php">SIGN UP</a>
            </div>
        </header>

    <?php endif; ?>