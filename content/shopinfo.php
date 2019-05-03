<style>
	.carousel-indicators {
		margin-top:30px;
    	position: unset !important;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 15;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-pack: center;
		justify-content: center;
		padding-left: 0;
		margin-right: 15%;
		margin-left: 15%;
		list-style: none;
	}
	.carousel-indicators li {
		box-sizing: content-box;
		-ms-flex: 0 1 auto;
		flex: 0 1 auto;
		width: 30% !important;
		height: 3px;
		margin-right: 3px;
		margin-left: 3px;
		text-indent: -999px;
		cursor: pointer;
		background-color: #fff;
		background-clip: padding-box;
		border-top: 10px solid transparent;
		border-bottom: 10px solid transparent;
		opacity: .5;
		transition: opacity .6s ease;
	}
</style>
<?php
	if (isset($_SESSION['shop_id'])) {
		$user_shopid = $_SESSION['shop_id'];
	}
	$promo_img = [];
	$code = $_GET['code'];
	$query = mysqli_query($conn, "SELECT shop_id FROM block WHERE block_code = '$code' ") or die(mysqli_error($conn));
	$shop_id = mysqli_fetch_array($query)[0];
	$query_shop = mysqli_query($conn, "SELECT * FROM shop WHERE shop_id = '$shop_id' ") or die(mysqli_error($conn));
	$shop = mysqli_fetch_assoc($query_shop);
	$user_id = $shop['user_id'];
	$query_phone = mysqli_query($conn, "SELECT phone FROM user WHERE user_id = '$user_id' ") or die(mysqli_error($conn));
	$phone = mysqli_fetch_array($query_phone)[0];
	$query_promo = mysqli_query($conn, "SELECT img FROM promotion WHERE shop_id = '$shop_id' ") or die(mysqli_error($conn));
	while ($promo = mysqli_fetch_array($query_promo)) {
		array_push($promo_img, $promo[0]);
	};
	// echo "<script>alert('$promo')</script>";
?>

<script>
	function delete_shop() {
		location.href="?page=delete&code="+'<?php echo $code ?>';
	}
</script>
<body>
	<div class="container-top-shopinfo">
		<div class="code-name"><h2><?php echo "$code" ?></h2></div>
		<?php
			if (isset($user_shopid)) {
				if ($shop_id == $user_shopid) { ?>
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
			<label for="shopnm" class='shopinfonm'><b>Shop Name</b></label><br>
			<div class='shopinfoinput'><?php echo $shop['name'] ?></div>
			<label for="Phone" class='shopinfophn'><b>Phone</b></label><br>
			<div class='inputphone'><?php echo $phone ?></div>
			<label class="infoabtshoptxt"><b>About Shop</b></label><br>
			<div class='inputinfo'><?php echo $shop['info'] ?></div>
		</div>
		<div class="container3">
			<img src="<?php echo $shop['img'] ?>" alt="">
		</div>
		<div class="infoabtshop">
			
		</div>
	</div>
	<?php 
		if (isset($promo_img[0])) { ?>
			<div class="boxbottom">
				<div class="container my-4">
					<!--Carousel Wrapper-->
					<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
						<!--Slides-->
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
							<img class="d-block w-100" src="<?php echo $promo_img[0] ?>" alt="First slide">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="<?php echo $promo_img[1] ?>" alt="Second slide">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="<?php echo $promo_img[2] ?>" alt="Third slide">
							</div>
						</div>
						<!--/.Slides-->
						<!--Controls-->
						<a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<!--/.Controls-->
						<ol class="carousel-indicators">
							<li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="<?php echo $promo_img[0] ?>"
								class="img-fluid"></li>
							<li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100" src="<?php echo $promo_img[1] ?>"
								class="img-fluid"></li>
							<li data-target="#carousel-thumb" data-slide-to="2"><img class="d-block w-100" src="<?php echo $promo_img[2] ?>"
								class="img-fluid"></li>
						</ol>
					</div>
					<!--/.Carousel Wrapper-->
				</div>
			</div>
		<?php };
	?>
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		showSlides(slideIndex = n);
		}

		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("demo");
			if (n > slides.length) {slideIndex = 1}
			if (n < 1) {slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";
			dots[slideIndex-1].className += " active";
		}
	</script>
</body>