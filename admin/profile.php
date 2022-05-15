<?php
include_once("header.php")
?>

<?php

$conn=mysqli_connect("localhost","root","","project");

$uid=$_SESSION["uid"];


$qry="Select * from user where uid='$uid'";

//echo $qry;

$path="";
$result=$conn->query($qry);
$str="<table  class='table table-striped'>";
while($row=$result->fetch_assoc())
{   
    $fname=$row["fname"];
    $lname=$row["lname"];
    $address=$row["address"];
    $mail=$row["mail"];
    $username=$row["username"];
    $contact=$row["contact"];
    $dob=$row["dob"];
    $doj=$row["doj"];
    $gender=$row["gender"];
    $isonline=$row["isonline"];
    $lastseen=$row["lastseen"];
    $visitcount=$row["visitcount"];
    $img=$row["uimage"];
    $path="../images/$img";
}
$str.="</table>";
echo $str;

?>

<div class="page-content">
    <div class="ace-settings-container" id="ace-settings-container">
        

        <!-- /.ace-settings-box -->
    </div><!-- /.ace-settings-container -->

    <div class="page-header">
        <h1>
        USER Profile
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
<div class="col-xs-12">
<div class="clearfix">
</div>

<div>
    <div id="user-profile-1" class="user-profile row">
        <div class="col-xs-12 col-sm-3 center">
            <div>
                <span class="profile-picture">
                    <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="<?php echo $path; ?>">
                </span>

                <div class="space-4"></div>

                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">

                            &nbsp;
                            <span class="white"><?php echo "$fname $lname"; ?></span>
                        </a>


                    </div>
                </div>
            </div>

            <div class="space-6"></div>

            <div class="profile-contact-info">
                <div class="profile-contact-links align-left">
                     <?php echo "<a href='upprofile.php?id=$uid' class='btn btn-link'>" ?>
                    <i class='ace-icon fa fa-plus-circle bigger-120 green'>
                        Edit Profile
                    </i>
                    </a>
                    
                    

                    <!--<a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                        <?php echo "$mail"; ?>
                    </a>-->

                </div>

                <div class="space-6"></div>

                
            </div>

           

            <div class="hr hr16 dotted"></div>
        </div>

        <div class="col-xs-12 col-sm-9">
            <!--<div class="center">
                <span class="btn btn-app btn-sm btn-light no-hover">
                    <span class="line-height-1 bigger-170 blue"> 1,411 </span>

                    <br>
                    <span class="line-height-1 smaller-90"> Views </span>
                </span>

                <span class="btn btn-app btn-sm btn-yellow no-hover">
                    <span class="line-height-1 bigger-170"> 32 </span>

                    <br>
                    <span class="line-height-1 smaller-90"> Followers </span>
                </span>

                <span class="btn btn-app btn-sm btn-pink no-hover">
                    <span class="line-height-1 bigger-170"> 4 </span>

                    <br>
                    <span class="line-height-1 smaller-90"> Projects </span>
                </span>

                <span class="btn btn-app btn-sm btn-grey no-hover">
                    <span class="line-height-1 bigger-170"> 23 </span>

                    <br>
                    <span class="line-height-1 smaller-90"> Reviews </span>
                </span>

                <span class="btn btn-app btn-sm btn-success no-hover">
                    <span class="line-height-1 bigger-170"> 7 </span>

                    <br>
                    <span class="line-height-1 smaller-90"> Albums </span>
                </span>

                <span class="btn btn-app btn-sm btn-primary no-hover">
                    <span class="line-height-1 bigger-170"> 55 </span>

                    <br>
                    <span class="line-height-1 smaller-90"> Contacts </span>
                </span>
            </div>-->

            <div class="space-12"></div>

            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Username </div>

                    <div class="profile-info-value">
                        <span class="editable editable-click" id="username"><?php echo "$username"; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Address </div>

                    <div class="profile-info-value">
                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                        <span class="editable editable-click" id="city"><?php echo " $address"; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Date Of Birth </div>

                    <div class="profile-info-value">
                        <span class="editable editable-click" id="dob"><?php echo "$dob"; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Joined </div>

                    <div class="profile-info-value">
                        <span class="editable editable-click" id="signup"><?php echo "$doj"; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Gender </div>

                    <div class="profile-info-value">
                        <span class="editable editable-click" id="login"><?php echo "$gender"; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Contact Number </div>

                    <div class="profile-info-value">
                        <span class="editable editable-click" id="about"><?php echo $contact; ?></span>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br><br>
            <br>
            <br>
            <br><br>
           
            

<?php
include_once("footer.php");
?>