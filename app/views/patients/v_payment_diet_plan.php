<html>
<body>
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1221976">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="<?php echo URLROOT ?>/Pages/index">
    <input type="hidden" name="cancel_url" value="<?php echo URLROOT ?>/Patient/findNutritionist">
    <input type="hidden" name="notify_url" value="<?php echo URLROOT ?>/Payment/verify">  
    </br></br>Pay for your diet plan</br>
    <input type="text" name="order_id" value="<?php echo $data['order_id'] ?>">
    <input type="text" name="items" value="Diet Plan">
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="<?php echo $data['fee'] ?>">

    <input type="text" name="first_name" value="Saman">
    <input type="text" name="last_name" value="Perera">
    <input type="text" name="email" value="samanp@gmail.com">
    <input type="text" name="phone" value="0771234567">
    <input type="text" name="address" value="No.1, Galle Road">
    <input type="text" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka">

    <!-- <input type="hidden" name="name" value="<?php echo $data['name'] ?>">
    <input type="hidden" name="age" value="<?php echo $data['age'] ?>">
    <input type="hidden" name="gender" value="<?php echo $data['name'] ?>">
    <input type="hidden" name="cnumber" value="<?php echo $data['cnumber'] ?>">
    <input type="hidden" name="weight" value="<?php echo $data['weight'] ?>">
    <input type="hidden" name="height" value="<?php echo $data['height'] ?>">
    <input type="hidden" name="marital_status" value="<?php echo $data['marital_status'] ?>">
    <input type="hidden" name="medical_details" value="<?php echo $data['medical_details'] ?>">
    <input type="hidden" name="allergies" value="<?php echo $data['allergies'] ?>">
    <input type="hidden" name="sleeping_hours" value="<?php echo $data['sleeping_hours'] ?>">
    <input type="hidden" name="water_consumption_per_day" value="<?php echo $data['water_consumption_per_day'] ?>">
    <input type="hidden" name="goal" value="<?php echo $data['goal'] ?>">
    <input type="hidden" name="nutritionist_id" value="<?php echo $data['nutritionist_id'] ?>">
    <input type="hidden" name="fee" value="<?php echo $data['fee'] ?>"> -->

    <input type="hidden" name="hash" value="">    <!-- Replace calculated hash -->
    <button>Pay</button>
</form>
</body>
</html>