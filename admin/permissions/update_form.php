<?php
include('../../header.php');
$id = $_GET['id'];

$role_get = "SELECT id,role_name,role_description FROM role WHERE id = $id";
$role_get_query = mysqli_query($connection,$role_get);
$role = mysqli_fetch_assoc($role_get_query);

$users_select = "SELECT * FROM users where id = $id";
$users_query = mysqli_query($connection, $users_select);
$users = mysqli_fetch_assoc($users_query);

// print_r($users);
// die();

$role_select = "SELECT * FROM role where role_name != 'super-admin'";
$role_query = mysqli_query($connection, $role_select);
$roles = mysqli_fetch_all($role_query, MYSQLI_ASSOC);
?>
<?php
if (!empty($_SESSION['login'])) { ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="index.php" class="btn btn-primary" title="List"><i class="las la-stream"></i></a>
                <a href="update_form.php?id=<?=$id ?>" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
            </div>
            <div class="card-body">
                <form action="<?php echo $base ?>admin/permissions/update.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" name="emp_id" value="<?php echo $id ?>">
                            <div class="mb-3">
                                <label for="role" class="form-label">Employee Role</label>
                                <select name="role" class="form-control">
                                    <option selected disabled>Select Role</option>
                                    <?php foreach ($roles as $role) { ?>
                                        <option <?php if(!empty($users) && $role['role_name'] == $users['role']){?>
                                            <?php
                                            echo "selected";
                                        } ?> required value="<?php echo $role['role_name'] ?>"><?php echo $role['role_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>

<?php
} ?>

<?php
if (empty($_SESSION['login'])) {
    header('location:http://localhost/EmpoyeeManagement/index.php');
} ?>


<?php
include('../../footer.php');
?>