<?php
include('../../header.php');
?>

<?php
$user_select = "SELECT * FROM users WHERE username != 'superadmin'";
$user_query = mysqli_query($connection, $user_select);
$users = mysqli_fetch_all($user_query, MYSQLI_ASSOC);


?>


<?php if (!empty($_SESSION['login'])) {
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="create.php" class="btn btn-primary" title="Create"><i class="las la-plus-circle"></i></a>
                <a href="index.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
            </div>

            <div class="card-body">
                <table class="table table-striped hover">
                    <thead>
                        <th>Id</th>
                        <th>Employee Username</th>
                        <th>Employee Role</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['id'] ?></td>
                                <td><?php echo $user['username'] ?></td>
                                <td><?php echo $user['role'] ?></td>

                                <td>
                                    <a href="<?php echo $base ?>admin/permissions/add_form.php?id=<?php echo $user['id'] ?>" class="btn btn-success"><i class="las la-plus-circle"></i></a>

                                    <a href="<?php echo $base ?>admin/permissions/update_form.php?id=<?php echo $user['id'] ?>" class="btn btn-info"><i class="las la-edit"></i></a>

                                    <form style="display:inline" action="<?php echo $base ?>admin/permissions/delete.php?id=<?php echo $user['id'] ?>" method="POST">
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
include('../../footer.php');
?>


<script>
    $(document).ready(function() {
        $('.delete_btn').on('click', function() {
            if (confirm("Are you sure ?? ")) {
                $(this).closest('form').submit();
            }
        })
    });
</script>