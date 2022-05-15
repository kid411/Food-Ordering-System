<?php
include_once("header.php");
?>
<h2 class="header smaller lighter blue">Category</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select * from category";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Category Name</th><th>Category Image</th><th>Edit</th><th>Delete</th></tr>";
while($row=$result->fetch_assoc())
{
    $catid=$row["catid"];
    $catname=$row["catname"];
    $c1=$row["catimage"];
    $catimage="<img width='150' height='150' src='../images/$c1' height='100px' width='100px'>";
    $edit="<a href='categoryupdate.php?catid=$catid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='categorydelete.php?catid=$catid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$catname</td><td>$catimage</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>