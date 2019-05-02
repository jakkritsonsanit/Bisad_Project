<?php
    $code = $_GET['code'];
    $shop_id = $_SESSION['shop_id'];
    mysqli_query($conn, "UPDATE block SET shop_id = '$shop_id' WHERE block_code = '$code' ") or die(mysqli_error($conn));
    echo "<script>
        location.href='?page=home'
    </script>"
?>