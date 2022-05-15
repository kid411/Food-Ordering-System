<?php
include_once("header.php");
?>
<?php

$uid=$_GET["id"];
$uimage=$_SESSION["uimage"];
$username="";
$fname="";
$lname="";
$contact="";
$mail="";
$address="";

$conn=mysqli_connect("localhost","root","","project");

if(isset($_POST["btnsubmit"]))
{
    $username=$_POST["username"];
    $uimage=$_POST["uimage"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $pass=$_POST["pass"];
    $contact=$_POST["contact"];
    $mail=$_POST["mail"];
    $address=$_POST["address"];

$qry="update user set username='$username',fname='$fname',lname='$lname',contact='$contact',mail='$mail',address='$address' where uid='$uid'";
//echo $qry;
$result=$conn->query($qry);
echo "<script>location.href='index.php';</script>";
}

$qry="select * from user where uid='$uid'";
$result=$conn->query($qry);
while($row=$result->fetch_assoc())
{
$fname=$row["fname"];
$lname=$row["lname"];
$address=$row["address"];
$mail=$row["mail"];
$contact=$row["contact"];
$username=$row["username"];
$u1=$row["uimage"];
$uimage="<img src='../images/$u1' height='150px' width='150px'>";
}

?>

<div class="page-content">
<div class="ace-settings-container" id="ace-settings-container">
<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
    <i class="ace-icon fa fa-cog bigger-130"></i>
</div>

<div class="ace-settings-box clearfix" id="ace-settings-box">
    <div class="pull-left width-50">
        <div class="ace-settings-item">
            <div class="pull-left">
                <select id="skin-colorpicker" class="hide">
                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                </select><div class="dropdown dropdown-colorpicker">		<a data-toggle="dropdown" class="dropdown-toggle"><span class="btn-colorpicker" style="background-color:#438EB9"></span></a><ul class="dropdown-menu dropdown-caret"><li><a class="colorpick-btn selected" style="background-color:#438EB9;" data-color="#438EB9"></a></li><li><a class="colorpick-btn" style="background-color:#222A2D;" data-color="#222A2D"></a></li><li><a class="colorpick-btn" style="background-color:#C6487E;" data-color="#C6487E"></a></li><li><a class="colorpick-btn" style="background-color:#D0D0D0;" data-color="#D0D0D0"></a></li></ul></div>
            </div>
            <span>&nbsp; Choose Skin</span>
        </div>

        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off">
            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
        </div>

        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off">
            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
        </div>

        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off">
            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
        </div>

        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off">
            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
        </div>

        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off">
            <label class="lbl" for="ace-settings-add-container">
                Inside
                <b>.container</b>
            </label>
        </div>
    </div><!-- /.pull-left -->

    <div class="pull-left width-50">
        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off">
            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
        </div>

        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off">
            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
        </div>

        <div class="ace-settings-item">
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off">
            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
        </div>
    </div><!-- /.pull-left -->
</div><!-- /.ace-settings-box -->
</div><!-- /.ace-settings-container -->

<div class="page-header">
<h1>
   Edit Profile
</h1>
</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">User Image</label>
            <div class="col-sm-9">
            <?php echo $uimage ;?>
        </div>
</div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">User Name</label>

            <div class="col-sm-9">
                <input type="text" readonly value="<?php echo $username ;?>" id="form-field-1" placeholder="Username" name="username" class="col-xs-10 col-sm-5">
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">First Name</label>

        <div class="col-sm-9">
            <input type="text" id="form-field-2" name="fname" value="<?php echo $fname; ?>" placeholder="First Name" class="col-xs-10 col-sm-5">
        </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Last Name </label>

            <div class="col-sm-9">
                <input type="text" id="form-field-2" name="lname" value="<?php echo $lname; ?>" placeholder="Last name" class="col-xs-10 col-sm-5">
            </div>
        </div>
            <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Contact Number </label>

            <div class="col-sm-9">
                <input type="text" id="form-field-2" name="contact" value="<?php echo $contact; ?>" placeholder="Contact" class="col-xs-10 col-sm-5">
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Mail</label>

            <div class="col-sm-9">
                <input type="text" id="form-field-2" name="mail" value="<?php echo $mail; ?>" placeholder="E-Mail" class="col-xs-10 col-sm-5">
            </div>
    </div>
   
    <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Address</label>

            <div class="col-sm-9">
                <input type="text" id="form-field-2" name="address" placeholder="Address" value="<?php echo $address; ?>" cols="30" rows="5" class="col-xs-10 col-sm-5">
            </div>
        </div>
<br>
        
        <div class="space-4"></div>
        <div class="space-4"></div>

        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                <input type="submit" class="btn btn-info" name="btnsubmit" value="Submit">

                &nbsp; &nbsp; &nbsp;
                
            </div>
        </div>

        
</div><!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</form>
</div><!-- /.row -->
</div>

<?php
include_once("footer.php");
?>
