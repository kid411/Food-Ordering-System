<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Roll</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from roll";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Roll Name</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $rollid=$row["rollid"];
    $rollname=$row["rollname"];
    $edit="<a href='rollupdate.php?rollid=$rollid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='rolldelete.php?rollid=$rollid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$rollname</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>