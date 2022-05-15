<?php
include_once("header.php");
?>

<h2 class="header smaller lighter blue">Orders</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from orders";

$result=$conn->query($qry);
$str="<table  class='table table-striped' style='font-size:16px;'><tr><th>Order ID</th><th>User ID</th><th>Date of Order</th><th>View Order</th></tr>";
while($row=$result->fetch_assoc())
{
    $oid=$row["oid"];
    $uid=$row["uid"];
    $doo=$row["doo"];
    $view="<a href='orderdetail.php?oid=$oid&uid=$uid'>View";

    $str.="<tr><td>$oid</td><td>$uid</td><td>$doo</td><td>$view</td></tr>";
}

$str.="</table>";
echo $str;

?>

<?php
include_once("footer.php");
?>