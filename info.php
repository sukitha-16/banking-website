<?php
function customerdetails(){
    $temp=$_GET['te'];
    echo "<body style='background-image: linear-gradient(to bottom right, #ff0000, #d10015, #a3031a,#750b19,#490e14,#360d11,#24090b,#0f0001,#0c0001,#080001,#040001,#000000)'>";
$con=new mysqli("fdb34.awardspace.net","3890197_bank","Awardspace@123","3890197_bank") or die("Connection Failed: %s\n".$con->error);
    $rs=mysqli_query($con,"select * from customerTable where name='$temp'");
    echo "Customer Details:<br>";
    $coun=0;
    while($r=mysqli_fetch_array($rs)){
        if($temp==$r['name']) $coun++;
        echo "Name:&nbsp".$r['name']."<br>Email ID:&nbsp".$r['email']."<br>Current Balance:&nbsp".$r['currentBalance']."$";
    }
    if($coun==0) {
        echo "User not Found";
    }
    echo "<br> <a href='customers.php'>Move Back</a>";
    mysqli_close($con);
}
customerdetails();
?>