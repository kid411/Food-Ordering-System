<?php
include_once("header.php");
?>

<?php 

$pid = $_GET["pid"];
$pname="";
$pprice="";
$catid="";

$pdesc="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$pname=$_POST["pname"];
$pprice=$_POST["pprice"];
$catid=$_POST["cmbcat"];

$pdesc=$_POST["pdesc"];

$qry="update product set pname='$pname',pprice='$pprice',catid='$catid',pdesc='$pdesc' where pid='$pid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='productdisplay.php';</script>";
}

$qry="select * from product where pid='$pid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$pname=$row["pname"];
$pprice=$row["pprice"];
$p1=$row["pimage"];
$pimage="<img src='../images/$p1' height='150px' width='150px'>";
$catid=$row["catid"];
$pdesc=$row["pdesc"];

?>

<h2 class="header smaller lighter blue">Product</h2>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pname" value="<?php echo $pname; ?>" class="col-xs-5 col-sm-5">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Price </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pprice" value="<?php echo $pprice; ?>" class="col-xs-5 col-sm-5">
</div>

    <br>
    <br>
    <br>
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

    <div class="col-sm-3">
    
    <?php

        $conn=mysqli_connect("localhost","root","","project");
        
        $qy="Select * from category";
        $result=$conn->query($qy);
        $str="";   
        while($row=$result->fetch_assoc())
        {
            $catid=$row["catid"];
            $catname=$row["catname"];
            
            $str.= "<option value='$catid'>$catname</option>";
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
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Description </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="pdesc" value="<?php echo $pdesc; ?>" class="col-xs-12 col-sm-12">
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Image </label>

    <div class="col-sm-3">
    <?php echo $pimage; ?>
</div>
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