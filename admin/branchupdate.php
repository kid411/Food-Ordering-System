<?php
include_once("header.php");
?>

<?php 

$bid = $_GET["bid"];
$bad="";
$contactno="";

$areaid="";

$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{

$bad=$_POST["bad"];
$contactno=$_POST["contactno"];

$areaid=$_POST["cmbcat"];

$qry="update branch set bad='$bad',contactno='$contactno',areaid='$areaid' where bid='$bid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='branchdisplay.php';</script>";
}

$qry="select * from branch where bid='$bid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$bad=$row["bad"];
$areaid=$row["areaid"];
$contactno=$row["contactno"];
$b1=$row["bimage"];
$bimage="<img width='150' height='150' src='../images/$b1' width='100px' height='100px'>";

$areaid=$row["areaid"];

?>

<h2 class="header smaller lighter blue">Branch</h2>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch Address </label>

    <div class="col-sm-9">
        <input type="text" id="form-field-1" name="bad" value="<?php echo $bad ?>" class="col-xs-5 col-sm-5">
</div>

<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact Number </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="contactno" value="<?php echo $contactno ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Area </label>

    <div class="col-sm-3">
    
    <?php

        $conn=mysqli_connect("localhost","root","","project");
        
        $qy="Select * from area";
        $result=$conn->query($qy);
        $str="";   
        while($row=$result->fetch_assoc())
        {
            $areaid=$row["areaid"];
            $areaname=$row["areaname"];
            
            $str.= "<option value='$areaid'>$areaname</option>";
        }
            
        ?>
    <select name="cmbcat">
        <?php
            echo $str;
        ?>  
    </select>
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch Image </label>
    <div class="col-sm-3">
    <?php echo $bimage ?>
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