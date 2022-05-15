<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Items</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from item";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Item Name</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $iid=$row["iid"];
    $iname=$row["iname"];
    $edit="<a href='itemupdate.php?iid=$iid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='itemdelete.php?iid=$iid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$iname</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>