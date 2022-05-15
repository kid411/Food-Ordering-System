<?php
include_once("header.php");
?>

<?php 

$rollid = $_GET["rollid"];
$rollname="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$rollname=$_POST["rollname"];
$qry="update roll set rollname='$rollname' where rollid='$rollid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='rolldisplay.php';</script>";
}

$qry="select * from roll where rollid='$rollid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$rollname=$row["rollname"];

?>

<h2 class="header smaller lighter blue">Update Here</h2>
<form method="post">
   
    <div class="form-group">
        <br>
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Roll name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="rollname" value="<?php echo $rollname;?>" class="col-xs-5 col-sm-5">
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