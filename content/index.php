<body>
  <!-- carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="src/img/PM1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="src/img/PM2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="src/img/PM3.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- content -->
  <div class="con">
      <?php
        $count = 1;
        $query = mysqli_query($conn, "select * from block");
        while($result = mysqli_fetch_assoc($query)) {
          
          $name_query = mysqli_query($conn, "select name from shop where shop_id =".$result['shop_id']) or die(mysqli_error($query));
          $result_name = mysqli_fetch_assoc($name_query);
          $name = $result_name['name'];
          if ($count % 2 == 1) {
            $ml = "";
          }
          if ($count % 2 == 0) {
            $ml = "style='margin-left:0'";
          }
          if ($name == "EMPTY") {
            $bg = "emp-card";
          }
          else {
            $bg = "";
          }
          ?>
          <div class="card-act <?php echo($bg) ?>" <?php echo($ml) ?> >
            <div class="nav-code"><?php echo($result['block_code']) ?></div>
            <div class="t-incard"><?php echo($name) ?></div>
          </div>
        <?php 
            $count++;
          } 
      ?>
  </div>
</body>
    
