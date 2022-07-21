<?php include_once('includes/header.php');
include_once('includes/check_login.php');
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
                <h2>
                    
                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2 class="text-center">
                                Driver List
                            </h2>
                            <ul class="header-dropdown mr-5">
                                <li class="dropdown">
                                    <a href="user.php">
                                        <i class="material-icons adds">add</i>
                                    </a>
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <!-- <table class="table table-bordered table-striped table-hover dataTable js-exportable"> -->
                                <table class="table table-bordered table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <!-- <th>Adhar No</th> -->
                                            <!-- <th>Mobile No</th> -->
                                            <!-- <th>Driving Licence No</th> -->
                                            <!-- <th>Type</th> -->
                                            <!-- <th>Parent Id</th> -->
                                            <!-- <th>Department</th> -->
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    if($_SESSION['type'] =='SA')
                                    {
                                        $a='';
                                    }
                                    elseif ($_SESSION['type']=='A')
                                    {
                                        $parent_id=$_SESSION['parent_id'];
                                        $a=" And `parent_id`='$parent_id'";
                                    }
                                    else{
                                        $parent_id=$_SESSION['uid'];
                                        $a=" And `id`='$parent_id' And `type`='U'";
                                    }

                                    $sql=mysqli_query($conn,"select * from user where 1=1 $a");
                                    while($row=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <!-- <td><?php //echo $row['adhar_no']; ?></td> -->
                                            <!-- <td><?php //echo $row['mobile']; ?></td> -->
                                            <!-- <td><?php //echo $row['driver_license_no']; ?></td> -->
                                            <!-- <td><?php //echo $row['department']; ?></td> -->
                                            <!-- <td><?php //echo $row['type']; ?></td> -->
                                            <!-- <td><?php //echo $row['parent_id']; ?></td> -->
                                            <!-- <td><?php // ?></td> -->

                                          <td class="action">
                                          <a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons">delete</i> </a>
                                           <a href='javascript:void(0)' class="get_id" data-id='<?php echo $row["id"] ?>' data-toggle="modal" data-target="#myModal"><i class="material-icons">preview</i></a>
                                        </td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

<!-- fixed footer main-->
    <div class="container-fluid">
<div class="row">
<div class="col-md-12">
<!-- fixed footer -->
<nav class="nav_footer">
        <a href="user_list.php" class="nav__link nav__link--active">
            <i class="material-icons nav__icon">home</i>
            <span class="nav__text">Master</span>
        </a>
        <a href="bookings_list.php" class="nav__link">
            <i class="material-icons nav__icon">note_alt</i>
            <span class="nav__text">Booking</span>
        </a>
            
        <a href="ltr_register.php" class="nav__link" href="">
            <i class="material-icons nav__icon">description</i>
             <span class="nav__text">Report</span>
        </a>
    </nav>
<!-- // fixed footer -->

</div>
</div>
</div>
<!-- // fixed footer main -->
<div id="myModal" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               
               <div class="modal-body" id="load_data">
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
            
      <script>
	  
	  $(document).ready(function(){
		  $(".get_id").click(function(){
			  var ids = $(this).data('id');
			   $.ajax({
				   url:"user_list_upload.php",
				   method:'POST',
				   data:{id:ids},
				   success:function(data){
					   
					   $('#load_data').html(data);
				   
				   }
				   
			   })
		  })
		  
	  })
	  
	  </script>
      
  <?php include_once('includes/footer.php'); ?>
</body>

</html>
