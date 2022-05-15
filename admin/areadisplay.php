<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Area</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from area";


$result=$conn->query($qry);

$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Area Name</th><th>Edit</th><th>Delete</th></tr>";

while($row=$result->fetch_assoc())
{
    $areaid=$row["areaid"];
    $areaname=$row["areaname"];
    $edit="<a href='areaupdate.php?id=$areaid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='areadelete.php?id=$areaid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$areaname</td><td>$edit</td><td>$delete</td></tr>";
}



$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>