<?php if (!empty($_SESSION['login'])) { ?>

    </div>
    </div>
    <!-- // END drawer-layout__content -->
    <?php
    include('database.php');

    ?>
    <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
                <div class="sidebar-heading">Menu</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item active open">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                            <span class="sidebar-menu-text">Dashboards</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse show " id="dashboards_menu">
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="<?php echo $base ?>admin.php">
                                    <span class="sidebar-menu-text">Default</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php if (!empty($_SESSION['role'] == 'super-admin')) {
                    ?>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#usermanagement">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                <span class="sidebar-menu-text">User Management</span>
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse" id="usermanagement">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/role/create.php">
                                        <span class="sidebar-menu-text">Add Role</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/role/index.php">
                                        <span class="sidebar-menu-text">Show Role</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    <?php
                    } ?>


                    <?php if (!empty($_SESSION['role'] == 'super-admin')) {
                    ?>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#doctors_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                <span class="sidebar-menu-text">Departments</span>
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>

                            <ul class="sidebar-submenu collapse" id="doctors_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/department/index.php">
                                        <span class="sidebar-menu-text">All Department</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/department/create.php">
                                        <span class="sidebar-menu-text">Add Department</span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                    <?php
                    } ?>

                    <?php if (!empty($_SESSION['role'] == 'super-admin')) {
                    ?>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#apps_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                <span class="sidebar-menu-text">Employee Management</span>
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse" id="apps_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/employee/create.php">
                                        <span class="sidebar-menu-text">Employee Create</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/employee/index.php">
                                        <span class="sidebar-menu-text">All Employee</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/permissions/index.php">
                                        <span class="sidebar-menu-text">Permissions</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    <?php
                    } ?>

                    <?php if (!empty($_SESSION['role'] == 'super-admin')) {
                    ?>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#emp_report">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                <span class="sidebar-menu-text">Employee Report</span>
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse" id="emp_report">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>admin/report/index.php">
                                        <span class="sidebar-menu-text">Report</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php
                    } ?>


                    <?php if (!empty($_SESSION['role'] == 'admin')) {
                    ?>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#attandance">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                <span class="sidebar-menu-text">Attandance Management</span>
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse" id="attandance">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>employee/attandance/index.php">
                                        <span class="sidebar-menu-text">Take Attandance</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo $base ?>employee/attandance/show.php">
                                        <span class="sidebar-menu-text">Show Report(Attandance)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php
                    } ?>

                </ul>

                <!-- <div class="sidebar-heading">Components</div>
                <div class="sidebar-block p-0 mb-0">
                    <ul class="sidebar-menu" id="components_menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-buttons.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">mouse</i>
                                <span class="sidebar-menu-text">Buttons</span>
                            </a>
                        </li>

                    </ul>


                </div> -->





            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <div id="app-settings" style="display:none">
        <app-settings layout-active="default" :layout-location="{
'default': 'index.html',
'fixed': 'fixed-dashboard.html',
'fluid': 'fluid-dashboard.html',
'mini': 'mini-dashboard.html'
}">
        </app-settings>
    </div>

    <!-- jQuery -->
    <script src="<?= $base ?>/backend/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?= $base ?>/backend/vendor/popper.min.js"></script>
    <script src="<?= $base ?>/backend/vendor/bootstrap.min.js"></script>
    <script src="<?= $base ?>/backend/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?= $base ?>/backend/vendor/dom-factory.js"></script>
    <script src="<?= $base ?>/backend/vendor/material-design-kit.js"></script>
    <script src="<?= $base ?>/backend/js/toggle-check-all.js"></script>
    <script src="<?= $base ?>/backend/js/check-selected-row.js"></script>
    <script src="<?= $base ?>/backend/js/dropdown.js"></script>
    <script src="<?= $base ?>/backend/js/sidebar-mini.js"></script>
    <script src="<?= $base ?>/backend/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="<?= $base ?>/backend/js/app-settings.js"></script>

    <!-- Flatpickr -->
    <script src="<?= $base ?>/backend/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="<?= $base ?>/backend/js/flatpickr.js"></script>

    <!-- Global Settings -->
    <script src="<?= $base ?>/backend/js/settings.js"></script>

    <!-- Moment.js') }} -->
    <script src="<?= $base ?>/backend/vendor/moment.min.js"></script>
    <script src="<?= $base ?>/backend/vendor/moment-range.js"></script>

    <!-- Chart.js') }} -->
    <!-- <script src="backend/vendor/Chart.min.js"></script>  -->

    <!-- App Charts JS -->
    <!-- <script src="backend/js/charts.js"></script> -->
    <script src="<?= $base ?>/backend/js/chartjs-rounded-bar.js"></script>

    <!-- Chart Samples -->
    <script src="<?= $base ?>/backend/js/page.dashboard.js"></script>
    <script src="<?= $base ?>/backend/js/progress-charts.js"></script>

    <!-- Vector Maps -->
    <script src="<?= $base ?>/backend/vendor/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= $base ?>/backend/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="<?= $base ?>/backend/js/vector-maps.js"></script>
    <script src="<?= $base ?>/backend/js/toastr.min.js"></script>
    <?php
    include('message.php');
    ?>

    <?php
    unset($_SESSION['success']);
    ?>
    </body>

    </html>
<?php
} ?>