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
    <script defer src="<?php echo URLROOT; ?>/js/pushNotification.js"></script>
    <title>BeCare</title>
</head>
<body>
    <?php require APPROOT.'/views/inc/components/header1.php'; ?>

    <section class="table-section-Nutritionistreq theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1><center>Details of Requested Orders</center>
                </h1>
            </div>
            <div class="table">
                
                <table cellspacing="0" cellpadding="0">
                    <tr> 
                        <th>Name of patient</th> 
                        <th>Order Date and Time</th>
                        <th></th>
                        
                        
                    </tr>
                    <?php foreach($data['orders'] as $orders): ?>
                        
                    <tr>
                        <td><?php echo $orders->name?></td>
                        <td><?php echo $orders->ordered_date_and_time?></td>

                        <td>

                          <form action="<?php echo URLROOT; ?>/Pharmacist/pharmacistViewOrdersMore/" method="post">
                               <input type="hidden" name="order_request_id" value="<?php echo $orders->order_request_id; ?>">
                              <button class="view" name="submit">View</button>
                          </form>
                         
                        <button class="delete"><i class="fa-solid fa-download"></i><a download="<?php echo $orders->prescription ?>"  href="<?php echo URLROOT?>/img/prescriptions/<?php echo $orders->prescription ?>">Download</a></button>

                          <form action="<?php echo URLROOT;?>/Pharmacist/acceptOrders/" method="post">
                                <input type="hidden" name="order_request_id" value="<?php echo $orders->order_request_id; ?>">
                            <!--    <button class="accept " name="submit">Accept</button> -->
                                <button class="accept " name="submit" >Accept</button>
                          </form>

                         
                          <!--reject button-->  
                          <form id="order-form" action="<?php echo URLROOT;?>/Pharmacist/rejectOrders/" method="post">   
                                <button type="submit" class="reject " name="submit" onclick="openPopup()">Reject</button>
                                <input type="hidden" name="order_request_id" value="<?php echo $orders->order_request_id; ?>">
                                <div class="popup" id="popup">
                                <input type="hidden" name="order_request_id" value="<?php echo $orders->order_request_id; ?>">
                                    <h2></h2>
                                    <p>Are you sure you want to reject this order request.</p>
                                    <button type="submit" class="button" onclick="closePopup()">Cancel</button>

                                    
                                
                                     
                                        <button type="submit" class="button" onclick="rejectOrder()" >Yes.Reject it!</button>

                                    <!--    <button type="submit" class="button" onclick="closePopup()" >Yes.Reject it!</button> -->
                                    </form> 


                                </div>

                                <script>
                                    let popup = document.getElementById("popup");

                                    function openPopup(){
                                        popup.classList.add("open-popup");
                                    }

                                    function closePopup(){
                                        popup.classList.remove("open-popup")
                                    }

                                    function rejectOrder() {
                                                 // Submit the form data
                                                popup.classList.remove("open-popup")
                                            //    document.getElementById("order-form").submit();

                                                // Redirect to a new page
                                                window.location.href = "<?php echo URLROOT;?>/Pharmacist/rejectOrders/";
                                        }


                                </script>

</form> 
                          
                          
                        
                        </td>
                        
                    </tr>
                  
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </section>


    <section class="table-section-Nutritionistreq theme">
        <div class="table-container theme">
            <div class="table-topic-main">
                <h1><center>Details of Paid Orders</center>
                </h1>
            </div>
            <div class="table">
                
                <table cellspacing="0" cellpadding="0">
                    <tr> 
                        <th>Name of patient</th> 
                        <th>contact Number</th>
                        
                        <th></th>
                        
                        
                    </tr>
                    <?php foreach($data['paidOrders'] as $paidOrders): ?>

                    <tr>
                        <td><?php echo $paidOrders->name?></td>
                        <td><?php echo $paidOrders->contact_number?></td>
                       
                        <td>                           
                          <form action="<?php echo URLROOT; ?>/Pharmacist/pharmacistViewOrdersMore/" method="post">
                          <input type="hidden" name="order_request_id" value="<?php echo $paidOrders->order_request_id; ?>">
                              <button class="view" name="submit">View</button>
                          </form>   

                          <form  action="<?php echo URLROOT;?>/Pharmacist/sendOrder/" method="post">
                                <input type="hidden" name="order_request_id" value="<?php echo $paidOrders->order_request_id; ?>">
                                <button class="accept " name="submit">Send</button>
                          </form>
                        
                        </td>
                        
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </section>
       
    <?php require APPROOT.'/views/inc/components/footer1.php'; ?>
</body>
</html>