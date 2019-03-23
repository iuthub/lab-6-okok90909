<?php
//ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$hasError=False;
$nameErr="";
$emailErr="";
$usernameErr="";
$passwordErr="";
$confirmPasswordErr="";
$birthErr="";
$mobilePhoneErr="";
$homePhoneErr="";
$addressErr="";
$cityErr="";
$postalCodeErr="";
$creditNumberErr="";
$gpaErr="";
$urlErr="";
$salaryErr="";
$expireErr="";
$confirmPasswordErr="";

$name="";
$email="";
$username="";
$password="";
$confirmPassword="";
$creditNumber="";
$birth="";
$mobilePhone="";
$homePhone="";
$address="";
$city="";
$postalCode="";
$gpa="";
$url="";
$salary="";
$expire="";
$confirmPassword="";
function escape($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}
function showError($var){
	return isset($var)?$var:"";
}
function errorCheck($postdata, $error, $errorMsg, $pattern=null, $patternErrorMsg=null, $isConfirm=False, $confirmValue="") 
{
	global $$error;
	global $$errorMsg;
//	global $password;
	
	$$postdata=isset($_POST[$postdata])?$_POST[$postdata]:"";
	if (empty($_POST[$postdata])){
		$$error = $errorMsg;
		$hasError=True;
		// print($error);
		// print($$error);
		// print($postdata);
		// print($$postdata);
	if ($pattern)
		if (!preg_match($pattern,escape($$postdata)))
			$hasError=True;
			$$error = $patternErrorMsg;
	}
	
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	errorCheck("name", "nameErr", "*Name is required", "/^[a-zA-Z ]{2,}$/", 
	"*Letters and white space allowed, min 2");
	errorCheck("email", "emailErr", "*Email is required", 
	"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", 
	"*Invalid email format");
	errorCheck("username", "usernameErr", "*User name is required", 
	"/^[a-zA-Z 0-9]{5,}$/", 
	"*Letters and white space allowed, min 5");
	errorCheck("password", "passwordErr", "*Password is required", 
	"/^[a-zA-Z0-9]{8,}$/", 
	"*Minimum 8 characters required");
	//Confirm
	if (empty($_POST["confirmPassword"])) 
	{
		$confirmPasswordErr = "*Password is required";
	} 
	else
	{
		$confirmPassword=$_POST["confirmPassword"];
		if ($confirmPassword!=$password) 
		{
			$confirmPasswordErr="*Passwords do not match!";
		}
			
		
	}
	errorCheck("confirmPassword", "confirmPasswordErr", "*Passwords do not match!", 
	null, "*Passwords do not match!", True, "password");
	errorCheck("birth", "birthErr", "*Birth Date is required", 
	"/^([0-9]{2})[.]([0-9]{2})[.]([0-9]{4})$/", 
	"*Invalid Birth Date format");
	errorCheck("address", "addressErr", "*Address is required");
	errorCheck("city", "cityErr", "*City is required");
	errorCheck("postalCode", "postalCodeErr", "*Postal Code is required", 
	"/^[0-9]{6}$/", 
	"*Minimum 6 characters required");
	errorCheck("homePhone", "homePhoneErr", "*Home phone number is required", 
	"/71([0-9]{7})/", 
	"*Invalid mobile format (71 xxx xxx xxx)");
	errorCheck("mobilePhone", "mobilePhoneErr", "*Mobile phone number is required", 
	"/9989/", 
	"*Invalid mobile format");
	errorCheck("creditNumber", "creditNumberErr", "*Credit card number is required", 
	"/[0-9]{16}/", 
	"*Invalid credit card format");
	errorCheck("expire", "expireErr", "*Expire date is required", 
	"/([0-3]{1})([0-9]{1})[.]([0-9]{2})[.]([2000-2030]{1})/", 
	"*Invalid Expire date format(ex. 01.01.2001)");
	errorCheck("salary", "salaryErr", "*Salary is required", 
	"/UZS ([0-9]{0,9})/", 
	"*Invalid Salary format(ex. 'UZS 200000')");
	errorCheck("url", "urlErr", "*Salary is required", 
	"/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", 
	"Invalid URL (www.example.com)");
	errorCheck("gpa", "gpaErr", "*Salary is required", 
	"/([0-4]{1})[.]([0-9])/", 
	"*Invalid GPA format(ex. 3.5)");
}
if ($hasError){?>
	<h1>Thank You</h1>
	<?php
}
else{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Validating Forms</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<form action="index.php" method="POST">
	<h1>Registration Form</h1>

	<p>This form validates user input and then displays "Thank You" page.</p>
	
	
	<hr />

	
	
	<h2>Please, fill below fields correctly</h2>

	<style>
	.error{
		color:red;
	}
	</style>

	<dl action = "index.php" method="post">
		<dt>Name</dt>
		<dd><input type="text" name="name" value="<?= showError($name); ?>">
		<span class="error"><?= showError($nameErr); ?></span></dd>

		<dt>Email address</dt>
		<dd><input type="text" name="email" value="<?= showError($email); ?>">
		<span class="error"><?= showError($emailErr); ?></span></dd>

		<dt>Username</dt>
		<dd><input type="text" name="username" value="<?= showError($username); ?>">
		<span class="error"><?= showError($usernameErr);  ?></span></dd>

		<dt>Password</dt>
		<dd><input type="text" name="password" value="<?= showError($password); ?>">
		<span class="error"><?= showError($passwordErr);  ?></span></dd>

		<dt>Confirm Password</dt>
		<dd><input type="text" name="confirmPassword" value="<?= showError($confirmPassword); ?>">
		<span class="error"><?= showError($confirmPasswordErr);  ?></span></dd>

		<dt>Date of Birth</dt>
		<dd><input type="text" name="birth" value="<?= showError($birth); ?>">
		<span class="error"><?= showError($birthErr);  ?></span></dd>

					<dt>Gender</dt>
		<dd><input type="radio" name="gender" checked value="male"> Male
		<input type="radio" name="gender" value="female"> Female<br>
		</dd>

		<dt>Marital Status</dt>
		<dd>
		<input type="radio" name="marital" value="single" checked > Single
		<input type="radio" name="marital" value="married"> Married
		<input type="radio" name="marital" value="divorced"> Divorced
		<input type="radio" name="marital" value="widowed"> Widowed<br>
		</dd>

		<dt>Address</dt>
		<dd><input type="text" name="address" value="<?= showError($address); ?>">
		<span class="error"><?= showError($addressErr);  ?></span></dd>

		<dt>City</dt>
		<dd><input type="text" name="city" value="<?= showError($city); ?>">
		<span class="error"><?= showError($cityErr);  ?></span></dd>

		<dt>Postal Code</dt>
		<dd><input type="text" name="postalCode" value="<?= showError($postalCode); ?>">
		<span class="error"><?= showError($postalCodeErr);  ?></span></dd>

		<dt>Home Number</dt>
		<dd><input type="text" name="homePhone" value="<?= showError($homePhone); ?>">
		<span class="error"><?= showError($homePhoneErr);  ?></span></dd>


		<dt>Mobile number</dt>
		<dd><input type="text" name="mobilePhone" value="<?= showError($mobilePhone); ?>">
		<span class="error"><?php echo "$mobilePhoneErr"; ?></span></dd>

		<!-- <dt>Output Text</dt>
		<dd><?=	$match ?></dd> -->


		
		<dt>Credit Card Number</dt>
		<dd><input type="text" name="creditNumber" value="<?= showError($creditNumber); ?>">
		<span class="error"><?= showError($creditNumberErr);  ?></span></dd>

		<dt>Credite Card Expire Date</dt>
		<dd><input type="text" name="expire" value="<?= showError($expire); ?>">
		<span class="error"><?= showError($expireErr);  ?></span></dd>

		<dt>Monthly Salary</dt>
		<dd><input type="text" name="salary" value="<?= showError($salary); ?>">
		<span class="error"><?= showError($salaryErr);  ?></span></dd>

		<dt>Website URL</dt>
		<dd><input type="text" name="url" value="<?= showError($url); ?>">
		<span class="error"><?= showError($urlErr);  ?></span></dd>

		<dt>Overall GPA</dt>
		<dd><input type="text" name="gpa" value="<?= showError($gpa); ?>">
		<span class="error"><?= showError($gpaErr);  ?></span></dd>

		<dt>&nbsp;</dt>
		<dd><input type="submit" value="Register"></dd>
	</dl>
	
	
	</form>

</body>
</html>
<?php
}
?>