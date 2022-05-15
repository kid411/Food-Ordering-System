<?php
include_once("header.php");
?>

<?php 

$stid = $_GET["stid"];
$bid=$_SESSION["bid"];
$iid="";
$reorder="";
$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
$iid=$_POST["cmbname"];
$reorder=$_POST["reorder"];
$qry="update stock set iid='$iid', bid='$bid', reorder='$reorder' where stid='$stid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='stockdisplay.php';</script>";
}

$qry="select * from stock where stid='$stid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$iid=$row["iid"];
$reorder=$row["reorder"];

?>


<h2 class="header smaller lighter blue">Update Here</h2>

<form method="post">

<div class="form-group">

    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Item  </label>

        <div class="col-sm-3">
        <?php

            $conn= mysqli_connect("localhost","root","","project");
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
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Reorder </label>

    <div class="col-sm-3"> 
        <input type="text" id="form-field-1" name="reorder" value="<?php echo $reorder; ?>" class="col-xs-5 col-sm-5">
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