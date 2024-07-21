<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5 text-light text-center">
    <thead class="bg-dark">
    
    <!-- php code for displaying all orders -->
    <?php
    $get_user_table="Select * from `user_table`";
    $result=mysqli_query($con,$get_user_table);
    $row_count=mysqli_num_rows($result);
    
     if($row_count==0){
        echo "<h2 class='text-center mt-5'>NO USERS YET!</h2>";
     }else{
        echo"
    <tr>
            <th>SN</th>
            <th>Username</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary '>
    ";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $User_image=$row_data['user_image'];
        $User_address=$row_data['user_address'];
        $User_mobile=$row_data['user_mobile'];
        $number++;

        echo " <tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$User_image' alt='$username' class='user_image'/></td>
        <td>$User_address</td>
        <td>$User_mobile</td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
        }
     }
    ?>
        
       
    </tbody>
</table>