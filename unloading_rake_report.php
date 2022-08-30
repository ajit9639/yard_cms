<?php include_once('includes/header.php');
include_once('includes/check_login.php');
include_once('includes/db.php');
?>

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
                                Rake [Unloading]
                            </h2>
                            <!--<ul class="header-dropdown m-r--5">-->
                            <!--    <li class="dropdown">-->
                            <!--        <a href="rake_add.php">-->
                            <!--            <i class="material-icons adds">add</i>-->
                            <!--        </a>-->

                            <!--    </li>-->
                            <!--</ul>-->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SNO</th>
                                          <th>Company</th>
                                            <th>Transporter</th>
                                        	<th>RR_No</th>
                                            <th>RR_Date</th>                                            
                                            <th>RR_Qty</th>
                                            <th>Placement_Time</th>
                                          <th>Rake Release</th>
                                          <th>Total Unloading Time</th>
                                          <th>Rake Close Date & Time</th>
                                          <th>Total Rake work Time</th>                                                                                     
                                          	<th>Remarks</th>                                            
                                            <th>Rate Report</th>
                                            <th>Rake Report</th>
                                            <th>Kata Report</th>                                         
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $s =1;
// echo "select rc.*, ro.* from `unloading_rake_closing` rc, `unloading_rake_opening` ro where rc.rake_opening_reference = ro.id";exit();

                                    $sql=mysqli_query($conn,"select rc.*, ro.* from `unloading_rake_closing` rc, `unloading_rake_opening` ro
where rc.rake_opening_reference = ro.id");
                                    while($row=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                        <tr>
                                            <td><?= $s;?></td>
                                           <td><?php echo $row['Company']; ?></td>
                                            <td><?php echo $row['Transporter']; ?></td>
                                           <td><?php echo $row['RR_No']; ?></td>
                                            <td><?php echo $row['RR_Date']; ?></td>                                           
                                            <td><?php echo $row['RR_Qty']; ?></td>                                          
                                            <td><?php echo $row['Placement_Time']; ?></td>
                                          <td><?php echo $row['rake_release_date']; ?></td>
                                                                                    
                                          <td></td>
                                          <td><?php echo $row['rake_close_date']; ?></td>
                                          <td></td>
                                           
                                            <td><?php echo $row['Remarks']; ?></td>
                                            <td>
                                              <a target = "_blank" href="unloading_rake_report_rate.php?id=<?php echo $row["id"] ?>" class="btn btn-success">Print Rate</a>
                                            </td>
                                            <td>                                              
                                              <a target = "_blank" href="unloading_rake_report_print.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Print</a>
                                            </td>
                                             <td>                                              
                                              <a target = "_blank" href="unloading_rake_report_kata_detail.php?id=<?php echo $row["id"] ?>" class="btn btn-warning">View Kata Detail</a>                                                                                          
                                            </td>
                                        </tr>

                                        <?php $s++;} ?>

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