<?php
    $query = mysqli_query($conn, "SELECT report.info, report.date, report.time, user.username, user.role, user.phone FROM report INNER JOIN user ON report.user_id = user.user_id") or die(myslqi_error($conn));
    
?>
<style>
</style>

<table class="table table-striped">
    <tr>
        <th>username</th>
        <th>Report</th> 
        <th>Role</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
    <?php
    while ($result = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?php echo$result['username'] ?></td>
            <td><?php echo$result['info'] ?></td>
            <td><?php echo$result['role'] ?></td>
            <td><?php echo$result['phone'] ?></td>
            <td><?php echo$result['date'] ?></td>
            <td><?php echo$result['time'] ?></td>
        </tr>
    <?php } 
    ?>
</table>