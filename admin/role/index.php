<?php
include('../../header.php');
?>

<?php
$role_select = "SELECT * FROM role WHERE role_name != 'super-admin'";
$role_query = mysqli_query($connection, $role_select);
$roles = mysqli_fetch_all($role_query, MYSQLI_ASSOC);
?>

<?php if(!empty($_SESSION['login'])){
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
                    <th>Role Name</th>
                    <th>Role Description</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    <?php foreach ($roles as $role) { ?>
                        <tr>
                            <td><?php echo $role['id'] ?></td>
                            <td><?php echo $role['role_name'] ?></td>
                            <td><?php echo $role['role_description'] ?></td>
                            <td>
                                <a href="<?php echo $base ?>admin/role/edit_form.php?id=<?php echo $role['id'] ?>" class="btn btn-info"><i class="las la-edit"></i></a>
                                
                                <form style="display:inline" action="<?php echo $base ?>admin/role/delete.php?id=<?php echo $role['id'] ?>" method="POST">
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
        $('.delete_btn').on('click',function(){
            if(confirm("Are you sure ?? ")){
                $(this).closest('form').submit();
            }
        })
    });
</script>