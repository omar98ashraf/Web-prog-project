<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css"/>
</head>
<body>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="images/gorilla_brand.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
<div class="clearfix">
    <button type="submit" name="submit">Login</button>
    <form method="get" action="index.html">
    <button type="button">back</button>
</form>
   </div>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
</form>
<form method="get" action="signup_page.html">
    <button style="background-color:red;margin-left:auto;margin-right:auto;display:block;margin-top:0%;margin-bottom:0%" type="submit" >SignUp</button>
</form>

<form>
  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
  <?php
  if(isset($_POST["submit"]))
  {
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
      $user = $_POST['username'];
      $pass = $_POST['password'];
      $con = mysqli_connect('localhost','root','root') or die(mysqli_error());
      mysqli_select_db($con,'gorilla_brand') or die("cannot select DB");
      $query = mysqli_query($con,"SELECT * FROM user WHERE username = '".$user."' AND password = '".$pass."'");
      $numrows = mysqli_num_rows($query);
      if($numrows != 0)
      {
        while($row = mysqli_fetch_assoc($query))
        {
          $dbusername = $row['username'];
          $dbpassword = $row['password'];
        }
        if($user == $dbusername && $pass == $dbpassword)
        {
          session_start();
          $_SESSION['sess_user'] = $user;
          $row['active'] = 1;
          /* Redirect browser */
          header("Location: home.php");
        }
      }
      else
      {
        echo "Invalid username or password!";
      }
  }
  else
  {
    echo "All fields are required!";
  }
}
?>
</body>
</html>