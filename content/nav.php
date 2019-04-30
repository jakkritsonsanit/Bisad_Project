<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-nav">
    <a class="navbar-brand" href="?page=home" style="margin-left:50px">Home</a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">				
      </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['username'])):?>
            <li class="nav-item">
                <a class="nav-link" href="#">REPORT</a>
            </li>
        <?php endif ?>

        <?php if (!isset($_SESSION['username'])):?>
            <li class="nav-item">
                <a class="nav-link" href="#">SIGN UP</a>
            </li>		
            <li class="nav-item">
                <a class="nav-link" href="?page=signin">SIGN IN</a>
            </li>
        <?php endif ?>
        <?php if (isset($_SESSION['username'])):?>
            <li class="nav-item dropdown" style="float: right;">
            <a class="nav-link dropdown-toggle" style="padding-bottom:0 !important" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- USER -->
                <img class="img-pro" src="src/img/profile.jpg">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -120% !important">
                <a class="dropdown-item" href="#">Acount Setting</a>
                <a class="dropdown-item" href="#">Shop Setting</a>
                <a class="dropdown-item" href="?page=logout">Log Out</a>
            </div>
            </li>
        <?php endif ?>
      </ul>
    </div>
  </nav>