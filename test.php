<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<form method="POST" enctype="multipart/form-data">
    <input type="file" accept="image/*" name="image"  required/>
    <input type="submit">
</form>

<button id="button-a">test</button>

<script>
    $('#button-a').click(function(){
        swal('Good job!', 'You clicked the button!', 'success');
    })
</script>

<?php
    if (isset($_FILES['image'])) {
        $imagename = 'src/img/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
    }
?>