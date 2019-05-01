<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- link css -->
    <link rel="stylesheet" href="src/css/change.css">

    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- link Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
        <a class="navbar-brand" href="#">Home</a>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">				
          </ul>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link open-button" onclick="openForm()">REPORT</a>
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
      <div id='myNav' class="overlay">
            <div class="form-popup" id="myForm">
                <form action="/action_page.php" class="form-container">
                <h1>Report</h1>
                <button type="button" class="close bg-dark" aria-label="Close" onclick="closeForm()">
                    <span aria-hidden="true">&times;</span>
                </button>
                <textarea name="desc" id="desc" placeholder="Write here.." style="height:250px"></textarea>
                <input type="submit">
                </form>
            </div>
          </div>
    <div class="nav2">
        <h1>Steve Cartoon/Profile Setting</h1>
    </div>
    <div class="box">
            <form action="">
                <img src="manu.png" alt="" class='center'>
                <label for="fname"><b>Firstname</b></label><label for='lname'><b>Lastname</b></label><br>
                <input type="text" name="First name">
                <input type="text" name="Last name"><br>
                <label for="Phone"><b>Phone</b></label><br>
                <input type="text" name="Phone"><br>
                <label for="email"><b>E-mail</b></label><br>
                <input type="email" name="Email"><br>
                <label for='uname'><b>Username</b></label><br>
                <input type="text" name="uname"><br>
                <label for='npwd'><b>New Password</b></label><br>
                <input type="text" name="npwd"><br>
                <label for='opwd'><b>Old Password</b></label><br>
                <input type="text" name="opwd"><br>
                <input type="submit">
            </form>
        </div>
        <script>
                function openForm() {
                  document.getElementById("myForm").style.display = "block";
                  document.getElementById("myNav").style.width = "100%";
                }
                
                function closeForm() {
                  document.getElementById("myForm").style.display = "none";
                  document.getElementById("myNav").style.width = "0%";
                }
        </script>
</body>
</html>