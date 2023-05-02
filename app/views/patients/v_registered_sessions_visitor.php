<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4a594ff55.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f1513ae29e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style2.css">
    <title>Visitor Session Register</title>
</head>
<body>
    <section class="login-section">
        <div class="login-page-leftside">
            <div class="left-side-container">
            <a href="<?php echo URLROOT ?>/Pages/index" class="page-change-button"><i class="fa-solid fa-arrow-left"></i>Back to Homepage</a>
                <div>
                    <h1><i class="fa-solid fa-pills"></i> Be-Care</h1>
                    <h2>Give the contact number you've given for the session(s)</h2>
                    <p>The relevant sessions you've registered with the number you provided here will be shown</p>
                </div>
            </div>
        </div>
        <div class="login-page-rightside">
            <form action="<?php echo URLROOT ?>/Patient/viewRegisteredSessions/" method="POST">
                <div class="topic-of-form">
                    <h1>Give the contact number you've given for the session(s)</h1>
                </div>

                <div class="form-inputs-and-buttons">
                        <label for="name">Contact number</label>
                        <input type="text" id="cnumber" name="cnumber" value="<?php echo $data['cnumber'] ?>">
                        <span class="form-invalid"><?php echo $data['cnumber_err'] ?></span>

                    <button>Submit</button>
                </div>
            </form>
        </div>
    </section>  
</body>
</html>