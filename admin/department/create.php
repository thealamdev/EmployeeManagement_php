<?php
include('../../header.php');
if (!empty($_SESSION['login'])) {
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="index.php" class="btn btn-primary" title="List"><i class="las la-stream"></i></a>
                <a href="create.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
            </div>
            <div class="card-body">

                <form action="<?php echo $base ?>admin/department/dep_insert.php" method="POST">
                    <div class="mb-3">
                        <label for="dep_name" class="form-label">Department Name</label>
                        <input type="text" class="form-control" name="dep_name">
                        <div class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <label for="dep_title" class="form-label">Department Title</label>
                        <textarea name="dep_title" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </form>
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
include('../../footer.php')
?>