<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<dl>
			<form action="index.php" method="post">
			<dt>Name: </dt>
			<dd>
				<input type="text" name="name">
			</dd>
			<dt>Email: </dt>
			<dd>
				<input type="text" name="email">
			</dd>
			<dt>Username: </dt>
			<dd>
				<input type="text" name="username">
			</dd>
			<dt>Password: </dt>
			<dd>
				<input type="text" name="password">
			</dd>
			<dt>Conﬁrm Password : </dt>
			<dd>
				<input type="text" name="confirm_password">
			</dd>
			<dt>Date of Birth: </dt>
			<dd>
				<input type="text" name="birthdate">
			</dd>
			<dt>Gender: </dt>
			<dd>
				<input type="text" name="gender">
			</dd>
			<dt>Marital Status: </dt>
			<dd>
				<input type="text" name="mstatus">
			</dd>
			<dt>Postal Code: </dt>
			<dd>
				<input type="text" name="postal">
			</dd>
			<dt>Credit Card Number: </dt>
			<dd>
				<input type="text" name="ccnumber">
			</dd>
			
			<!-- Write other fiels similar to Name as specified in lab6.pdf -->
		</dl>
		
			<div>
				<input type="submit" value="Register">
			</div>
		</form>
	</body>
</html>