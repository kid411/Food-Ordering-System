<?php
include_once("header.php");
?>

<?php 

$areaid = $_GET["id"];
$areaname="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$areaname=$_POST["areaname"];
$qry="update area set areaname='$areaname' where areaid='$areaid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='areadisplay.php';</script>";
}

$qry="select * from area where areaid='$areaid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$areaname=$row["areaname"];

?>

<h2 class="header smaller lighter blue">Update Your Here</h2>
<form method="post">
   
    <div class="form-group">
        <br>
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Area name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="areaname" value="<?php echo $areaname;?>" class="col-xs-5 col-sm-5">
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