<head>
  <style>
    .wrap-contact100 {
      background: #fff;
      border-radius: 30px;
      overflow: hidden;
      padding: 62px 55px 90px 55px;
      width: 500px;
    }
    .container-contact100 {
      width: 100%;
      align-items: center;
      padding: 15px;
      background: #e6e6e6;
    }
  </style>
</head>
<body>
  <div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" method="POST" id="form2">
        <span class="contact100-form-title">
          Sign in
        </span>
        <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
          <span class="label-input100">Username</span>
          <input class="input100" type="text" name="username">
        </div>
        <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
          <span class="label-input100">Password</span>
          <input class="input100" type="password" name="password">
        </div>
        <div class="check">
          <input type="checkbox" name="remember">
          <span class="remember">Remember me</span>     
        </div>
        <div class="container-contact100-form-btn">
          <!-- <input type="submit"> -->
          <button class="contact100-form-btn" type="submit" form="form2" value="Submit">
          <span>
            Sign in
          </span>
        </button>
        </div>
        <div class="join">
          <p class="login-help"><span class="notmember">Not a member yet?</span><a href="D:\projectbisad2\signin.html"><strong>&nbsp;Join us now</strong></a></p>
        </div>
      </div>
      </form>
    </div>
  </div>
</body>

<?php
    if (isset($_POST['username'])){
        // echo("<script>alert('pass')</script>");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($conn, "select * from user where username='$username' and    password='$password'") or die(mysqli_error($conn));
        if ($result = mysqli_fetch_assoc($query)){
            $_SESSION['username'] = $result['username'];
            echo "<script>location.href='?page=home';</script>";
        }
        else {
            echo "<script>alert('invalid username or passord')</script>";
        }
    }
?>
