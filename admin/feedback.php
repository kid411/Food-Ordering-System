<?php
include_once("header.php");
?>

<h2 class="header smaller lighter blue">Feedback</h2>

<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from feedback";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Name</th><th>Date of Feedback</th><th>Mail</th><th>Message</th></tr>";
while($row=$result->fetch_assoc())
{
    $fid=$row["fid"];
    $uid=$row["uid"];
    $fname=$row["fname"];
    $dof=$row["dof"];
    $mail=$row["mail"];
    $msg=$row["msg"];
    $str.="<tr><td>$fname</td><td>$dof</td><td>$mail</td><td>$msg</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>