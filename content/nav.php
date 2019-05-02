<?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $result = mysqli_fetch_assoc($query);
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
                <a class="nav-link" href="#">REPORT</a>
            </li>
        <?php endif ?>

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