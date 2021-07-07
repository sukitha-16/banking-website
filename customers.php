<?php
$con=new mysqli("fdb34.awardspace.net","3890197_bank","Awardspace@123","3890197_bank") or die("Connection Failed: %s\n".$con->error);
$res=mysqli_query($con,"select * from customerTable");
echo "<body style='background-image: linear-gradient(to bottom right, #ff0000, #d10015, #a3031a,#750b19,#490e14,#360d11,#24090b,#0f0001,#0c0001,#080001,#040001,#000000)'>";
echo "<form action='info.php'>";
echo "<fieldset   width=2ch><legend style='color:black'>Enter Individual customer details</legend>";
echo  "Enter customer name: <input type='text' name='te'>";
echo "<input type='submit' value='get Details'></fieldset></form>";
echo "<form action='transfer.php'><fieldset   width=2ch><legend style='color:black'>Enter Transaction details</legend>";
echo "<table><tr><td>Enter Sender name:</td><td><input type='text' name='sender'></td></tr>";
echo "<tr><td>Enter Transferable amount:</td><td><input type='number' name='val'></td></tr>";
echo "<tr><td>Enter Receiver name:</td><td><input type='text' name='receiver'></td></tr>";
echo "</table><input type='submit' value='View all Customers'></fieldset></form>";

function display($res){
    echo "<table align=center border=8 width=60% height=60% style='background-color:rgba(17, 7, 7, 0.959);color:#ddd; opacity:0.9; font-size:25 '>";
    echo "<h1 align=center opacity=0.5><u><i>Transfer Table</i><u></h1>";
    echo "<tr><th>Name</th><th>Email ID</th><th>Current Balance</th>";
    while($row=mysqli_fetch_array($res)){
        echo "<tr align=center><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['currentBalance']."$</td></tr>";
        
    } 
    echo "</table>";
}
display($res);

mysqli_close($con);
?>