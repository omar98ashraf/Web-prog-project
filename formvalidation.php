<?php
$username=$name=$email=$password="";
$usernameErr=$nameErr=$emailErr=$passwordErr="";

	function test_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST['username']))
			$usernameErr="Provide your username";
		else
		{
			$name=test_input ($_POST['username']);
			if (!preg_match("/^[a-zA-Z]*$/",$username))
				$usernameErr="Only letters and spaces are allowed";
		}
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST['name']))
			$nameErr="Provide your name";
		else
		{
			$name=test_input ($_POST['name']);
			if (!preg_match("/^[a-zA-Z]*$/",$name))
				$nameErr="Only letters and spaces are allowed";
		}
		if (empty($_POST['email']))
			$emailErr="provide your email";
		else
		{
			$email=test_input($_POST['email']);
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$emailErr="invalid email format";
			}
		}
		if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST['password']))
			$passwordErr="Provide your password";
		else
		{
			$name=test_input ($_POST['password']);
			if (!preg_match("/^[a-zA-Z]*$/",$password))
				$passwordErr="Only letters are allowed";
		}
	}
?>
<html>
<head>
	<title>form validation</title>
	<h1>Form Validation</h1>
</head>
<body>
	<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	Username: <input type="text" name="username"/>
	<span class="error"><?php echo $usernameErr;?></span>
	<br/><br/>
	Name: <input type="text" name="name"/>
	<span class="error"><?php echo $nameErr;?></span>
	<br/><br/>
	Email: <input type="text" name="email"/><span class="error"><?php echo $emailErr;?></span><br/><br/>

	password: <input type="text" name="password"/>
	<span class="error"><?php echo $passwordErr;?></span>
	<br/><br/>

    <input type="Submit" value="validate"/>
	</form>
</body>
</html>
