<?php
    $username  = $password = $email = "";
    $usernameErr = $passwordErr = $emailErr = "";
    $valid = true;
    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['username']))
        {
            $usernameErr = "Provide Your username";
            $valid = false;
        }
        else
        {
            $username = test_input($_POST['username']);
            if(!preg_match("/^([a-zA-Z' ]+)$/",$fname))
            {
                $usernamenameErr = "Only characters allowed";
                $valid = false;
            }
        }
        if(empty($_POST['email']))
        {
            $emailErr = "Provide Your Email";
            $valid = false;
        }
        else
        {
            $email = test_input($_POST['email']);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Invalid Email Format";
                $valid = false;
            }
        }
        if(empty($_POST['password']))
        {
            $passwordErr = "Provide Your Password";
            $valid = false;
        }
        else
        {
            $password = test_input($_POST['password']);
            if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password))
            {
                $passwordErr = "Your Password must contain at least one lowercase char, at least one uppercase char, at least one digit, at least one special sign of @#-_$%^&+=§!?, at least 8 characters and at most 30 characters. <br/>";
                $valid = false;
            }
        }
    }
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/sustyle.css"/>
<script type="text/javascript" src="js/username.js"></script>
<script type="text/javascript" src="user.js"></script>
</head>
<body onload="process()">

<form name="signup"  method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="uname" required>
    <div id="underInput"></div><br/>
    <span class = "error"><?php echo $usernameErr;?></span>

    <label for="name"><b>name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    <span class = "error"><?php echo $emailErr;?></span>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <span class = "error"><?php echo $passwordErr;?></span>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="location.href='Login_page.php'">Cancel</button>
      <button type="submit" class="signupbtn" value="insert" formaction="insert.php">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>



