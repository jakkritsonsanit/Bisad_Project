<?php
  $username = $_SESSION['username'];
  $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  $user_id = $result['user_id'];
  $result = mysqli_fetch_assoc($query);
  $firstname = $result['firstname'];
  $lastname = $result['lastname'];
  $phone = $result['phone'];
  $email = $result['email'];
  $img = $result['image'];
  $opwd = $result['password'];
?>
<body>
    <div class="nav2">
        <?php echo '<h1>' . $firstname . ' ' . $lastname . ' / ' . 'Profile Setting' . '</h1>'  ?>
    </div>
    <div class="ed-box">
            <form method='post' enctype="multipart/form-data">
                <img src="manu.png" alt="" class='center'>
                <label for="fname"><b>Firstname</b></label><label for='lname'><b>Lastname</b></label><br>
                <input type="text" name="firstname" class="change-input-1" value="<?php echo($firstname) ?>" required>
                <input type="text" name="lastname" class="change-input-1" value="<?php echo($lastname) ?>" required><br>
                <label for="Phone"><b>Phone</b></label><br>
                <input type="text" name="phone" class="change-input-2" value="<?php echo($phone) ?>" required><br>
                <label for="email"><b>E-mail</b></label><br>
                <input type="email" name="email" class="change-input-2" value="<?php echo($email) ?>" required><br>
                <label for='uname'><b>Username</b></label><br>
                <input type="text" name="uname" class="change-input-2" value="<?php echo($username) ?>" required><br>
                <label for='opwd'><b>Old Password</b></label><br>
                <input type="password" name="opwd" class="change-input-2" required><br>
                <label for='npwd'><b>New Password</b></label><br>
                <input type="password" name="npwd" class="change-input-2" required><br>
                <input type="submit" value="Update">
            </form>
        </div>
        <script>
                function openForm() {
                  document.getElementById("myForm").style.display = "block";
                  document.getElementById("myNav").style.width = "100%";
                }
                
                function closeForm() {
                  document.getElementById("myForm").style.display = "none";
                  document.getElementById("myNav").style.width = "0%";
                }
        </script>
</body>
</html>

<script>
  function succes(){
    swal('Success!!', 'Your account have been update!', 'success')
    .then((value) => {
      location.href='?page=home';
    });
  };

  function invalid(){
    swal('Opps!', 'Invalid old password', 'error')
    .then((value) => {
      location.href='?page=edit';
    });
  }
</script>

<?php
  if (isset($_POST['npwd'])) {
    $opwd_i = $_POST['opwd'];
    if ($opwd == $opwd_i) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $username = $_POST['uname'];
      $password = $_POST['npwd'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      mysqli_query($conn, "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$password', email = '$email', phone = '$phone'  WHERE user_id = '$user_id'") or die(mysqli_error($conn));
      $_SESSION['username'] = $username;
      echo '<script type="text/javascript">',
        'succes();',
        '</script>'
      ;
    }
    else {
      echo '<script type="text/javascript">',
        'invalid();',
        '</script>'
      ;
    }
  }
?>