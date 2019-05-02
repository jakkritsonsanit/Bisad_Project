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
    <div class="boxedit">
            <img src="src/img/profile.jpg" alt="" class='center1'>
            <form action="">
                    <label class='shopnm15'>Shop Name</label><br>
                    <input type="text"  class='input1'><br>
                    <label  class='abshop15'>About Shop</label><br>
                    <textarea name="" id="" cols="10" rows="15" class='txtar1'></textarea><br>
                    <label for="promo" class='promo1'><b>Promotions</b></label><br>
                        <div class="column">
                            <img src="src/img/profile.jpg" class='arr' alt="promo1">
                        </div>
                        <div class="column">
                                <img src="src/img/palmdeath.jpg" class='arr' alt="promo2">
                        </div>
                        <div class="column">
                                <img src="src/img/profile.jpg" class='arr' alt="promo3">
                        </div>
                    <input type="submit" class='submitinfo'>
            </form>
    </div>
    <script>

    </script>
</body>