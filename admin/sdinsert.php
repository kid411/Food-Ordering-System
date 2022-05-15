<?php
include_once("header.php");
?>

<?php

$stid="";
$bid="";
$reorder="";
$stocksent= date("Y-m-d");

if(isset($_POST["btnsubmit"]))
{
$stid=$_POST["cmbname"]; 
$bid=$_POST["cmbbname"];
$reorder=$_POST["reorder"];

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into stockdetail (stid,bid,inward,stocksent) values ('$stid','$bid','$reorder','$stocksent')";

$result=$conn->query($qry);
echo "<script>location.href='sddisplay.php';</script>";
}

?>

<h2 class="header smaller lighter blue">Stock Details</h2>

<form method="post">

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stock </label>

<div class="col-sm-3">
<?php

    $conn= mysqli_connect("localhost","root","","project");
    $qy="Select iname,stid  from stock, item where stock.iid=item.iid and bid=";
    $result=$conn->query($qy);
    $str="";   
    while($row=$result->fetch_assoc())
    {
        $stid=$row["stid"];
        $iname=$row["iname"];
        
        $str.= "<option value='$stid'>$iname</option>";
    }
        
    ?>
<select name="cmbname">
    <?php
       echo $str;
    ?>  
</select>
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Branch </label>

<div class="col-sm-3">
<?php

    $conn= mysqli_connect("localhost","root","","project");
    $qy="Select * from branch, area where area.areaid=branch.areaid";
    $result=$conn->query($qy);
    $str="";   
    while($row=$result->fetch_assoc())
    {
        $areaid=$row["areaid"];
        $areaname=$row["areaname"];
        
        $str.= "<option value='$areaid'>$areaname</option>";
    }
        
    ?>
<select name="cmbbname">
    <?php
       echo $str;
    ?>  
</select>
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quantity Delivered </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="reorder" class="col-xs-5 col-sm-5"required>
</div>
<br>
<br>
<br>
    <div class="col-md-offset-3 col-md-9">
        <input class="btn btn-info" name="btnsubmit" type="submit" Value="Submit" required>
    </div>
</div>
</form>


<?php
include_once("footer.php"); 
?>