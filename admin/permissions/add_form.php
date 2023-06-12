<?php
include('../../header.php');
$id = $_GET['id'];
$employees_all = "SELECT *,employee.id FROM employee INNER JOIN users ON employee.user_id = users.id WHERE employee.user_id = $id";
$employees_query = mysqli_query($connection,$employees_all);
$employees = mysqli_fetch_assoc($employees_query);

$dep_select = "SELECT * FROM department";
$dep_query = mysqli_query($connection, $dep_select);
$deps = mysqli_fetch_all($dep_query, true);

$role_get = "SELECT id,role_name,role_description FROM role WHERE id = $id";
$role_get_query = mysqli_query($connection,$role_get);
$role = mysqli_fetch_assoc($role_get_query);

$role_select = "SELECT * FROM role where role_name != 'super-admin'";
$role_query = mysqli_query($connection, $role_select);
$roles = mysqli_fetch_all($role_query, MYSQLI_ASSOC);

$users_select = "SELECT * FROM users where id = $id";
$users_query = mysqli_query($connection, $users_select);
$users = mysqli_fetch_assoc($users_query);
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
                <form action="<?php echo $base ?>admin/permissions/add.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" name="user_id" value="<?php echo $id ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Employee Username</label>
                                <input type="text" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="username" value="<?php if(!empty($employees)){echo $employees['username'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="emp_name" class="form-label">Employee Name</label>
                                <input type="text" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="emp_name" value="<?php if(!empty($employees)){echo $employees['emp_name'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="emp_department" class="form-label">Employee Department</label>
                                <select name="emp_department" class="form-control">
                                    <option selected <?php if(!empty($employees)){echo "disabled";} ?> disabled>Select Department</option>
                                    <?php foreach ($deps as $dep) { ?>
                                        
                                        <option <?php if(!empty($employees) && $dep['id'] == $employees['emp_department']){?>
                                            <?php
                                            echo "selected";
                                        } ?> value="<?php echo $dep['id'] ?>"><?php echo $dep['dep_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="emp_email" class="form-label">Employee Email</label>
                                <input type="text" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="emp_email" value="<?php if(!empty($employees)){echo $employees['emp_email'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="emp_phone" class="form-label">Employee Phone</label>
                                <input type="tel" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="emp_phone" value="<?php if(!empty($employees)){echo $employees['emp_phone'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            

                            <button type="submit" <?php if(!empty($employees)){echo "disabled";} ?> name="submit" class="btn btn-primary">Update</button>
                        </div>

                        <div class="col-lg-6">
                            
                            <div class="mb-3">
                                <label for="emp_address" class="form-label">Employee Address</label>
                                <input type="text" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="emp_address" value="<?php if(!empty($employees)){echo $employees['emp_address'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input type="text" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="zip_code" value="<?php if(!empty($employees)){echo $employees['zip_code'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="blood_group" class="form-label">Blood Group</label>
                                <input type="text" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="blood_group" value="<?php if(!empty($employees)){echo $employees['blood_group'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input type="date" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control" name="dob" value="<?php if(!empty($employees)){echo $employees['dob'];} ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Employee Role</label>
                                <select name="role" <?php if(!empty($employees)){echo "disabled";} ?> class="form-control">
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