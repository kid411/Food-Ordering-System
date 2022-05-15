<?php
include_once("header.php")
?>

<?php
$conn=mysqli_connect("localhost","root","","project");



$qry="select * FROM product group by pname order by max(likecount) desc limit 5";

$result=$conn->query($qry);
$str="<table  class='table table-striped'><tr><th>Rated Product</th><th>Product Price</th><th>Product Image</th><tr>";
while($row=$result->fetch_assoc())
{
    $pid=$row["pid"];
    $pname=$row["pname"];
    $p=$row["pimage"];
    $pimage="<img src='../images/$p' height='100px' width='100px'>";
    $pprice=$row["pprice"];

    $str.="<tr><td>$pname</td><td>$pprice</td><td>$pimage</td></tr>";
}

$str.="</table>";
echo $str;

?>

<?php
include_once("footer.php");
?>