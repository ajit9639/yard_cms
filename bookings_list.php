<?php include_once('includes/header.php');
include_once('includes/check_login.php');


$host='localhost';
$username='root';
$password='';
$database='car';
$conn = mysqli_connect($host,$username,$password,$database);

$results = "SELECT * FROM `txn_logs`";
$sql = mysqli_query($conn,$results);

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
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">
                                Bookings List
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="dio.php">
                                        <i class="material-icons adds">add</i>
                                    </a>
                                   
                                </li>
                            </ul>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
										<th>Sr.No.</th>
                                            <!-- <th>Service Type</th> -->
                                            <th>Core id</th>
                                            <th>Bill No.</th>
                                            <!-- <th>Segment</th> -->
                                            <!-- <th>Guest Name</th> -->
                                            <!-- <th>Cab No</th> -->
                                            <!-- <th>Type</th> -->
                                            <th>Driver Name</th>
                                            <!-- <th>Driver Number</th> -->
											<th>Pay Out</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                   
                                    // $sql = mysqli_query($conn,);
                                    
                                    while($row=mysqli_fetch_assoc($sql))
									{ 
                                    ?>
                                        <tr>
										<td><?php echo $row['Id'] ?></td>
                                            <!-- <td><?php //echo $row['service_type'] ?></td> -->
                                            <td><?php echo $row['core_id']; ?></td>
                                            <td><?php echo $row['bin_no']; ?></td>
                                            <!-- <td><?php //echo $row['segment']; ?></td> -->
                                            <!-- <td><?php //echo $row['guest_name']; ?></td> -->
                                            <!-- <td><?php //echo $row['cab_no']; ?></td> -->
                                            <td><?php echo $row['driver_name']; ?></td>
                                            <!-- <td><?php //echo $row['driver_number']; ?></td> -->
											<td><?php echo $row['total_payout']; ?></td>
                                            
                                            <td class="action">
                                            <a href='javascript:void(0)' class="get_id" data-id="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#myModal"><i class="material-icons">preview</i></a></td>  
                                      
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
				   url:"bookings_list_upload.php",
				   method:'POST',
				   data:{id:ids},
				   success:function(data){
					   
					   $('#load_data').html(data);
				   
				   }
				   
			   })
		  })
		  
	  })
	  
	  </script>
      
   </body>
</html>
<?php
   mysqli_close($conn);
   ?>
<?php include_once('includes/footer.php'); ?>

