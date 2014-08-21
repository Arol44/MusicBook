<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="backgroundimghtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musicbook-Login</title>
<link href="styles/musicstyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="ajax_start.js"></script>
</head>

<body class="backgroundimgbody">
<div id="container">
<div id="header">
	<div id="logo">
	<img src="images/Logo_White.png" />
	</div>
    	<!--<div id="loginbutton">
        	<a href=""><img src="images/button_login.png" /></a>
        </div>-->
        
        <div id="loginform">
        <div id="userpasstext">
        	Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password
        </div>
        <div id="userpassform">
        	<form action="" onsubmit="return loginForm(this)">
            <input type="text" name="user" id="user" class="loginform" />
        	<input type="password" name="password" id="password" class="loginform" /> 
            <input type="image" src="images/button_login.png" />
        	</form>
        </div>
        </div>
</div>
<div id="message"></div>
<div id="signupbackground">
	<img src="images/login_signupBackground.png" />
    <div id="signup">
    	<div id="signuptext">
        	Not a member? <br />
            <span class="largetext">Sign Up Here! Free!</span>
            <br /><br />
            <form id="signupform" name="signupform" action="signup.php" method="post" >
            	First Name: <input type="text" name="fname" id="fname" class="signupform" /><br /><br />
                Last Name: <input type="text" name="lname" id="lname" class="signupform" /><br /><br />
                Gender: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="male" />Male<br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="female" />Female<br /><br />
                Username: <input type="text" name="user" id="user" class="signupform" /><br /><br />
                Password: <input type="password" name="pass" id="pass" class="signupform" /><br /><br />
                <input type="image" src="images/button_join.png" class="joinbutton" />
            </form>
        </div>
        <div id="signuptextleft">
        	Share and listen to your <br /> favourite music, bands, <br /> and songs!
        </div>
    </div>
    <div id="foregroundimg">
	<img src="images/login_foreground.png" />
	</div>
</div>
</div>

</body>
</html>