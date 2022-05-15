<?php
include_once("header.php");
?>

<?php


$rollname="";

if(isset($_POST["btnsubmit"]))
{
$rollname=$_POST["rollname"];

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into roll (rollname) values ('$rollname')";

$result=$conn->query($qry);
echo "<script>location.href='rolldisplay.php';</script>";
}

?>
<script type="text/javascript">
    function allow_alphabets(element){
        let textInput = element.value;
        textInput = textInput.replace(/[^A-Za-z ]*$/gm, "");
        element.value = textInput;
    }
</script>

<h2 class="header smaller lighter blue">Insert Your Roll</h2>

<form method="post">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Roll Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="rollname"oninput= "allow_alphabets(this)" class="col-xs-5 col-sm-5" required>
    </div>

    <br>
    <br>
    <br>
    <div class="col-md-offset-3 col-md-9">
        <input class="btn btn-info" name="btnsubmit" type="submit" Value="Submit"required>
    </div>
</div>
</form>


<?php
include_once("footer.php");
?>