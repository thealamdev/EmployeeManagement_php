<?php
include('../../header.php');
?>

<?php
$id = $_SESSION['login'];

$att = "SELECT a.created_at as present,  a.id as ID ,a.id,u.username as name FROM `attandance` as a INNER JOIN users as u ON a.user_id = u.id";
$attendance_query = mysqli_query($connection, $att);
$attendances = mysqli_fetch_all($attendance_query, true);

// searching date:
if (isset($_POST['submit'])) {
    $start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($connection, $_POST['end_date']);

    $date_filter = "SELECT a.created_at as present, a.id as ID, a.id, u.username as name 
        FROM `attandance` as a 
        INNER JOIN users as u ON a.user_id = u.id 
        WHERE DATE(a.created_at) BETWEEN '$start_date' AND '$end_date'";


    $date_filter_query = mysqli_query($connection, $date_filter);

    if ($date_filter_query) {
        if (mysqli_num_rows($date_filter_query) > 0) {
            $attendances = mysqli_fetch_all($date_filter_query, MYSQLI_ASSOC);
        } else {
            $attendances = [];
        }
    } else {
        // Query execution failed
        echo "Query execution failed: " . mysqli_error($connection);
    }
}

?>

<?php if (!empty($_SESSION['login']) && $_SESSION['role'] == 'super-admin') {
?>
    <!-- main content  -->
    <?php if (!empty($_SESSION['login'])) {
    ?>
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h6>Filtering...</h6>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                            </div>

                            <!-- <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Name or Username</label>
                                    <input type="text" name="nameOrUname" class="form-control" placeholder="Username Or Name">
                                    <div class="form-text"></div>
                                </div>
                            </div> -->

                            <div class="col-lg-1">
                                <div class="mb-3">
                                    <label style="opacity:0" for="username" class="form-label">Name</label>
                                    <button type="submit" name="submit" class="btn btn-success">Search</button>
                                    <div class="form-text"></div>
                                </div>

                            </div>
                        </div>
                    </form>


                </div>
                <div class="card-header">
                    <a href="create.php" class="btn btn-primary" title="Create"><i class="las la-plus-circle"></i></a>
                    <a href="index.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
                </div>

                <div class="card-body">
                    <table class="table table-striped hover">
                        <thead>
                            <th>Id</th>
                            <th>Employee Name</th>
                            <th>Present Time</th>
                            <th style="width:150px;">Actions</th>
                        </thead>

                        <tbody>
                            <?php foreach ($attendances as $attendance) { ?>
                                <tr>
                                    <td><?php echo $attendance['ID'] ?></td>
                                    <td><?php echo $attendance['name'] ?></td>
                                    <td><?php echo $attendance['present'] ?></td>
                                    <td style="width:150px;">
                                        <a href="<?php echo $base ?>admin/department/edit_form.php?id=<?php echo $attendance['id'] ?>" class="btn btn-info"><i class="las la-edit"></i></a>

                                        <form style="display:inline" action="<?php echo $base ?>admin/department/delete.php?id=<?php echo $attendance['id'] ?>" method="POST">
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