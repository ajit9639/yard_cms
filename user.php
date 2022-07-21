<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

if(isset($_POST['submit_user']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    $adhar_number=$_POST['adhar_number'];
    $driver_license_no=$_POST['driver_license_no'];
    $key_no=$_POST['key'];
    $parent_id=$_POST['parent_id'];


    $password=$_POST['password'];
    $department=$_POST['department'];
    $type=$_POST['type'];
    $pages_arr=$_POST['pages'];

    $check_username=mysqli_num_rows(mysqli_query($conn,"select id from user where username='$username' and id <> '$id'"));
    if($check_username > 0)
    {
        echo '<script>alert("Username is already used by other please try another."); </script>';
    }
    else {
        if ($id == '') {
           $parent_id='';
            $key=$_SESSION['key'];

            mysqli_query($conn, "INSERT INTO `user`(`name`, `username`, `password`, `adhar_no`, `mobile`, `driver_license_no`, `department`, `type`, `key`, `parent_id`) VALUES 
            ('$name','$username','$password','$adhar_number','$mobile','$driver_license_no','$department','$type','$key_no','$parent_id')");
            $id = mysqli_insert_id($conn);
            if(($type == 'SA'))
            {
                $parent_id='';
            }
            elseif ($type == 'A')
            {
                $parent_id=$id;
            }
            else{
                    $parent_id = $_SESSION['parent_id'];
            }
            mysqli_query($conn,"update `user` set `parent_id`='$parent_id' where id='$id'");
        } else {
            mysqli_query($conn, "update user set `name`='$name',`username`='$username',`mobile`='$mobile',`password`='$password',`department`='$department',`type`='$type',`adhar_number`='$adhar_number',`driver_license_no`='$driver_license_no' where id='$id'");
        }


        mysqli_query($conn, "delete from role where user_id='$id'");

        foreach ($pages_arr as $page) {
            mysqli_query($conn, "insert into `role` values (null,'$page','$id')");
        }

        echo '<script>alert("Data updated successfully"); window.location="user_list.php";</script>';
    }


}
if(isset($_GET['uid']))
{
    $uid=$_GET['uid'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from user where id='$uid'"));
}
?>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
 <?php include_once('includes/sidebar.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>Manage User</h2> -->
            </div>

            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2>
                                User Details
                                <!-- <small>With Permissions</small> -->
                            </h2>

                        </div>
                        <div class="body">
                            <form id="user_form" method="post" action="#">
                                <input type="hidden" name="id" value="<?php if(isset($_GET['uid'])) { echo $data['id']; } ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php if(isset($_GET['uid'])) { echo $data['name']; } ?>" required>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="username" name="username" class="form-control" value="<?php if(isset($_GET['uid'])) { echo $data['username']; } ?>" required>
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" id="password" name="password" class="form-control" value="<?php if(isset($_GET['uid'])) { echo $data['password']; } ?>" required>
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="adhar_number" name="adhar_number" class="form-control" value="<?php if(isset($_GET['uid'])) { echo $data['adhar_number']; } ?>" required>
                                        <label class="form-label">adhar_number</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="mobile" name="mobile" class="form-control" value="<?php if(isset($_GET['uid'])) { echo $data['mobile']; } ?>" required>
                                        <label class="form-label">Mobile</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="driver_license_no" name="driver_license_no" class="form-control" value="<?php if(isset($_GET['uid'])) { echo $data['driver_license_no']; } ?>" required>
                                        <label class="form-label">driver_license_no</label>
                                    </div>
                                </div>

                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="department" name="department" class="form-control" value="<?php if(isset($_GET['uid'])) { echo $data['department']; } ?>">
                                        <label class="form-label">Department</label>
                                    </div>
                                </div>
                                <div class="demo-radio-button">
                                    <?php if($_SESSION['type'] == 'SA') { ?>
                                    <input name="type" type="radio" id="SA" value="SA" <?php if(isset($_GET['uid'])) { if($data['type'] == 'SA') { echo 'checked'; } } ?> />
                                    <label for="SA">SuperAdmin</label>
                                    <?php } ?>
                                    <?php if(($_SESSION['type'] == 'SA')||($_SESSION['type'] == 'A')) { ?>
                                    <input name="type" type="radio" id="A"  value="A" <?php if(isset($_GET['uid'])) { if($data['type'] == 'A') { echo 'checked'; } }   ?> />
                                    <label for="A">Admin</label>
                                    <?php } ?>
                                    <input name="type" type="radio" id="U"  value="U" <?php if(isset($_GET['uid'])) { if($data['type'] == 'U') { echo 'checked'; } } else { echo 'checked'; } ?> />
                                    <label for="U">User</label>
                                </div>



                                <br>

                                <div class="table-responsive">
                                    <table class="table table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $re=mysqli_query($conn,"select * from access_list order by name");
                                        $ctr=1;
                                        while($rf=mysqli_fetch_assoc($re))
                                        {
                                        ?>
                                        <tr>
                                            <td style="text-align: left;"><?php echo $ctr;
                                            if(isset($_GET['uid'])) {
                                                $permitted =mysqli_query($conn, "select id from role where pages='" . $rf['id'] . "' and  user_id='" . $_GET['uid'] . "'");
                                            if(mysqli_num_rows($permitted) > 0)
                                            {
                                                $permission=1;
                                            }
                                            else{
                                                $permission=0;
                                            }
                                            }
                                            else{
                                                $permission=0;
                                            }
                                            ?></td>
                                            <td style="text-align: left;"><input type="checkbox" name="pages[]" value="<?php echo $rf['id'];?>" data-id="<?php echo $rf['id'];?>" <?php if($permission == 1) { echo 'checked="checked"'; } ?> id="checkbox_<?php echo  $ctr; ?>" class="permission_chk filled-in chk-col-green" />
                                                <label for="checkbox_<?php echo  $ctr; ?>"> <?php echo strtoupper($rf['name']); ?></label></td>
                                        </tr>
                                        <?php
                                        $ctr++;
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <br/>

                                <button class="btn btn-primary waves-effect submit_button" name="submit_user" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->

        </div>
    </section>

 <?php include_once('includes/footer.php'); ?>
</body>

</html>
