<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Stock</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$bid=$_GET["id"];

$qry="select * from stockdetail,stock where stock.stid=stockdetail.stid";

$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Inward<th>Date of Stock Sent</th><th>Quantity Over</th><th>Date of Stock End</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    //$stid=$row["stid"];
    $bid=$row["bid"];
    $reorder=$row["reorder"];
    $inward=$row["inward"];
    $stocksent=$row["stocksent"];
    $outward=$row["outward"];
    $doe=$row["doe"];
    $edit="<a href='sdupdate.php'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='sddelete.php'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$inward</td><td>$reorder</td><td>$stocksent</td><td>$outward</td><td>$doe</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>