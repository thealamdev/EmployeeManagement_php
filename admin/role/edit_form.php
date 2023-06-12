<?php
include('../../header.php');

$id = $_GET['id'];
$role_get = "SELECT id,role_name,role_description FROM role WHERE id = $id";
$role_get_query = mysqli_query($connection,$role_get);
$role = mysqli_fetch_assoc($role_get_query);
// print_r($role);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="index.php" class="btn btn-primary" title="List"><i class="las la-stream"></i></a>
            <a href="create.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
        </div>
        <div class="card-body">

            <form action="role_edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $role['id'] ?>">
                <div class="mb-3">
                    <label for="role_name" class="form-label">Role Name</label>
                    <input type="text" class="form-control" name="role_name" value="<?php echo $role['role_name'] ?>">
                    <div class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">Role Description</label>
                    <textarea name="role_description" cols="30" rows="10" class="form-control"><?php echo $role['role_description'] ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>
        </div>

    </div>
</div>



<?php
include('../../footer.php');
?>