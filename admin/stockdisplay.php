<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Stock</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from stock, item, branch where stock.iid=item.iid and stock.bid=branch.bid";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Branch </th><th>Item Name</th><th>Reorder</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $stid=$row["stid"];
    $iname=$row["iname"];
    $bad=$row["bad"];
    $reorder=$row["reorder"];
    $edit="<a href='stockupdate.php?stid=$stid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='stockdelete.php?stid=$stid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$bad</td><td>$iname</td><td>$reorder</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>