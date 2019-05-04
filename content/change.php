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
                <label for='npwd'><b>New Proflie Picture</b></label><br>
                <div class="div-up">
                  <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
                </div>
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

<script src="src/js/profile.js"></script>
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
      if (isset($_FILES['image']['name'])){
        $imagename = 'src/img/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
        mysqli_query($conn, "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$password', email = '$email', phone = '$phone', image = '$imagename'  WHERE user_id = '$user_id'") or die(mysqli_error($conn));
        $_SESSION['username'] = $username;
        echo '<script type="text/javascript">',
          'succes();',
          '</script>'
        ;
      } else {
        mysqli_query($conn, "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$password', email = '$email', phone = '$phone'  WHERE user_id = '$user_id'") or die(mysqli_error($conn));
        $_SESSION['username'] = $username;
        echo '<script type="text/javascript">',
          'succes();',
          '</script>'
        ;
      }
    }
    else {
      echo '<script type="text/javascript">',
        'invalid();',
        '</script>'
      ;
    }
  }
?>