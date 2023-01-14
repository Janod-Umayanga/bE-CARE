<html>
<body>
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1221976">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="<?php echo URLROOT ?>/Pages/index">
    <input type="hidden" name="cancel_url" value="<?php echo URLROOT ?>/Patient/findNutritionist">
    <input type="hidden" name="notify_url" value="<?php echo URLROOT ?>/Payment/verify">  
    </br></br>Item Details</br>
    <input type="text" name="order_id" value="1">
    <input type="text" name="items" value="Diet Plan">
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="200">
    </br></br>Customer Details</br>
    <input type="text" name="first_name" value="Janod">
    <input type="text" name="last_name" value="Umayanga">
    <input type="text" name="email" value="2020cs189@stu.ucsc.cmb.ac.lk">
    <input type="text" name="phone" value="0710560492">
    <input type="text" name="address" value="No.1, Galle Road">
    <input type="text" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka">
    <input type="hidden" name="hash" value="<?php echo $data['hash'] ?>">    <!-- Replace calculated hash -->
    <input type="submit" value="Buy Now">   
</form>
</body>
</html>