<?php
include('../../header.php');
?>
 
<?php
$emp_select = "SELECT *,employee.id FROM employee  inner JOIN users  ON employee.user_id = users.id";
$emp_query = mysqli_query($connection, $emp_select);
$employees = mysqli_fetch_all($emp_query, MYSQLI_ASSOC);


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
                        <th>Employee Name</th>
                        <th>Employee Username</th>
                        <th>Employee Role</th>
                        <th>Employee Email</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($employees as $employee) { ?>
                            <tr>
                                <td><?php echo $employee['user_id'] ?></td>
                                <td><?php echo $employee['emp_name'] ?></td>
                                <td><?php echo $employee['username'] ?></td>
                                <td><?php echo $employee['role'] ?></td>
                                <td><?php echo $employee['emp_email'] ?></td>
                                <td>
                                    <a href="<?php echo $base ?>admin/employee/update_form.php?id=<?php if(!empty($employee['user_id'])){echo $employee['user_id'];} ?>&emp_id=<?php echo $employee['id']?>" class="btn btn-info"><i class="las la-edit"></i></a>

                                    <form style="display:inline" action="<?php echo $base ?>admin/employee/delete.php?id=<?php echo $employee['user_id'] ?>" method="POST">
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