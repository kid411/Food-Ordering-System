<?php
include_once("header.php");
?>

<?php 

$ofid = $_GET["ofid"];
$ofname="";
$ofimage="";
$isdisplay="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$ofname=$_POST["ofname"];
$ofimage=$_POST["ofimage"];
$isdisplay=$_POST["isdisplay"];

$qry="update offer set ofname='$ofname',ofimage='$ofimage',isdisplay='$isdisplay' where ofid='$ofid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='offerdisplay.php';</script>";
}

$qry="select * from offer where ofid='$ofid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$ofname=$row["ofname"];
$ofimage=$row["ofimage"];
$isdisplay=$row["isdisplay"];

?>


<h2 class="header smaller lighter blue">Update Here</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Offer Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="ofname" value="<?php echo $ofname; ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Offer Image </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="ofimage" value="<?php echo $ofimage; ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Visibility </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="isdisplay" value="<?php echo $isdisplay; ?>" class="col-xs-5 col-sm-5">
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