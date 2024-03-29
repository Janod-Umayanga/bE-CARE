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
    <script defer src="<?php echo URLROOT; ?>/js/script.js"></script>
    <script defer src="<?php echo URLROOT; ?>/js/filterDoctor.js"></script>
    <title>Find a Doctor</title>
</head>
<body>
    <!--
        name
        type (Western/Ayurvedic)
        specialization
        city
    -->
    
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <div class="doctor-main-picture-container">
        <div class="tittle">
            <i class="fa-solid fa-stethoscope"></i>
            <h1>Find Your Doctor<br>for Channeling!</h1>
        </div>
        <div class="pharmacy-search-section theme">
            <form action="" class="search-form-pharmacy" method="POST">
                <select name="day" id="day">
                    <option value="">Find doctors for today</option>
                    <option value="Today">Today</option>
                    <option value="Tommorow">Tommorow</option>
                </select>
                <select name="specialization" id="specialization">
                    <option value="">Specialization</option>
                    <option value="Allergist">Allergist</option>
                    <option value="Anesthesiologist">Anesthesiologist</option>
                    <option value="Ayurveda">Ayurveda</option>
                    <option value="Ayurveda Consultant Physician">Ayurveda Consultant Physician</option>
                    <option value="Ayurvedic Dermatologist">Ayurvedic Dermatologist</option>
                    <option value="Ayurveda Kayachikithsa">Ayurveda Kayachikithsa</option>
                    <option value="Ayurveda Panchakarma">Ayurveda Panchakarma</option>
                    <option value="Ayurveda Shalya">Ayurveda Shalya</option>
                    <option value="Ayurveda Shalakya">Ayurveda Shalakya</option>
                    <option value="Ayurveda Specialist">Ayurveda Specialist</option>
                    <option value="Cardiac Surgeon">Cardiac Surgeon</option>
                    <option value="Cardiologist">Cardiologist</option>
                    <option value="Dentist">Dentist</option>
                    <option value="Dermatologist">Dermatologist</option>
                    <option value="Endocrinologist">Endocrinologist</option>
                    <option value="Gastroenterologist">Gastroenterologist</option>
                    <option value="General Practitioner">General Practitioner</option>
                    <option value="Geriatrician">Geriatrician</option>
                    <option value="Gynecologist">Gynecologist</option>
                    <option value="Hematologist">Hematologist</option>
                    <option value="Infectious Disease Specialist">Infectious Disease Specialist</option>
                    <option value="Internist">Internist</option>
                    <option value="Nephrologist">Nephrologist</option>
                    <option value="Neurologist">Neurologist</option>
                    <option value="Obstetrician">Obstetrician</option>
                    <option value="Oncologist">Oncologist</option>
                    <option value="Ophthalmologist">Ophthalmologist</option>
                    <option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
                    <option value="Otolaryngologist">Otolaryngologist</option>
                    <option value="Pathologist">Pathologist</option>
                    <option value="Pediatrician">Pediatrician</option>
                    <option value="Physiatrist">Physiatrist</option>
                    <option value="Plastic Surgeon">Plastic Surgeon</option>
                    <option value="Psychiatrist">Psychiatrist</option>
                    <option value="Pulmonologist">Pulmonologist</option>
                    <option value="Radiologist">Radiologist</option>
                    <option value="Rheumatologist">Rheumatologist</option>
                    <option value="Surgeon">Surgeon</option>
                    <option value="Urologist">Urologist</option>
                </select>
                <select name="city" id="city">
                    <option value="">City</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Malabe">Malabe</option>
                    <option value="Matara">Matara</option>
                    <option value="Nugegoda">Nugegoda</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                </select>
                <div class="main-search">
                    <input type="text" name="search" placeholder="Search doctor by name..">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="search-container-for-doctors" id="search-container-for-doctors">
        <form action="" class="main-form" method="POST">
            <div class="filter-by">
                <select name="doctorType" id="doctorType">
                    <option value="">Doctor type</option>
                    <option value="">MBBS</option>
                </select>
                <select name="specialization" id="specialization">
                    <option value="">Specialization</option>
                    <option value="">Cardiologist</option>
                </select>
                <select name="city" id="city">
                    <option value="">City</option>
                    <option value="">Colombo</option>
                    <option value="">Galle</option>
                    <option value="">Kandy</option>
                </select>
            </div>
            <div class="main-search">
                <div class="search-section">
                    <input type="text" name="search" placeholder="Search by Doctor name...">
                </div>
                <div class="button-section">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
    </div> -->

    <section class="doctor-cards-container theme">
        <div class="doctor-cards-topic">
            <span class="line"></span>
            <h2>Available Doctors</h2>
        </div>
        <div class="card-content-fordoctors" id="to-be-show-more">
            <div class="card-page">
            <?php foreach($data['doctors'] as $doctor): ?>
                <div class="card theme theme">
                    <div class="left theme">
                        <p><?php  echo $doctor->type ?></p>
                        <h2>Dr. <?php  echo $doctor->first_name ?> <?php  echo $doctor->last_name ?></h2>
                        <a href="<?php echo URLROOT ?>/Patient/viewDoctorProfile/<?php echo $doctor->doctor_id ?>">View profile <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="right">
                        <p>City : <?php  echo $doctor->city ?></p>
                        <h2><?php  echo $doctor->specialization ?></h2>
                        <form action="<?php echo URLROOT ?>/Patient/getDoctorId" method="POST">
                            <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $doctor->doctor_id ?>">
                            <button class="channel-butten">Channel</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <button id="show-button" class="show-button" onclick="showMore()"><span id="show-text">Show More</span><i class="fa-solid fa-angle-down" id="icon-more-orless"></i></button>
    </section>

    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>