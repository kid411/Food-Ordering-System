<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Product Item</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from productitem, product, item where productitem.pid=product.pid and productitem.iid=item.iid";
//echo $qry;

$result=$conn->query($qry);

$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Product Name</th><th>Item Name</th><th>Quantity</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $piid=$row["piid"];
    $pname=$row["pname"];
    $pid=$row["pid"];
    $iname=$row["iname"];
    $iid=$row["iid"];
    $qty=$row["qty"]; 
    $edit="<a href='productitemupdate.php?piid=$piid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='productitemdelete.php?piid=$piid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$pname</td><td>$iname</td><td>$qty</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>