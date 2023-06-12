<?php
include('../../header.php');
$dep_select = "SELECT * FROM department";
$dep_query = mysqli_query($connection, $dep_select);
$deps = mysqli_fetch_all($dep_query, true);

$role_select = "SELECT * FROM role where role_name != 'super-admin'";
$role_query = mysqli_query($connection, $role_select);
$roles = mysqli_fetch_all($role_query, MYSQLI_ASSOC);
?>
<?php
if (!empty($_SESSION['login']) && $_SESSION['role'] == 'super-admin') { ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="index.php" class="btn btn-primary" title="List"><i class="las la-stream"></i></a>
                <a href="create.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
            </div>
            <div class="card-body">
                <form action="<?php echo $base ?>admin/employee/employee_insert.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Employee Username</label>
                                <input type="text" class="form-control" name="username">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="emp_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" name="emp_name">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="emp_department" class="form-label">Employee Department</label>
                                <select name="emp_department" class="form-control">
                                    <option selected disabled>Select Department</option>
                                    <?php foreach ($deps as $dep) { ?>
                                        <option value="<?php echo $dep['id'] ?>"><?php echo $dep['dep_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="emp_email" class="form-label">Employee Email</label>
                                <input type="text" class="form-control" name="emp_email">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="emp_phone" class="form-label">Employee Phone</label>
                                <input type="tel" class="form-control" name="emp_phone">
                                <div class="form-text"></div>
                            </div>

                            <button onClick="this.form.submit(); this.disabled=true; this.value='Sending…'; " type="submit" name="submit" class="btn btn-primary">Add</button>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Employee Password</label>
                                <input type="password" class="form-control" name="password">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="emp_address" class="form-label">Employee Address</label>
                                <input type="text" class="form-control" name="emp_address">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="blood_group" class="form-label">Blood Group</label>
                                <input type="text" class="form-control" name="blood_group">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" name="dob">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Employee Department</label>
                                <select name="role" class="form-control">
                                    <option selected disabled>Select Role</option>
                                    <?php foreach ($roles as $role) { ?>
                                        <option required value="<?php echo $role['role_name'] ?>"><?php echo $role['role_name'] ?></option>
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