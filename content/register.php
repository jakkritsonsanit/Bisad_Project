<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method='post' enctype="multipart/form-data" id="form1">
				<span class="contact100-form-title">
					Create Your Account
				</span>
					<div class="wrap-input100 bg1 rs1-wrap-input100-name" data-validate = "Enter Your Email (e@a.x)">
						<span class="label-input100">First name</span>
						<input class="input100" type="text" name="firstname" required>
					</div>

					<div class="wrap-input100 bg1 rs1-wrap-input100-name" data-validate = "Enter Your Email (e@a.x)">
						<span class="label-input100">Last Name</span>
						<input class="input100" type="text" name="lastname" required>
					</div>
					<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" required>
					</div>
					<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" required>
          </div>
          <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" required>
					</div>
					<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="number" name="phone" required>
					</div>
					<div class="div-up">
						<input type="file" accept="image/*" name="image" id="file-1" class="inputfile inputfile-1" required/>
						<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
						<label class="up-pig">อัพโหลดรูปภาพ</label>
					</div>
					<div class="check">
            <input id="customer" type="radio" name="role" value="customer" checked> 
            <label class="remember" for="customer">ลูกค้า(คนเดินตลาด)</label><br>
            <br>
            <input id="merchant" type="radio" name="role" value="merchant"> 
            <label class="remember" for="merchant">ผู้เช่า(คนเช่าพื้นที่สำหรับร้านค้า)</label>
					</div>
					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" type="submit" form="form1" value="Submit">
							<span>
								Create Account
							</span>
						</button>
					</div>
				<div class="join">
					<p class="login-help"><span class="notmember">Already have an Account?</span><a href="?page=signin"><strong>&nbsp;Sign in</strong></a></p>
				</div>
			</div>
			</form>
		</div>
	</div>
</body>
</html>

<script>
  function succes(){
    swal('Success!!', 'You account is created!', 'success')
    .then((value) => {
      location.href='?page=home';
    });
  };
</script>

<?php
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $query = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if ($result = mysqli_fetch_assoc($query)) {
      echo "<script>alert('username is taken')</script>";
    }
    else {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        $imagename = 'src/img/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
        mysqli_query($conn, "insert into user (firstname, lastname, username, password, email, phone, role, image) values ('$firstname','$lastname','$username','$password','$email','$phone','$role','$imagename')") or die(mysqli_error($conn));
        $_SESSION['username'] = $username;
        echo '<script type="text/javascript">',
					'succes();',
					'</script>'
				;
    }
  }
?>
