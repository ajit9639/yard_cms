<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <!-- <div class="user-info">
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?></div>
                <div class="email">Login From IP : <?php echo $_SERVER['REMOTE_ADDR']; ?></div>
                <div class="email"><?php echo $_SESSION['mobile']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION
                    <!-- <span class="closebtn website" onclick="closeNav2()" style="
                position: absolute;
                right: 15px;
                font-size: 20px;
                cursor:pointer;
                ">×</span> -->
                </li>
                <li>
                    <a href="dashboard.php">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                $access_array=$_SESSION['access_array'];
                $role=$_SESSION['type'];

                if($role == 'SA')
                {
                    $role='A';
                }
              ?>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Masters</span>
                    </a>
                    <ul class="ml-menu">
                        <?php
                    if(($role == 'A') || (in_array('2',$access_array))) { ?>
                        <li>

                            <a href="user_list.php">
                                <i class="material-icons">person</i>
                                <span>Role Assignation</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('3',$access_array))) { ?>
                        <li>
                            <a href="company.php">
                                <i class="material-icons">domain</i>
                                <span>Company</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('4',$access_array))) { ?>
                        <li>
                            <a href="transporter.php">
                                <i class="material-icons">local_shipping</i>
                                <span>Transporter</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('5',$access_array))) { ?>
                        <li>
                            <a href="vehicle_type.php">
                                <i class="material-icons">directions_car</i>
                                <span> Vehicle Type</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('6',$access_array))) { ?>
                        <li>
                            <a href="vehicle.php">
                                <i class="material-icons">directions_car</i>
                                <span> Vehicle</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php
                        if(($role == 'A') || (in_array('7',$access_array))) { ?>
                        <li>
                            <a href="driver.php">
                                <i class="material-icons">airline_seat_recline_normal</i>
                                <span> Driver</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('8',$access_array))) { ?>
                        <li>
                            <a href="material.php">
                                <i class="material-icons">dashboard</i>
                                <span> Material</span>
                            </a>
                        </li>
                        <?php } ?>


                        <?php
                        if(($role == 'A') || (in_array('9',$access_array))) { ?>
                        <li>
                            <a href="boxtype.php">
                                <i class="material-icons">filter_none</i>
                                <span> Box Type</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php
                        if(($role == 'A') || (in_array('10',$access_array))) { ?>
                        <li>
                            <a href="billinghead.php">
                                <i class="material-icons">featured_play_list</i>
                                <span> Billing Head</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('11',$access_array))) { ?>
                        <li>
                            <a href="vehicle_search.php">
                                <i class="material-icons">search</i>
                                <span> Vehicle Search</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>

                <?php
                $access_array=$_SESSION['access_array'];
                $role=$_SESSION['type'];

                if($role == 'SA')
                {
                    $role='A';
                }
              ?>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Unloading</span>
                    </a>
                    <ul class="ml-menu">
                        <?php
                    if(($role == 'A') || (in_array('12',$access_array))) { ?>
                        <li>

                            <a href="rake.php">
                                <i class="material-icons">person</i>
                                <span>Rake Opening</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('13',$access_array))) { ?>
                        <li>
                            <a href="unloading_checkpost1.php">
                                <i class="material-icons">accessibility</i>
                                <span>Checkpost No.1</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('14',$access_array))) { ?>
                        <li>
                            <a href="unloading_kata_entry.php">
                                <i class="material-icons">create</i>
                                <span>Kata Entry</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('14',$access_array))) { ?>
                        <li>
                            <a href="transporter.php">
                                <i class="material-icons">local_shipping</i>
                                <span>Rake Report</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>


                <?php
                $access_array=$_SESSION['access_array'];
                $role=$_SESSION['type'];

                if($role == 'SA')
                {
                    $role='A';
                }
              ?>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Loading</span>
                    </a>
                    <ul class="ml-menu">
                        <?php
                    if(($role == 'A') || (in_array('15',$access_array))) { ?>
                        <li>

                            <a href="loading_rake_opening.php">
                                <i class="material-icons">person</i>
                                <span>Rake Opening</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        if(($role == 'A') || (in_array('16',$access_array))) { ?>
                        <li>
                            <a href="loading_checkpost1.php">
                                <i class="material-icons">accessibility</i>
                                <span>Checkpost No.1</span>
                            </a>
                        </li>
                        <?php } ?>

                    </ul>
                </li>


                <li>
                    <a href="logout.php">
                        <i class="material-icons">keyboard_tab</i>
                        <span>Logout</span>
                    </a>
                </li>



                <?php
                // if(($role == 'A') || (in_array('18',$access_array))) { ?>
                <!-- <li>
                    <a href="bookings_list.php">
                        <i class="material-icons">book</i>
                        <span>Change Password</span>
                    </a>
                </li> -->
                <?php //  } ?>
            </ul>

        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; Copyright 2022 <br><a href="https://insightinfosystem.com/" target="_blank">Insight Infosystem
                    Pvt. Ltd.</a>
            </div>

        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a href="dashboard.php">
                <!-- <img src="images/header.png" class="img-responsive logos" style="width: 40%;"> -->
                <strong style="color: #303030;
    font-size: 20px;
    font-weight: 800;">YA<b style="
    color: #5c5c5c;
">RD</b></strong>
            </a>
        </div>

        <!-- icon -->
        <!-- <span style="
    position: absolute;
    top: 35px;
    background: #fff;
    padding: 3px 7px;
    border-radius: 25px;
    cursor:pointer;
" onclick="openNav()" class="website"><i class="fa fa-bars" aria-hidden="true"></i></span> -->
        <!-- // icon -->
    </div>
</nav>
<!-- #Top Bar -->






<script>
// window.onload = function() {
//     closeNav1();
// };

// function openNav() {
//     document.getElementById("leftsidebar").style.width = "250px";
//     document.getElementById("card").style.marginLeft = "250px";
// }

// function closeNav1() {
//     // document.getElementById("leftsidebar").style.width = "0";
//     document.getElementById("card").style.marginLeft = "0";
// }

// function closeNav2() {
//     document.getElementById("leftsidebar").style.width = "0";
//     document.getElementById("card").style.marginLeft = "0";
// }
</script>