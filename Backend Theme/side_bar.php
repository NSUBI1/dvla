
<div data-simplebar class="h-100">

<!-- User details -->
<div class="user-profile text-center mt-3">
    <div class="">
        <img src="assets/images/users/default_user.jpeg" alt="" class="avatar-md rounded-circle">
    </div>
    <div class="mt-3">
        <h4 class="font-size-16 mb-1"><?php echo $_SESSION['full_name'] ?></h4>
        <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
    </div>
</div>

<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="home.php" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <?php
            if($_SESSION['user_type']=="client"){

           
        ?>
        <?php
         }
         else{
        ?>
        <li>
        <a href="./add_user.php" class=" waves-effect">
        <i class="fas fa-user"></i>
        <span>Add user</span>
        </a>
        </li>

        <li>
        <a href="./processed_report.php" class=" waves-effect">
        <i class="fas fa-car"></i>
        <span>Proccessed report</span>
        </a>
        </li>
        <?php
        }
        ?>

    </ul>
</div>
<!-- Sidebar -->
</div>