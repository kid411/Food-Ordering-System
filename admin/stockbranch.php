<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Category</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from branch";


$result=$conn->query($qry);
$str="<table>";
$str="<ul class='ace-thumbnails clearfix'>";
    
while($row=$result->fetch_assoc())
{
    $bid=$row["bid"];
    $bad=$row["bad"];
    $b1=$row["bimage"];
    $bimage="<img width='150' height='150' src='../images/$b1' height='100px' width='100px'>";

    $str.="<li>
            <a href='sddisplay.php?id=$bid' data-rel='colorbox' class='cboxElement'>$bimage</a></li>";
}

$str.="</ul>";
echo $str;



?>

<?php
include_once("footer.php");
?>