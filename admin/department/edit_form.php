<?php
include('../../header.php');
$id = $_GET['id'];
$dep_get = "SELECT id,dep_name,dep_title FROM department WHERE id = $id";
$dep_get_query = mysqli_query($connection,$dep_get);
$dep = mysqli_fetch_assoc($dep_get_query);
// print_r($dep);
 
if (!empty($_SESSION['login'])) {
?>
 
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="index.php" class="btn btn-primary" title="List"><i class="las la-stream"></i></a>
            <a href="create.php" class="btn btn-primary" title="Refresh"><i class="las la-sync"></i></a>
        </div>
        <div class="card-body">

            <form action="<?php echo $base ?>admin/department/update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dep['id'] ?>">
                <div class="mb-3">
                    <label for="role_name" class="form-label">Department Name</label>
                    <input type="text" class="form-control" name="dep_name" value="<?php echo $dep['dep_name'] ?>">
                    <div class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">Department <Title></Title></label>
                    <textarea name="dep_title" cols="30" rows="10" class="form-control"><?php echo $dep['dep_title'] ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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