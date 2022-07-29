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
                                Vehicle In
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
                                           
                                            <th>Action</th>
                                            <th>Vehicle No</th>
                                            <th>Vehicle Type</th>
                                            <th>T Challan No</th>
                                            <th>Status</th>                                        
                                            <th>Remarks</th>
                                                                                      
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                            $d = mysqli_query($conn,"SELECT * FROM `unloading_vehicle_in_temp` where `unloading_ref_id`='$id' AND `kata_status`='0'");
                            while($row = mysqli_fetch_assoc($d))
                            { ?>
                                        <tr>
                                           
                                            <!-- <td><a href="" class="btn btn-danger">OUT</a></td> -->
                                            <td><a style="padding:5px; padding-left:15px; padding-right:15px; font-size:14px;"
                                                    class="btn btn-info btn-lg btn-sm" data-toggle="modal"
                                                    data-target="#myModal1" href="javascript:void(0);">Enter</a></td>
                                                    <td><?php echo $row['Vehicle_No']; ?></td>
                                                    <td></td>
                                                    <td><?php echo $row['trans_challan']; ?></td>
                                            <td><button class="btn btn-warning btn-sm">OUT</button></td>
                                            <td><?php echo $row['Remarks']; ?></td>                                                                                                                               
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