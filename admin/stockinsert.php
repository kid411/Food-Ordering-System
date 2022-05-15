<?php
include_once("header.php");
?>

<?php


$iid="";
$bid="";
$reorder="";

if(isset($_POST["btnsubmit"]))
{
$iid=$_POST["iid"];
$bid=$_POST["bid"];
$reorder=$_POST["reorder"];

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into stock (iid,bid,reorder) values ('$iid','$bid','$reorder')";

$result=$conn->query($qry);
echo "<script>location.href='stockdisplay.php';</script>";
}

?>

<h2 class="header smaller lighter blue">Stock</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch ID </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="bid" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Item ID </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="iid" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Reorder </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="reorder" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="col-md-offset-3 col-md-9">
        <input class="btn btn-info" name="btnsubmit" type="submit" Value="Submit">
    </div>
</div>
</form>


<?php
include_once("footer.php"); 
?>