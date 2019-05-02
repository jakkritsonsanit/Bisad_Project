<body>
    <?php
        $username = $_SESSION['username'];
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $user_id = $result['user_id'];
        $result = mysqli_fetch_assoc($query);
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
    ?>
    <div class="nav2">
        <?php echo '<h1>' . $firstname . ' ' . $lastname . ' / ' . 'Profile Setting' . '</h1>'  ?>
    </div>
    <div class="box">
            <img src="manu.png" alt="" class='center'>
            <form action="">
                    <label for="shopnm1"><b>Shop Name</b></label><br>
                    <input type="text"  class='input1'><br>
                    <label for="abshop1"><b>About Shop</b></label><br>
                    <textarea name="" id="" cols="10" rows="15" class='txtar1'></textarea><br>
                    <label for="promo" class='promo1'><b>Promotions</b></label><br>
                    <div class="row">
                        <div class="column">
                            <img src="manu.png" alt="promo1" style="width:100%">
                        </div>
                        <div class="column">
                                <img src="manu.png" alt="promo2" style="width:100%">
                        </div>
                        <div class="column">
                                <img src="manu.png" alt="promo3" style="width:100%">
                        </div>
                    </div>
                    <input type="submit">
            </form>
    </div>
</body>