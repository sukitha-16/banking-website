<?php
$con=new mysqli("fdb34.awardspace.net","3890197_bank","Awardspace@123","3890197_bank") or die("Connection Failed: %s\n".$con->error);
$res=mysqli_query($con,"select * from customerTable");
$c1=$_GET['sender'];
$c2=$_GET['val'];
$c3=$_GET['receiver'];
echo "<body style='background-image: linear-gradient(to bottom right, #ff0000, #d10015, #a3031a,#750b19,#490e14,#360d11,#24090b,#0f0001,#0c0001,#080001,#040001,#000000)'>";
echo "<a href='index.html'>Move to Website</a>";
function show($res){
    echo "<table align=center border=15 width=70% height=70% style='background-color:rgba(17, 7, 7, 0.959);color:#fff; opacity:0.9; font-size:25 '>";
    echo "<h1 align=center opacity=0.5><u><i>Transfer Table</i><u></h1>";
    echo "<tr><th>Name</th><th>Email ID</th><th>Current Balance</th>";
    while($row=mysqli_fetch_array($res)){
        if($row['currentBalance']>=0)
        echo "<tr align=center><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['currentBalance']."$</td></tr>";
    } 
    echo "</table>";
}

$sql1="update customerTable set currentBalance=currentBalance-$c2 where name='$c1'";
$sql2="update customerTable set currentBalance=currentBalance+$c2 where name='$c3'";
$con->query($sql1);
$con->query($sql2);
$res=mysqli_query($con,"select * from customerTable");
show($res);

mysqli_close($con);


?>