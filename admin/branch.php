<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Branch Details</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from branch";

$result=$conn->query($qry);
$str="<table class='table table-stripped' style='font: size 16px;'><tr><th>Branch Id</th><th>Branch Address</th><th>Branch Image</th><th>Branch Contact</th></tr>";
while($row=$result->fetch_assoc())
{
    $bid=$row["bid"];
    $bad=$row["bad"];
    $contactno=$row["contactno"];
    $b1=$row["bimage"];
    $bimage="<img width='150' height='150' src='../images/$b1' height='150px' width='150px'>";

    $str.="<tr><td>$bid</td><td>$bad</td><td>$bimage</td><td>$contactno</td></tr>";
}

$str.="</table>";
echo $str;

?>

<?php
include_once("footer.php");
?>