<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link css -->
    <link rel="stylesheet" href="src/css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="src/css/register.css">
    <link rel="stylesheet" href="src/css/change.css">
    <link rel="stylesheet" type="text/css" href="src/css/shopedit.css">
    <link rel="stylesheet" href="src/css/shopinfo.css">
    <link rel="stylesheet" type="text/css" href="src/css/create_shop.css">

    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- link css for template-->
    <link rel="stylesheet" type="text/css" href="src/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="src/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="src/css/component.css" />

    <!-- link sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="src/js/profile.js"></script>

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

    <!-- link sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- link Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .dropdown-toggle::after {
            display: none;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
        }
        /* body{
            background-image: url("src/img/background.jpg")
        } */
    </style>
</head>
<body>
  <?php
    // connect database
    $conn = mysqli_connect('localhost', 'root', '', 'group3') or die(mysqli_error($conn));

    // set charset utf8
    mysqli_set_charset($conn,"utf8");

    // start session
    session_start();
  ?>

  <?php include 'content/nav.php'; ?>

  <div>
    <!-- Content -->
    <?php
        if (!isset($_GET['page'])) {
            require_once 'content/index.php';
        } else {
            switch ($_GET['page']) {
                case 'signin':
                    require_once 'content/signin.php';
                    break;
                case 'logout':
                    require_once 'content/logout.php';
                    break;
                case 'register':
                    require_once 'content/register.php';
                    break;              
                case 'edit':
                    require_once 'content/change.php';
                    break;
               
                case 'books':
                    require_once 'content/books.php';
                    break;
                case 'shopedit':
                    require_once 'content/shopedit.php';
                    break;
                case 'shopinfo':
                    require_once 'content/shopinfo.php';
                    break;
                case 'create_shop':
                    require_once 'content/create_shop.php';
                    break;
                case 'delete':
                    require_once 'content/delete.php';
                    break;
                case 'delete_promo':
                    require_once 'content/delete_promo.php';
                    break;
                case 'checkreport';
                    require_once 'content/result_report.php';
                    break;
                default:
                    require_once 'content/index.php';
                break;
            }
        }
    ?>
  </div> 
</body>
</html>