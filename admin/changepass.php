<?php 
include_once("header.php")
?>

<?php

$uid=$_SESSION["uid"];
$pass="";

$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
    $pass=$_POST["pass"];

$qry="update user set pass='$pass' where uid='$uid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='profile.php';</script>";
}

$qry="select * from user where uid='$uid'";
$result=$conn->query($qry);
while($row=$result->fetch_assoc())
{
$fname=$row["fname"];
}

?>

<h2 class="header smaller lighter blue">Enter Your New Password</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Change Pass </label>

    <div class="col-sm-3">
        <input type="password" id="form-field-1" name="pass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}"cols="30" rows="5" class="col-xs-10 col-sm-5" required="" title="Must contain at least one number,one uppercase,one lowercase,one special Character, and at least 8 or more characters"required>
</div>
<br>
<br>
<br>
            <div class="col-md-offset-3 col-md-9">
                <input type="submit" class="btn btn-info" name="btnsubmit" value="Submit" required>

                &nbsp; &nbsp; &nbsp;
                
            </div>
    </form>

<?php 
include_once("footer.php")
?>