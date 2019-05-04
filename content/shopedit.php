<body>
    <?php
        $username = $_SESSION['username'];
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $user_id = $result['user_id'];
        $result = mysqli_fetch_assoc($query);
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $shop_id = $_SESSION['shop_id'];
        $query_shop = mysqli_query($conn, "SELECT * FROM shop WHERE shop_id = '$shop_id'");
        $shop = mysqli_fetch_assoc($query_shop);
    ?>
    <div class="nav2">
        <?php echo '<h1>' . $firstname . ' ' . $lastname . ' / ' . 'Shop Setting' . '</h1>'  ?>
    </div>
    <div class="ed-box-edit">
            <form method='post' enctype="multipart/form-data">
                <label for='npwd'><b>New Shop Picture</b></label><br>
                <div class="div-up">
                  <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                  <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
                </div>
                <label for="Phone"><b>Shop Name</b></label><br>
                <input type="text" name="shopname" class="change-input-2" value="<?php echo($shop['name']) ?>" required><br>
                <label for="Phone"><b>Shop Info</b></label><br>
                <textarea name="shopinfo" id="" rows="6" class='txtar1' required><?php echo($shop['info']) ?></textarea>
                <input type="submit" class='submitinfo' value="Update">
            </form>
    </div>
</body>

<script src="src/js/profile.js"></script>
<script>
  function succes(){
    swal('Success!!', 'Your shop have been update!', 'success')
    .then((value) => {
      location.href='?page=home';
    });
  };
</script>

<?php
    if (isset($_POST['shopname'])) {
        $shopname = $_POST['shopname'];
        $shopinfo = $_POST['shopinfo'];
        if (isset($_FILES['image']['name'])){
            $imagename = 'src/img/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
            mysqli_query($conn, "UPDATE shop SET name = '$shopname', info = '$shopinfo', img = '$imagename'  WHERE shop_id = '$shop_id'") or die(mysqli_error($conn));
            echo '<script type="text/javascript">',
              'succes();',
              '</script>'
            ;
        } else {
            mysqli_query($conn, "UPDATE shop SET firstname = '$shopname', info = '$shopinfo'  WHERE shop_id = '$shop_id'") or die(mysqli_error($conn));
            echo '<script type="text/javascript">',
                'succes();',
                '</script>'
            ;
        }
    }
?>
    