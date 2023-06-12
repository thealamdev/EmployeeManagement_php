<?php
include('../../header.php');
?>

<?php
$id = $_SESSION['login'];
$now = date('Y-m-d');
$user_select = "SELECT * FROM users INNER JOIN employee ON users.id = employee.user_id where users.id = $id";
$user_query = mysqli_query($connection, $user_select);
$user = mysqli_fetch_all($user_query, MYSQLI_ASSOC);

$att = "SELECT * FROM `attandance` WHERE user_id = $id AND DATE(created_at) = CURDATE()";
$attendance_query = mysqli_query($connection, $att);
$attendance = mysqli_fetch_all($attendance_query,true);




?>

<?php if (!empty($_SESSION['login']) && $_SESSION['role'] == 'admin') {
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="create.php" class="btn btn-primary" title="Create"><i class="las la-plus-circle"></i></a>
                <a href="index.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
            </div>

            <section style="background-color: #eee;">
                <div class="container py-5">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="" width="100%" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"></h5>
                                    <p class="text-muted mb-1"> </p>
                                    <p class="text-muted mb-4"> </p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <?php if (!empty($attendance)) {
                                        ?>
                                            <button type="button" class="btn btn-success">Presented</button>
                                        <?php
                                        } ?>

                                        <?php if (empty($attendance)) {
                                        ?>
                                            <button type="button" class="btn btn-danger">Absent</button>
                                        <?php
                                        } ?>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-8">

                            <div class="card mb-4">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> <?php echo $user[0]['emp_name'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> <?php echo $user[0]['emp_email'] ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Date Of Birth</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> <?php echo $user[0]['dob'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> <?php echo $user[0]['emp_phone'] ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> <?php echo $user[0]['emp_address'] ?> </p>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">

                                    <form action="<?php echo $base ?>employee/attandance/store.php" method="POST">
                                        <?php if (empty($attendance)) {
                                        ?>
                                            <button onClick="this.form.submit(); this.disabled=true; this.value='Sending…'; " class="btn btn-primary" type="submit">Give Attendance</button>
                                        <?php
                                        } ?>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
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
