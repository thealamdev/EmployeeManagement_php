<?php
include('../../header.php');
?>

<?php
$dep_select = "SELECT * FROM department";
$dep_query = mysqli_query($connection, $dep_select);
$deps = mysqli_fetch_all($dep_query,true);
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
                        <th>Department Name</th>
                        <th>Department Title</th>
                        <th style="width:150px;">Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($deps as $dep) { ?>
                            <tr>
                                <td><?php echo $dep['id'] ?></td>
                                <td><?php echo $dep['dep_name'] ?></td>
                                <td><?php echo $dep['dep_title'] ?></td>
                                <td style="width:150px;">
                                    <a href="<?php echo $base ?>admin/department/edit_form.php?id=<?php echo $dep['id'] ?>" class="btn btn-info"><i class="las la-edit"></i></a>

                                    <form style="display:inline" action="<?php echo $base ?>admin/department/delete.php?id=<?php echo $dep['id'] ?>" method="POST">
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
if (empty($_SESSION['login'])) {
    header('location:http://localhost/EmpoyeeManagement/index.php');
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