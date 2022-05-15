<?php
include_once("header.php");
?>

<h2 class="header smaller lighter blue">Branch</h2>
<?php

$conn=mysqli_connect("localhost","root","","project");

$qry="Select bid,bad,contactno,bimage from branch";


$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th style='font-size:24px;'>Branch Address</th><th>Contact No</th><th>Area Name</th><th>Branch Image</th><th>Edit</th></tr>";
while($row=$result->fetch_assoc())
{
    $bid=$row["bid"];
    $bad=$row["bad"];
    $contactno=$row["contactno"];
    $b1=$row["bimage"];
    $bimage="<img width='150' height='150' src='../images/$b1' height='100px' width='100px'>";
    $edit="<a href='branchupdate.php?bid=$bid'><button class='btn btn-xs btn-info'>
    <i class='ace-icon fa fa-pencil bigger-120'></i></button></a>";
    $delete="<a href='branchdelete.php?bid=$bid'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a>";
    
    $str.="<tr><td>$bad</td><td>$contactno</td><td>$bimage</td><td>$edit</td><td>$delete</td></tr>";
}

$str.="</table>";
echo $str;


?>

<?php
include_once("footer.php");
?>