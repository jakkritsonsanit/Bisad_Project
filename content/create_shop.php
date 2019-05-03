<?php
	$username = $_SESSION['username'];
	$query_userid = mysqli_query($conn, "SELECT user_id FROM user WHERE username = '$username' ") or die(mysqli_error($conn));
	$user_id = mysqli_fetch_array($query_userid)[0]; 
?>
<body>
	<div class="container-box">
		<div class="content-box">
			<form class="cre-shop-form" method='post' enctype="multipart/form-data" id="form-shop">
				<span class="form-title">Create Your Shop</span>
				<div class="input-shop bg1">
					<span class="label-shop-input">Shop name</span>
					<input class="input-shop-box" type="text" name="shopname">
				</div>
				<div class="input-shop">
					<span class="label-shop-input">About Shop</span>
					<textarea rows="5" cols="50" name="shopinfo" class="shop-textare"></textarea>
				</div>
				<div class="div-up">
					<input type="file" accept="image/*" name="image" id="file-1" class="inputfile inputfile-1" required/>
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
					<label class="up-pig">อัพโหลดรูปภาพ</label>
				</div>
				<div class="container-contact100-form-btn">
          			<button class="contact100-form-btn" type="submit" form="form-shop" value="submit">
						<span>Create Shop</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</body>

<script>
  function success(){
    swal('Success!!', 'You account is created!', 'success')
    .then((value) => {
      location.href='?page=home';
    });
  };
</script>
<?php
	if (isset($_POST['shopname'])) {
		$shopname = $_POST['shopname'];
		$shopinfo = $_POST['shopinfo'];
		$imagename = 'src/img/'.date('Y-m-d-h-s').$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
		mysqli_query($conn, "INSERT INTO shop (user_id, name, info, img) value ('$user_id', '$shopname', '$shopinfo', '$imagename')") or die(mysqli_error($conn));
		echo "<script> success() </script>";
	}
?>
