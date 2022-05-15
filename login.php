<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css">
    <title>Anand Food Court</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}
.bgimg{
    min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(43deg, #2b43bb 0%, #25abcc 46%, #E6E6E6 100%);	
    background-position: center;
    background-size: cover;
    box-shadow: 0px 0px 24px #336199;
    position: relative;
}
.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen__content {	
    	
	background-image: linea-gradient(43deg, #2b43bb 0%, #25abcc 46%, #E6E6E6 100%);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #336199;
}
.login {
	width: 320px;
	padding: 30px;
	padding-top: 156px;
}
.login__field {
	padding: 20px 0px;	
	position: relative;	
}
.login__icon {
	position: absolute;
    font-size: 20px;
	top: 30px;
	color: #ffffff;
}
.login__input {
	border: none;
	border-bottom: 2px solid #ffffff;
	background: none;
    color: #ffffff;
    font-size: 20px;
	padding: 10px;
	padding-left: 24px;
	font-weight: 1000;
	width: 75%;
	transition: .2s;
}
::placeholder{

    color: white;
    opacity: 1;
    font-size: 18px;
    font-style:normal;

}
.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #ffffff;
    color: #ffffff;
}
.login__submit {
	background: linear-gradient(90deg, #336199, transparent);
	font-size: 22px;
	margin-top: 10px;
    margin-left: -10px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #ffffff;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #ffffff;
	box-shadow: 0px 2px 2px #ffffff;
	cursor: pointer;
	transition: .2s;
}


.login__sub{
	background: linear-gradient(90deg, #336199, transparent);
	font-size: 22px;
	margin-top: -85px;
    margin-left: -190px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #ffffff;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #ffffff;
	box-shadow: 0px 2px 2px #ffffff;
	cursor: pointer;
	transition: .2s;
}
.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #ffffff;
	outline: none;
}
.button__icon {
	font-size: 30px;
	margin-left: auto;
	color: #141313;
}
.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #ffffff;
}
.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}
.social-login__icon {
	padding: 20px 10px;
	color: #ffffff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #ffffff;
}
.social-login__icon:hover {
	transform: scale(1.5);	
}
.hi1{
    color: white;
}

</style>
<body>
    <div class="bgimg">
        <div class="container">       
            <div class="screen__content">
                        <?php

                        $username="";
                        $pass="";
                        $uimage="";

                        if(isset($_POST["btnans"]))
                        {
                            $username=$_POST["username"];
                            $pass=$_POST["pass"];

                            $conn=mysqli_connect("localhost","root","","project");

                            $qry="select * from user where username='$username' and pass='$pass'";
                            //echo $qry;

                            $result=$conn->query($qry);
                            
                            $cnt=mysqli_num_rows($result);

                            session_start();

                            if($cnt>0)
                            {
                                $row=$result->fetch_assoc();


                                $roleid=$row["rollid"];
                                $_SESSION["uname"] =$row["username"];
                                $_SESSION["mail"]=$row["mail"];
                                $_SESSION["uid"] =$row["uid"];
                                $fname=$row["fname"];
                                $lname=$row["lname"];
                                $_SESSION["name"] ="$fname $lname";
                                $_SESSION["bid"] =$row["bid"];
                                $_SESSION["uimage"]=$row["uimage"];
                                if($roleid==1)
                                {
                                echo "<script>location.href='admin/index.php';</script>";
                                }
                                if($roleid==2)
                                {
                                    echo "<script>location.href='branch/index.php';</script>";
                                }
                                if($roleid==3)
                                {
                                    
                                    echo "<script>location.href='member/index.php';</script>";
                                }


                            }
                            else
                            {
                                echo "Your username or Pass is wrong";
                            }
                        }

                        ?>
                <form class="login" method="post">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="username" placeholder="User name">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="pass" placeholder="Password">
                    </div>
                    <input type="submit" class="button login__submit" name="btnans" class="button__icon fas fa-chevron-right" class="button__text" value="Log In Now"> 
                    </input>				
                </form>
                <div class="social-login">
                    
                <table>
                    <tr>
                        <td>
                    <a href="registration.php" class="login__submit">Register Here</a>
                    <!--<a href="forgotpass.php" class="login__sub">Forgot Password</a>-->
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>