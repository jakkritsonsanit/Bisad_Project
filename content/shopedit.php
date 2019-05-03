
<body>
    <?php
        $username = $_SESSION['username'];
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $user_id = $result['user_id'];
        $result = mysqli_fetch_assoc($query);
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $shop_id = $_SESSION['shop_id'];
        $query_shop = mysqli_query($conn, "SELECT * FROM shop WHERE shop_id = '$shop_id'");
        $shop = mysqli_fetch_assoc($query_shop);
    ?>
    <div class="nav2">
        <?php echo '<h1>' . $firstname . ' ' . $lastname . ' / ' . 'Shop Setting' . '</h1>'  ?>
    </div>
    <div class="ed-box">
            <!-- <img src="src/img/profile.jpg" alt="" class='center1'> -->
            <!-- Picture Profile -->

            
            <form action="">
                <label for="Phone"><b>Shop Name</b></label><br>
                <input type="text" name="shopname" class="change-input-2" value="<?php echo($shop['name']) ?>" required><br>
                <label for="email"><b>Shop Info</b></label><br>
                <textarea name="shopinfo" id="" rows="6" class='txtar1' required><?php echo($shop['info']) ?></textarea><br>
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
                <input type="submit" class='submitinfo' value="Update">
            </form>
    </div>
    <script>

    </script>
</body>