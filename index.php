<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link css -->
    <link rel="stylesheet" href="src/css/mystyle.css">

    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- link Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Nav -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
    <a class="navbar-brand" href="#">Home</a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">				
      </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">REPORT</a>
        </li>	
        <li class="nav-item">
            <a class="nav-link" href="#">SIGN UP</a>
        </li>		
        <li class="nav-item">
            <a class="nav-link" href="?page=signin">SIGN IN</a>
        </li>		
        <li class="nav-item dropdown" style="float: right;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            USER
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -71% !important">
            <a class="dropdown-item" href="#">Acount Setting</a>
            <a class="dropdown-item" href="#">Shop Setting</a>
            <a class="dropdown-item" href="#">Log Out</a>
          </div>
        </li>	
      </ul>
    </div>
  </nav>

  <div>
    <!-- Content -->
    <?php
        if (!isset($_GET['page'])) {
            require_once 'content/index.html';
        } else {
            switch ($_GET['page']) {
                case 'signin':
                    require_once 'content/signin.html';
                    break;
                // case 'register':
                //     require_once 'content/register.php';
                //     break;
                // case 'logout':
                //     require_once 'content/logout.php';
                //     break;
                // case 'gallery':
                //     require_once 'content/gallery.php';
                //     break;
                // case 'gaygee':
                //     require_once 'content/gaygee.php';
                //     break;
                // case 'jinda':
                //     require_once 'content/jinda.php';
                //     break;
                // case 'upload':
                //     require_once 'content/upload.php';
                //     break;
                // case 'v-condo':
                //     require_once 'content/v-condo.php';
                //     break;
                default:
                    require_once 'content/index.php';
                break;
            }
        }
    ?>
  </div> 
</body>
</html>