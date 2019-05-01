<form method="POST" enctype="multipart/form-data">
    <input type="file" accept="image/*" name="image"  required/>
    <input type="submit">
</form>
<?php
    if (isset($_FILES['image'])) {
        $imagename = 'src/img/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
    }
?>