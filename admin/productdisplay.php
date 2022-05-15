<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Product</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from product";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Category ID</th><th>Product Name</th></th><th>Product Price</th><th>Product Image</th><th>Product Description</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $pid=$row["pid"];
    $pname=$row["pname"];
    $pprice=$row["pprice"];
    $p1=$row["pimage"];
    $pimage="<img src='../images/$p1' height='100px' width='100px'>";
    $catid=$row["catid"];
    $pdesc=$row["pdesc"];
    $edit="<a href='productupdate.php?pid=$pid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='productdelete.php?pid=$pid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$catid</td><td>$pname</td><td>$pprice</td><td>$pimage</td><td>$pdesc</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>