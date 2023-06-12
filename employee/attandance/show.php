<?php
include('../../header.php');
?>

<?php
$id = $_SESSION['login'];

$att = "SELECT a.created_at as present,  a.id as ID ,a.id,u.username as name FROM `attandance` as a INNER JOIN users as u ON a.user_id = u.id WHERE user_id = $id";

$attendance_query = mysqli_query($connection, $att);
$attendances = mysqli_fetch_all($attendance_query, true);

// print_r($attendances);

?>
<?php if (!empty($_SESSION['login']) && $_SESSION['role'] == 'admin') {
?>
    <!-- main content  -->
    <?php if (!empty($_SESSION['login'])) {
    ?>
        <div class="container">
            
            <div class="card">
                <div class="card-header">
                    <a href="create.php" class="btn btn-primary" title="Create"><i class="las la-plus-circle"></i></a>
                    <a href="show.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
                </div>

                <div class="card-body">
                    <table class="table table-striped hover">
                        <thead>
                            <th>Id</th>
                            <th>Employee Name</th>
                            <th>Present Time</th>
                            <th style="width:150px;">Actions</th>
                        </thead>

                        <tbody>
                            <?php foreach ($attendances as $attendance) { ?>
                                <tr>
                                    <td><?php echo $attendance['ID'] ?></td>
                                    <td><?php echo $attendance['name'] ?></td>
                                    <td><?php echo $attendance['present'] ?></td>
                                    <td style="width:150px;">
                                        <a href="<?php echo $base ?>admin/department/edit_form.php?id=<?php echo $attendance['id'] ?>" class="btn btn-info"><i class="las la-edit"></i></a>

                                        <form style="display:inline" action="<?php echo $base ?>admin/department/delete.php?id=<?php echo $attendance['id'] ?>" method="POST">
                                            <button type="button" class="btn btn-danger delete_btn">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            <?php
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
<?php
}
?>

<?php
if (empty($_SESSION['login'])) {
    header('location:http://localhost/EmpoyeeManagement/index.php');
}
?>



<?php
include('../../footer.php');
?>