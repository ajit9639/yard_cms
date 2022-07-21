<?php include_once('includes/header.php');
include_once('includes/check_login.php');
?>

<!--
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
-->

	<style>
	@media print { 
 /* All your print styles go here */
 .no-print { display: none !important; } 
}
	</style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
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
    </div> -->
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

    <section style="margin-left: 300px;">
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
                                Report
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="expense.php">
										<i class="material-icons">Add </i><button class="btn btn-primary">Add</button>
                                    </a>
                                </li>
								
                            </ul> -->
                        </div>
                        <div>
                            <!--datepicker1-->
                            <select id="service" class="form-control">
                                <option value="#">Select Service</option>   
                                <option value="ltr">LTR</option>
                                <option value="expense">Expense</option>
                                <option value="booking">Booking</option>
                            </select>
 							<!--<label for="Search">Search</label>-->
                            <input type="text" id="SearchText" name="SearchText" placeholder="Enter Core Id" class="col-sm-3">
                            <!--<label>From</label>-->
                            <input type="text" id="From" name="From" placeholder="Search From" class="col-sm-3">
                            <!--<label>To</label>-->
                            <input type="text" id="to" name="to" placeholder="Search To" class="col-sm-3">
                            <input type="button" name="range" id="range" class="btn btn-primary" value="Range">
                            <a href="expense_master.php" type="button" class="btn btn-warning" value="Reset">Reset</a>
							<a href="javascript:volid()" type="button" class="btn btn-success" onclick="printData();">Print</a>
                        </div>
                        <div class="body" id="body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover dataTable js-exportable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Core Id</th>
                                            <th>Bin No</th>
                                            <th>Driver Name</th>
                                            <th>total Payout</th>
                                          
                                            <th class="no-print">Action</th>
                                        </tr>
                                    </thead>
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
       $(document).ready(function() {
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $(function() {
                $("#From").datepicker();
                $("#to").datepicker()
            });
            $('#range').click(function() {
                //var From = $('#From').val();
               // var to = $('#to').val();
              //  var SearchText = $('#SearchText').val();
              var service = $('#service').val();
                if (From != '' && to != '') {
                    $.ajax({
                        url: "range.php",
                        method: "POST",
                        data: {
                            //From: From,
                           // to: to,
                           // SearchText:SearchText
                           service: service
                        },
                        success: function(data) {
                            $('#body').html(data);
                        }
                    });
                }else if(SearchText!=''){
                   
                    $.ajax({
                        url: "range.php",
                        method: "POST",
                        data: {
                            SearchText:SearchText
                        },
                        success: function(data) {
                            $('#body').html(data);
                        }
                    });
                } else {
                    alert("Please Select the Search");
                }
            })
        });
    </script>
	<script>
	function printData()
	{
	   var divToPrint=document.getElementById("body");
	   newWin= window.open("");
	   newWin.document.write(divToPrint.outerHTML);
	   newWin.print();
	   newWin.close();
	}
    </script>
    
</body>

</html>