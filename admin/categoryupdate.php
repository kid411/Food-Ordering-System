<?php
include_once("header.php");
?>

<?php 

$catid = $_GET["catid"];
$catimage="";
$catname="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$catname=$_POST["catname"];
$catimage=$_POST["catimage"];

$qry="update category set catname='$catname' where catid='$catid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='categorydisplay.php';</script>";
}

$qry="select * from category where catid='$catid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$catname=$row["catname"];
$c1=$row["catimage"];
$catimage="<img src='../images/$c1' height='150px' width='150px'>"

?>


<h2 class="header smaller lighter blue">Category Update</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="catname" value="<?php echo $catname; ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Image </label>

    <div class="col-sm-3">
        <?php echo $catimage; ?>
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