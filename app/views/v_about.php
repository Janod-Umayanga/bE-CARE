<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>

    <!-- <?php require APPROOT.'/views/inc/components/header.php'; ?> -->

    <h1>Users</h1>

    <?php foreach($data['users'] as $user): ?>
        <p><?php echo $user->first_name; ?> - <?php echo $user->last_name; ?></p>
    <?php endforeach; ?>
    <!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->

</body>
</html>