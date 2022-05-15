<?php
include_once("header.php");
?>

<?php


$catimage="";
$catname="";

if(isset($_POST["btnsubmit"]))
{

    $catimage=$_FILES['catimage']['name'];
    $target_path = "../images/";  
    $target_path = $target_path.basename( $_FILES['catimage']['name']);   
    move_uploaded_file($_FILES['catimage']['tmp_name'], $target_path);  

$catname=$_POST["catname"];
//$catimage=$_POST["catimage"];

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into category (catname,catimage) values ('$catname','$catimage')";

$result=$conn->query($qry);
echo "<script>location.href='categorydisplay.php';</script>";
}

?>
<script type="text/javascript">
    function validateFileType(){
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }  
    }
    function allow_alphabets(element){
        let textInput = element.value;
        textInput = textInput.replace(/[^A-Za-z ]*$/gm, "");
        element.value = textInput;
    }
</script>


<h2 class="header smaller lighter blue">Category</h2>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Name </label>

    <div class="col-sm-3">
        <input type="text" id="form-field-1" name="catname"oninput= "allow_alphabets(this)" class="col-xs-5 col-sm-5" required>
</div>
<br>
<br>
<br>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Image </label>

    <div class="col-sm-3">
        <input type="file" id="file" name="catimage"accept=".png, .jpg, .jpeg" onchange="validateFileType()" class="col-xs-5 col-sm-5" required>
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