<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../src/css/signin.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="bg">
        <div class='wrap'>
                <h1>Sign in</h1>
                  <div id="login">
                        <form name='form-login'>
                          <span class="fontawesome-user"></span>
                            <input type="text" id="user" placeholder="Username">
                         
                          <span class="fontawesome-lock"></span>
                          <input type="password" id"pass" placeholder="Password">
                          <div class="check">
                                <input type="checkbox" name="remember">
                                <span class="remember">Remember me</span>     
                          </div>
                                          
                        <div class="sub">
                          <input type="submit" value="Sign in">
                        </div>
                          <div id="join">
                            <p class="login-help"><span class="notmember">Not a member yet?</span><a href="#"><strong>&nbsp;Join us now</strong></a></p>
                          </div>
                  </form>
              </div>
        </div>
</body>
</html>
<?php
  $_SESSION['username'] = "manager";