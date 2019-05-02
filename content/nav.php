<?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'") or die(mysqli_error($conn));
        $result = mysqli_fetch_assoc($query);
        $user_id = $result['user_id'];
        $role = $result['role'];
        $img = $result['image'];
    }
?>

<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-nav">
    <a class="navbar-brand" href="?page=home" style="margin-left:50px">Home</a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">				
      </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="?page=shopinfo">Shopinfo</a>
        </li>
        <?php if (isset($username)):?>
            <li class="nav-item">
                <button class="nav-link" data-toggle="modal" data-target="#ReportModal" type="button">REPORT</button>
            </li>
        <?php endif ?>
        <div class="modal fade" id="ReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabe">Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="reportform">
                        <div class="report-box">
                            <textarea placeholder="Write here" name="report"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="reportform" value="submit">Send message</button>
                </div>
                </div>
            </div>
        </div>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        </script>

        <?php if (!isset($username)):?>
            <li class="nav-item">
                <a class="nav-link" href="?page=register">SIGN UP</a>
            </li>		
            <li class="nav-item">
                <a class="nav-link" href="?page=signin">SIGN IN</a>
            </li>
        <?php endif ?>
        <?php if (isset($username)):?>
            <li class="nav-item dropdown" style="float: right;">
            <a class="nav-link dropdown-toggle" style="padding-bottom:0 !important" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- USER -->
                
                <img class="img-pro" src="<?php echo($img) ?>">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -215% !important">
                <a class="dropdown-item" href="#"><?php echo($username) ?></a>
                <a class="dropdown-item" href="?page=edit">Account Setting</a>
                <?php if ($role == "merchant") :?>
                    <a class="dropdown-item" href="?page=shopedit">Shop Setting</a>
                <?php endif ?>
                <a class="dropdown-item" href="?page=logout">Log Out</a>
            </div>
            </li>
        <?php endif ?>
      </ul>
    </div>
  </nav>

    <script>
            function success(){
                swal('Success!!', 'Thank you for your report', 'success');
            };
    </script>

  <!-- Send Report -->
  <?php
    if (isset($_POST['report'])) {
        $report = $_POST['report'];
        mysqli_query($conn, "INSERT INTO report (info, user_id) value ('$report', '$user_id')") or die(mysqli_error($conn));
        echo '<script type="text/javascript">',
            'success();',
            '</script>'
        ;
    }