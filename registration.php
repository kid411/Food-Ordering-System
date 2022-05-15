<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Anand Food Court || Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">  
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    </head>
    <style>
        
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap');
*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
body{
    font-family: 'Playfair Display', serif;
    display: grid;
    background-color: #0f33e2;
    background-image: linear-gradient(43deg, #2b43bb 0%, #25abcc 46%, #E6E6E6 100%);
    align-content: center;
    min-height: 100vh;
}

.container {	
	display:flex;
	background-position: center;
    background-size: cover;
	align-items: center;
	justify-content:center;
}

.screen {	
    background-image: linear-gradient(43deg, #2b43bb 0%, #25abcc 46%, #E6E6E6 100%);	
	/* background: linear-gradient(90deg, #5D54A4, #7C78B8);		 */
	top: 5px;
	position: relative;	
	height: 720px;
	width: 360px;	
	box-shadow: 0px 0px 24px #336199;
}
.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}



.login {
	width: 320px;
	padding: 30px;
	padding-top: 1px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
    color: #ffffff;
}

.login__icon {
    
	position: absolute;
	top: 25px;
	color: #dbd494;
       
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
    color: #ffffff;
	padding: 5px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}
::placeholder{

	color: white;
	opacity: 1;
	font-size: 12px;
	font-style:normal;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 20px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
    color: #336199;
	/* color: #4C489D; */
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	top: 10px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
    color: white;
	align-items: center;
	justify-content: center;
    size: 100%;
}

.social-login__icon {
	padding: 10px 10px;
	color: #ffffff;
	text-decoration: none;	
	text-shadow: 0px 0px 20px #7875B5;
}

.social-login__icon:hover {
		
    box-shadow: 2px 1px 2px #3249bd;
}

.hi1{
	color: red;
}
</style>
<body>

<?php


$username="";
$pass="";
$uimage="";
$dob="";
$mail="";
$fname="";
$lname="";
$contact="";
$address="";


if(isset($_POST["btnsubmit"]))
{

    $uimage=$_FILES['uimage']['name'];
    $target_path = "../images/";  
    $target_path = $target_path.basename( $_FILES['uimage']['name']);   
    move_uploaded_file($_FILES['uimage']['tmp_name'], $target_path);  

$username=$_POST["username"];
$pass=$_POST["pass"];
//$pimage=$_POST["pimage"];
$dob=date("Y-m-d");
$mail=$_POST["mail"];
$lname=$_POST["lname"];
$fname=$_POST["fname"];
$contact=$_POST["contact"];
$address=$_POST["address"];

$conn=mysqli_connect("localhost","root","","project");

$qry="insert into user (username,pass,fname,lname,contact,mail,address,dob,uimage,rollid) values ('$username','$pass','$fname','$lname','$contact','$mail','$address','$dob','$uimage','3')";

$result=$conn->query($qry);


if(isset($_POST["btnsubmit"]))
{
$username=$_POST["username"];
$mail=$_POST["mail"];

$randomNumber = rand();
  
$otp = rand(100000,999999);
$_SESSION["otp"]= $otp;
$_SESSION["username"]=$username;
$_SESSION["mail"]=$email;




	$to_email = $mail;
	$subject = "WELCOME !";
	$body = "Welcome to ANAND FOOD COURT";

	$headers = "From:devarshipatel.18.cs@iite.indusuni.ac.in";

	if (mail($to_email, $subject, $body, $headers))
     {
		// echo "Email successfully sent to $to_email...";

		$yourURL="login.php";
		echo ("<script>location.href='$yourURL'</script>");
				// header('location:otp.php');
	} 
    else 
    {
		//echo "Email sending failed...";
		ini_set("error_reporting", E_ALL);
		print_r(error_get_last());
	}
}

echo "<script>location.href='login.php';</script>";
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

    <div class="imgbg">
        <div class="container">
            <div class="screen">
                <div class="screen__content">
                    <form class="login" method="post" enctype="multipart/form-data">
                        <div class="login__field">
                            <i class="login__icon fas fa-camera"></i>
                            <input type="file" name="file" class="login__input"accept=".png, .jpg, .jpeg" onchange="validateFileType()" placeholder="Image" required>
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-user"></i>
                            <input type="text" class="login__input" name="username"oninput= "allow_alphabets(this)" placeholder="User name">
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-lock"></i>
                            <input type="password" class="login__input" name="pass"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}" placeholder="Password"required="" title="Must contain at least one number,one uppercase,one lowercase,one special Character, and at least 8 or more characters"required>
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-user"></i>
                            <input type="text" class="login__input" name="fname" oninput= "allow_alphabets(this)"placeholder="First Name" required>
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-user"></i>
                            <input type="text" class="login__input" name="lname"oninput= "allow_alphabets(this)" placeholder="Last Name" required>
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-calendar"></i>
                            <input type="date" class="login__input" name="dob" placeholder="DOB" required>
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-phone"></i>
                            <input type="text" class="login__input" name="contact"pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"  placeholder="Contact Number">
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-envelope"></i>
                            <input type="text" class="login__input" name="mail"pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" placeholder="E-Mail" required>
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-address-card"></i>
                            <input type="text" class="login__input" name="address" placeholder="Address" required>
                        </div>
                        <input type="submit" name="btnsubmit" class="button login__submit" required>
                            <span class="button__text"></span>				
                    </form>
                </div>
            </div>
            </div>
        </div>
</body>
</html>