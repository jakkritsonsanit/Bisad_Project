<?php
    $code = $_GET['code'];
    mysqli_query($conn, "UPDATE block SET shop_id = 1 WHERE block_code = '$code' ") or die(mysqli_error($conn));
    echo "<script>location.href='?page=home'</script>"
?>