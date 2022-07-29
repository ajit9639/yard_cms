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
                            Checkpost 
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="unloading_checkpost1_add.php">
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
                                            <th>RR_No</th>
                                            <th>Transporter</th>
                                            <th>Company</th>
                                            <th>Material</th>
                                            

                                            <th>In Date</th>
                                            <th>Out Date</th>
                                            <th>Work Done</th>
                                            <th>Remarks</th>

                                            <th>Vehicle Entry</th>
                                            <!-- <th>Kata Entry</th> -->


                                            


                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                    $sql=mysqli_query($conn,"select * from `unloading_rake_opening`");
                                    while($row=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['RR_No']; ?></td>
                                            <td><?php echo $row['Transporter']; ?></td>
                                            <td><?php echo $row['Company']; ?></td>
                                            <td><?php echo $row['Material']; ?></td>
                                            <td><?php echo $row['RR_Date'].'<br>'.$row['Placement_Time'] ?></td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><a href="unloading_vehicle_entry.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm">Vehicle Entry</a></td>
                                            <!-- <td><a href="unloading_kata_entry.php?id=<?php echo $row["id"] ?>" class="btn btn-success btn-sm">Kata Entry</a></td> -->
                                            

                                            <!-- <td class="action">

                                                <a href='unloading_checkpost1_add.php?id=<?php echo $row["id"] ?>' class="get_id"><i
                                                        class="material-icons">edit</i></a>
                                                <a href='unloading_checkpost1_add.php?id=<?php echo $row["id"] ?>&type=delete'
                                                    class="get_id"><i class="material-icons">delete</i></a>
                                                <a href='javascript:void(0)' class="get_id"
                                                    data-id='<?php echo $row["id"] ?>' data-toggle="modal"
                                                    data-target="#myModal"><i class="material-icons">preview</i></a>
                                            </td> -->
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