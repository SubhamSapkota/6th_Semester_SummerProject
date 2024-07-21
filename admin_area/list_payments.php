<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5 text-light text-center">
    <thead class="bg-dark">
    
    <!-- php code for displaying all orders -->
    <?php
    $get_payments="Select * from `user_payment`";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    
     if($row_count==0){
        echo "<h2 class='text-center mt-5'>NO PAYMENTS YET!</h2>";
     }else{
        echo"
    <tr>
            <th>SN</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary '>
    ";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
        $payment_id=$row_data['payment_id'];
        $order_id=$row_data['order_id'];
        $invoice_number=$row_data['invoice_number'];
        $amount=$row_data['amount'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;

        echo " <tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$date</td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
        }
     }
    ?>
        
       
    </tbody>
</table>