<style>
  .btn-primary {
    color: #fff;
    background-color: #FE8160;
    border-color: #FE8160;
  }
  .btn-primary:hover {
    color: #fff;
    background-color: #f97754;
    border-color: #f97754;
  }
</style>
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
      <!-- add block -->
      <?php
        if (isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
          $query = mysqli_query($conn, "SELECT role FROM user WHERE username = '$username'") or die(mysqli_error($conn));
          $result = mysqli_fetch_array($query);
          $role = $result[0];
          if ($role == "manager") {
            if ($count % 2 == 1) {
              $ml = "";
            }
            if ($count % 2 == 0) {
              $ml = "style='margin-left:0'";
            } ?>
            <button class="card-act-add" data-target="#exampleModal" data-toggle="modal" <?php echo($ml) ?> id="div-add">
              <img src="src/img/add.png" class="add-icon">
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width:400px">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new block</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="padding: 1rem 1.8rem;">
                    <form method="post" id="form1">
                      <div class="form-group modal-form">
                        <label for="block_code" class="modal-label">Block Code</label>
                        <input type="text" class="form-control" id="block_code" name="block_code">
                      </div>
                      <div class="form-group modal-form">
                        <label for="price" class="modal-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="form1" value="submit">Ok</button>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        }
      ?>
      <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text("Create new block")
          modal.find('.modal-body input').val(recipient)
        });
        function success(){
          swal('Success!!', 'Block is created!', 'success')
          .then((value) => {
            location.href='?page=home';
          });
        };
        function invalid(){
          swal('Opps!', 'Block code is taken', 'warning')
          .then((value) => {
            location.href='?page=signin';
          });
        };
      </script>
  </div>
</body>
    
<?php
  if (isset($_POST['block_code'])) {
    $code = $_POST['block_code'];
    $price = $_POST['price'];
    $query = mysqli_query($conn, "SELECT block_code FROM block WHERE block_code = '$code'");
    if ($result = mysqli_fetch_assoc($query)) {
      echo '<script type="text/javascript">',
				'invalid();',
				'</script>'
			;
    }
    else {
      mysqli_query($conn, "INSERT INTO block (block_code, shop_id, price) value ('$code', 1, '$price')") or die(mysqli_error($conn));
      echo '<script type="text/javascript">',
				'success();',
				'</script>'
			;
    }
  }
?>