<?php
include('../includes/connect.php');
include('../admin_area/Functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<style>
    .payment-img {
        width: 30%;
        margin: auto;
        display: block;
    }
</style>

<body>
    <!-- Php code to access user id -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    // $get_amount = "Select * from `user_orders` where user_id='$user_id'";
    // $result = mysqli_query($con, $get_amount);
    // $run_querys = mysqli_fetch_array($result);
    // $amount_due = $run_querys['amount_due'];




    ?>
    <div class="container">
        <h2 class="text-center text-black">Payment Options</h2>
        <div class="d-flex justify-content-center align-items-center row mt-4">
            <div class="col-md-6">
                <form action="https://uat.esewa.com.np/epay/main" method="POST">
                    <input value="<?php echo $amount_due; ?>" name="tAmt" type="hidden">
                    <input value="<?php echo $amount_due; ?>" name="amt" type="hidden">
                    <input value="0" name="txAmt" type="hidden">
                    <input value="0" name="psc" type="hidden">
                    <input value="0" name="pdc" type="hidden">
                    <input value="EPAYTEST" name="scd" type="hidden">
                    <input value="<?php echo $user_id; ?>" name="pid" type="hidden">
                    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
                    <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                    <a href="order.php?user_id=<?php echo $user_id; ?>" target="_blank"> <input type="image" img src="../Images/esewa.png" alt="" class="payment-img"></a>
                </form>
                <!-- <a href="order.php?user_id=<?php echo $user_id; ?>" target="_blank"><img src="../Images/esewa.png" alt="" class="payment-img"></a> -->
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id; ?>" target="_blank">
                    <h2 class="text-center ">Pay Offline</h2>
                </a>
            </div>
        </div>
    </div>
</body>

</html>