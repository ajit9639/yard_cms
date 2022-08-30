<body class="theme-red">

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
                                 <?php                            							 
                           $count = mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(`id`) as 'cid' from `unloading_vehicle_out_temp` where `unloading_ref_id`='$id' AND `kata_status`='1'"));
                           $d = $count['cid'];
                            ?>
                              Out Vehicle : <?=$d ?>
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="unloading_checkpost1_add.php">
                                    <i class="material-icons adds">add</i>
                                </a>

                            </li>
                        </ul> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                           <th>SNO</th>
                                            <th>Action</th>
                                            <th>Vehicle No</th>
                                            <th>Vehicle Type</th>
                                            <th>T Challan No</th>
                                            <th>Status</th>                                        
                                            <th>Remarks</th>
                                             <th>Action</th>                          
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $s=1;
                            $d = mysqli_query($conn,"select * from `unloading_vehicle_out_temp` where `unloading_ref_id`='$id' AND `kata_status`='1'");
                            while($row = mysqli_fetch_assoc($d))
                            { ?>
                                        <tr>
                                           
                                            <td><?php echo $s; ?></td>
                                            <td>
                                              <a href="un_loading_kata_entry_vehicle_out.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Action</a>
</td>
                                                    <td><?php echo $row['vehicle_no']; ?></td>
                                          <td><?php echo $row['vehicle_type']; ?></td>
                                                    
                                             <td><?php echo $row['trans_challan']; ?></td>
                                            <td><button class="btn btn-warning btn-sm">OUT</button></td>
                                            <td><?php echo $row['Remarks']; ?></td>  
                                          <td>
                                              <a href="unloading_last_kata_edit.php?id=<?php echo $row['id']; ?>"><i class="material-icons">edit</i></a>
                                              <a href="unloading_delete_vehicle.php?id=<?php echo $row['id']?>&types='outvehicle'"><i class="material-icons">delete</i></a>
                                          </td>  
                                        </tr>

                                        <?php $s++; } ?>

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
    $(document).ready(function() {
        $(".get_id").click(function() {
            var ids = $(this).data('id');
            $.ajax({
                url: "rake_view.php",
                method: 'POST',
                data: {
                    id: ids
                },
                success: function(data) {

                    $('#load_data').html(data);

                }

            })
        })

    })
    </script>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>