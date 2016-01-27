<?php
if(count($_POST)>0) {
	//all the fields must have value
	$counter=0;	
	foreach ($_POST as $key => $value) {	
	if(empty($_POST[$key])) {
		$fieldName=$key;
		$counter++; 
	}
	}
	//single and multi level response 
	if($counter==1)
		$responseMessage = ucwords($fieldName) . " field is required";
	else if ($counter>1)
		$responseMessage = "Please fill in all the require fields";
	
	//passwordverification
	if($_POST['password'] != $_POST['confirm_password']){ 
	$responseMessage = 'Passwords should be same'; 
	}
	
	//password with three consecutive numbers
	if(!isset($responseMessage)) {
		if (preg_match("/\d{3}/", $_POST['password'], $matches) > 0){
			$responseMessage = 'Password has three consecutive numbers'; 
		}
	}	
	
	//password strength
	if(!isset($responseMessage)){
        if (strlen($_POST['password']) < 8) {
        $responseMessage = "Password too short!";
		}
		if (!preg_match("#[0-9]+#", $_POST['password'])) {
        $responseMessage = "Password must include at least one number!";
		}
		if (!preg_match("#[a-zA-Z]+#", $_POST['password'])) {
        $responseMessage = "Password must include at least one letter!";
		}
	}
	
	//date format validation
	if(!isset($responseMessage)) {
		if (!empty($_POST['birthDate'])) {
			$date_arr  = explode('/', $_POST['birthDate']);	
			if ((count($date_arr) != 3) || !(checkdate($date_arr[0], $date_arr[1], $date_arr[2]))) {
			$responseMessage = "Please enter valid date";
			}		
		}
	}

	//Age validation
	if(!isset($responseMessage)) {
		if (!empty($_POST['birthDate'])) {
			//age validation
			$birthDay=new DateTime($_POST['birthDate']);
			$todayDate=new DateTime('today');
			if(($birthDay->diff($todayDate)->y) <18)
				$responseMessage = "Only 18+ are allowed to register";
		}
	}
	
	//email validation
	if(!isset($responseMessage)) {
	if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
	$responseMessage = "Please enter valid Email";
	}
	}
	
	//terms and conditions
	if(!isset($responseMessage)) {
	if(!isset($_POST["terms"])) {
	$responseMessage = "Please accept terms and conditions";
	}
	}	
}
?>

<head>
    <title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet"  href="/script/register.css">
	<script>
	$(document).ready(function(){   
		if(!navigator.cookieEnabled)
			confirm("We use cookies for better user experience. Do you want to activate it?");
		}); 
	</script>	
<style>

</style>
</head>
<body>
<div id="main">
    <div id="menu">
        <div id="topImage">
             <a href="/images/logo1.gif"><img src="/images/logo1.gif" id="firstImage" alt="logo" /></a>
             <a href="/images/logo.gif"><img src="/images/logo.gif" id="secondImage" alt="image" /></a>
         </div>
         <div id="leftForm">
             <nav class="clearfix">
                <ul class="clearfix">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">How-to</a></li>
                        <li><a href="#">Icons</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Web 2.0</a></li>
                        <li><a href="#">Tools</a></li>
                </ul>
				<a href="#" id="pull">Menu</a>
             </nav>
         </div>
    </div>

    <div id="rightForm">

    <div id="form">
        <form name="userRegistration" method="post" action="">
            <table class="register_table">
                <div class="responseMessage"><?php if(isset($responseMessage)) echo $responseMessage; ?></div>
                <tr>
                <td>First Name*</td>
                <td><input type="text" class="registerInputBox" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
                </tr>
                <tr>
                <td>Last Name*</td>
                <td><input type="text" class="registerInputBox" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
                </tr>
                <tr>
                <td>BirthDate(mm/dd/yyyy)*</td>
                <td><input type="text" class="registerInputBox" name="birthDate" value="<?php if(isset($_POST['birthDate'])) echo $_POST['birthDate']; ?>"></td>
                </tr>
                <td>Address*</td>
                <td><input type="text" class="registerInputBox" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>"></td>
                </tr>
                <tr>
                <td>Nationality*</td>
                <td><select name="nationality" id="nationality">
                <option value="American">American</option>
                <option value="German">German</option>
                <option value="Nepalese">Nepalese</option></select><br />
                </td></tr>
                <tr>
                <td>Email*</td>
                <td><input type="text" class="registerInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
                </tr>
                <td>Password*</td>
                <td><input type="password" class="registerInputBox" name="password" value=""></td>
                </tr>
                <tr>
                <td>Confirm Password*</td>
                <td><input type="password" class="registerInputBox" name="confirm_password" value=""></td>
                </tr>
                <tr>
                <td></td>
                <td><label><input type="checkbox" name="terms" /> I accept all the terms and conditions.</label></td>
                </tr>
            </table>
            <div id="registerDiv">
                <input id="register" type="submit" name="submit" value="Register" class="btnRegister">
            </div>
        </form>
    </div>

    <div id="image">
    <a> <img src="/images/avatar.png" id="avatar-image" alt="image"/> </a>
    </div>

    <div id="footer">
        <footer>
            <p style="padding:10px">Created by: Santosh Shah</p>
        </footer>
    </div>

</div>
</div>
</body>
</html>

