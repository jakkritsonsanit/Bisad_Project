<?php
    $query = mysqli_query($conn, "SELECT report.info, user.username, user.role, user.phone FROM report INNER JOIN user ON report.user_id = user.user_id") or die(myslqi_error($conn));
    
?>
<style>
</style>

<table class="table table-striped">
    <tr>
        <th>username</th>
        <th>Report</th> 
        <th>Role</th>
        <th>Phone</th>
    </tr>
    <?php
    while ($result = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?php echo$result['username'] ?></td>
            <td><?php echo$result['info'] ?></td>
            <td><?php echo$result['role'] ?></td>
            <td><?php echo$result['phone'] ?></td>
        </tr>
    <?php } 
    ?>
</table>