<?php
	if (isset($_SESSION['shop_id'])) {
		$user_shopid = $_SESSION['shop_id'];
	}
	$code = $_GET['code'];
	$query = mysqli_query($conn, "SELECT shop_id FROM block WHERE block_code = '$code' ") or die(mysqli_error($conn));
	$shop_id = mysqli_fetch_array($query)[0];
	$query_shop = mysqli_query($conn, "SELECT * FROM shop WHERE shop_id = '$shop_id' ") or die(mysqli_error($conn));
	$shop = mysqli_fetch_assoc($query_shop);
	$user_id = $shop['user_id'];
	$query_phone = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id' ") or die(mysqli_error($conn));
	$phone = mysqli_fetch_assoc($query_phone)['phone'];
	$user_role = mysqli_fetch_assoc($query_phone)['role'];
	$query_promo = mysqli_query($conn, "SELECT * FROM promotion WHERE shop_id = '$shop_id' ") or die(mysqli_error($conn));
?>
<style>
	.w-100 {
		height: 100%;
		width: 100%!important;
	}
</style>

<script>
	function delete_shop() {
		location.href="?page=delete&code="+'<?php echo $code ?>';
	}
	function delete_promo(promo_id) {
		swal("", 'Delete this promotion ?', 'warning', {
			buttons: {
				cancel: true,
				yes: "Yes"
			},
		}).then((value) => {
			switch (value) {
				case "yes":
					swal('Success!!', 'Promotion has been delete', 'success').then((value) => {
						location.href = "?page=delete_promo&promo_id=" + promo_id + "&old_page=" + "<?php echo $_GET['page'].'&code='.$code ?>";
					})
					break;
				default:
					break;
			}
		});
	}
</script>
<body>
	<div class="container-top-shopinfo">
		<div class="code-name"><h2><?php echo "$code" ?></h2></div>
		<?php
			if (isset($user_shopid)) {
				if ($shop_id == $user_shopid or $user_role == 'manager') { ?>
					<div class="delete-shop-div">
						<button class="delete-shop-btn" type="button" onclick="delete_shop()">
							<span>
								Delete Shop
							</span>
						</button>
					</div>
				<?php }
			}
		?>
	</div>
	<div class=boxtop>
		<div class="container2">
			<div class="pic-shop">
				<img src="<?php echo $shop['img'] ?>" alt="Profile Picture">
			</div>
			<label for="shopnm" class='shopinfonm'><b>Shop Name</b></label><br>
			<div class='shopinfoinput'><?php echo $shop['name'] ?></div><br>
			<label for="Phone" class='shopinfophn'><b>Phone</b></label><br>
			<div class='inputphone'><?php echo $phone ?></div><br>
			<label class="infoabtshoptxt"><b>About Shop</b></label><br>
			<div class='inputinfo'><?php echo $shop['info'] ?></div>
		</div>
		<div class="container3">
			<label for="shopnm" class='promo-title'><b>Promotion</b></label><br>
			<?php
			while ($promo = mysqli_fetch_assoc($query_promo)) { ?>
				<div class="pic-promo" onclick="delete_promo('<?php echo $promo['promo_id'] ?>')">
					<img src="<?php echo $promo['img'] ?>" class="d-block w-100" alt="...">
				</div>
			<?php }
			if (isset($user_shopid)) {
				if ($shop_id == $user_shopid) { ?>
				<button class="add-pic-promo" data-toggle="modal" data-target="#AddPromoModal">
					<span><b>Add promotion</b></span>
				</button>
				<?php }
			}
			?>
			<!-- Modal -->
			<div class="modal fade" id="AddPromoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 id="exampleModalLabe">Add Promotion</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" id="addpromotion" enctype="multipart/form-data">
								<div class="report-box">
								<input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
								<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" form="addpromotion" value="submit">Add</button>
						</div>
					</div>
				</div>
			</div>
			<script>
			$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').trigger('focus')
			})
			</script>
		</div>
	</div>
</body>
<script src="src/js/profile.js"></script>

<?php
	if (isset($_FILES['image']['name'])) {
		$imagename = 'src/img/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
		mysqli_query($conn, "INSERT INTO promotion (shop_id, img) value ('$shop_id', '$imagename')") or die(mysqli_error($conn));
		echo "<script>location.href='?page=shopinfo&code=$code'</script>" ;
	}
?>