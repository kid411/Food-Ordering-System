<?php
include_once("header.php");
?>

<?php


$pid="";
$iid="";
$qty="";


if(isset($_POST["btnsubmit"]))
{
$pid=$_POST["cmbpname"];
$iid=$_POST["cmbitem"];
$qty=$_POST["qty"];

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into productitem (pid, iid, qty) values ('$pid','$iid','$qty')";
echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='productitemdisplay.php';</script>";
}

?>

<h2 class="header smaller lighter blue">Product Item</h2>

<form method="post">
<div class="form-group">

    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product  </label>

    <div class="col-sm-3">
    <?php
    
        $conn= mysqli_connect("localhost","root","","project");
        $qy="Select * from product";
        $result=$conn->query($qy);
        $str="";   
        while($row=$result->fetch_assoc())
        {
            $pid=$row["pid"];
            $pname=$row["pname"];
            
            $str.= "<option value='$pid'>$pname</option>";
        }
            
        ?>
    <select name="cmbpname">
        <?php
            echo $str;
        ?>  
    </select>
    </div>
<br>
<br>
<br>
<div class="form-group">

    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Item  </label>

    <div class="col-sm-3">
    <?php
    
        $qy="Select * from item";
        $result=$conn->query($qy);
        $str="";   
        while($row=$result->fetch_assoc())
        {
            $iid=$row["iid"];
            $iname=$row["iname"];
            
            $str.= "<option value='$iid'>$iname</option>";
        }
            
        ?>
    <select name="cmbitem">
        <?php
            echo $str;
        ?>  
    </select>
    </div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quantity </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="qty" class="col-xs-5 col-sm-5" required>
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