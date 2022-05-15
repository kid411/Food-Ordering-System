<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Member Details</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from user";


$result=$conn->query($qry);
$str="<table  class='table table-striped' style='font-size:16px;'><tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Member Image</th><th>Contact Number</th><th>Address</th></tr>";
while($row=$result->fetch_assoc())
{
    $uid=$row["uid"];
    $fname=$row["fname"];
    $lname=$row["lname"];
    $u1=$row["uimage"];
    $uimage="<img width='150' height='150' src='../images/$u1'>";
    $contact=$row["contact"];
    $address=$row["address"];
    $bid=$row["bid"];
    
    $str.="<tr><td>$uid</td><td>$fname</td><td>$lname</td><td>$uimage</td><td>$contact</td><td>$address</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>