<?php include_once('includes/header.php');
if(isset($_SESSION['uid']) && ($_SESSION['uid'] != ''))
{
    echo '<script>window.location="dashboard.php";</script>';
}
if(isset($_POST['submit']))
{
    $access_array=array();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $qw=mysqli_query($conn,"select * from user where username='$username' and password='$password'");

    if(mysqli_num_rows($qw) > 0)
    {
        $data=mysqli_fetch_assoc($qw);
     $_SESSION['uid']=$data['id'];
        $user_id=$data['id'];
     $_SESSION['name']=$data['name'];
     $_SESSION['mobile']=$data['mobile'];
     $_SESSION['department']=$data['department'];
     $_SESSION['type']=$data['type'];
     $_SESSION['parent_id']=$data['parent_id'];
     $_SESSION['key']=$data['key'];
     $_SESSION['is_authenticated']=1;

        $as=mysqli_query($conn,"select * from role where user_id='$user_id'");
        while($fr=mysqli_fetch_assoc($as))
        {
            array_push($access_array,$fr['pages']);
        }
        $_SESSION['access_array']=$access_array;


     echo '<script>window.location="dashboard.php";</script>';
    }
    else
    {
        $_SESSION['is_authenticated']=0;
        echo '<script>alert("Invalid Login Credentials"); window.location="index.php";</script>';
    }

}
?>

<body class="login-page">

<!-- pre loader -->
<div class="loader-container">
        <!-- <div class="loader"></div> -->
        <img src="images/header1.png" style="width:80vh"/>
    </div>
	<!-- // pre loader -->

    <div class="login-box">
        <div class="logo">
  <img src="images/header.png">
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="#">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-12">

                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">SIGN IN</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>
    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/pages/examples/sign-in.js"></script>
    <!-- preloadr -->
    <script>
        $(window).on("load",function(){
            $(".loader-container").fadeOut(8000);
        });
    </script>
    <!-- // preloadr -->
</body>

</html>