<?php
$promo_id = $_GET['promo_id'];
$old_page = $_GET['old_page'];
$code = $_GET['code'];
mysqli_query($conn, "DELETE FROM promotion WHERE promo_id = '$promo_id' ") or die(mysqli_error($conn));
echo "<script>location.href='?page=$old_page&code=$code'</script>";
?>