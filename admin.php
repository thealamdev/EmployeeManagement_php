<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php if ($_SESSION['login'] && $_SESSION['role'] == 'super-admin') {
?>
    <?php
    include('header.php');
    // queries: form database:
    $users_select = "SELECT COUNT(id) FROM users";
    $users_query = mysqli_query($connection, $users_select);
    $users = mysqli_fetch_all($users_query);

    $dep_select = "SELECT COUNT(id) FROM department";
    $dep_query = mysqli_query($connection, $dep_select);
    $deps = mysqli_fetch_all($dep_query);

    if (!empty($_SESSION['login'])) ?>

    <div class="row card-group-row">
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2 d-flex">Employees <span class="badge badge-warning ml-2"></span></div>
                        <span class="h4 m-0"><?php echo $users[0][0]  ?><small class="text-muted"> </small> </span>
                    </div>

                    <div><i class="material-icons icon-muted icon-40pt ml-3">contacts</i></div>
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted d-flex mb-2">Departments <span class="badge badge-primary ml-2"></span></div>
                        <span class="h4 m-0"><?php echo $deps[0][0] ?></span>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">gps_fixed</i></div>
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body-x-lg card-body d-flex flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Top Grossing</div>

                        <div class="d-flex align-items-center">
                            <div class="h4 m-0">$13,531 </div>
                            <div class="progress ml-1" style="width:100%;height: 3px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">monetization_on</i></div>
                </div>
            </div>
        </div>
    </div>
<?php
    include('footer.php');
    if (empty($_SESSION['login'])) {
        header('location:http://localhost/EmpoyeeManagement/index.php');
    }
}
?>


<!-- for user dashboard -->

<?php if (!empty($_SESSION['login']) && $_SESSION['role'] == 'admin') {
    include('header.php');
    $id = $_SESSION['login'];
    $user_select = "SELECT * FROM users INNER JOIN employee ON users.id = employee.user_id where users.id = $id";
    $user_query = mysqli_query($connection, $user_select);
    $user = mysqli_fetch_all($user_query, MYSQLI_ASSOC);

    $att = "SELECT * FROM `attandance` WHERE user_id = $id AND DATE(created_at) = CURDATE()";
    $attendance_query = mysqli_query($connection, $att);
    $attendance = mysqli_fetch_all($attendance_query, true);


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
                                            <button class="btn btn-primary" type="submit">Give Attendance</button>
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
    include('footer.php');
    if (empty($_SESSION['login'])) {
        header('location:http://localhost/EmpoyeeManagement/index.php');
    }
}
?>

<?php
if (empty($_SESSION['login'])) {
    header('location:http://localhost/EmpoyeeManagement/index.php');
}
?>