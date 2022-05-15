<?php
include_once("header.php");
?>

<?php

$iid = $_GET["iid"];
$iname="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$iname=$_POST["iname"];

$qry="delete from item where iname='$iname'";

$result=$conn->query($qry);

echo "<script>location.href='itemdisplay.php';</script>";
}

$qry="select * from item where iid='$iid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$iname=$row["iname"];

?>
<h2 class="header smaller lighter blue">Remove</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Item Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="iname" value="<?php echo $iname;?>" class="col-xs-5 col-sm-5">
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