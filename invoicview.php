<?php
include_once('header.php');
if(($_SESSION['permission_all']=='1')||($_SESSION['invoice_master'] == 1))
{
//   user is allowed to visit the page
}
else
{
    echo "<script>window.location.href='dashboard.php';</script>";
}
?>
<title>Protective | Invoice </title>
<?PHP
  include_once('pagination.php');
  
  ?>
				<div class="col-md-10 col-xs-12">
					<div class="mid-content clearfix">
					    <?php
						  if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"]))
						  {
							 echo"<div class='row'><div class='alert alert-success col-md-12 alert-dismissible' role='alert'>
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							   ".$_SESSION["msg"]."
							</div></div>";
							$_SESSION["msg"]="";
						  }
						?>
					    <div class="con_mid">							
							
							<form class="form-horizontal">
							  <h3>Invoice </h3>
							    <a class="btn btn-sm btn-warning" href="quotation_form.php"><i class="fa fa-plus"></i> Add</a>
							 	<div class="row">
								<div class="col-xs-12 col-md-12 col-lg-12 padding-none">
									<div class="table-responsive margin-top15">
										<table class="table table-bordered table-hover" border="1px" style="border-collapse: collapse">
											<thead>
											  <tr>
												<th>Sl No</th>
												<th>Invoice Code</th>
												<th>Client Code</th>
												<th>Client Name</th>
												<th>Contact Details</th>
												<th>Net Amount</th>
                                                  <th>Total Tax </th>
                                                  <th>Total Amount</th>
                                                  <th>Action</th>
												
											  </tr>
											</thead>
											<tbody>
											   <?php
													echo "<script>alert('hello');</script>";
												
												 
											 $sql="SELECT * FROM `invoice_tbl_new`";

											 $result=mysql_query($sql);
												echo "<script>alert($result);</script>";
			//document.location = 'quotation_form.php';</script>";
												// $total_pages=mysql_num_rows($result);
												
												 
                                                 //$sql="select 	invoice_no,	cust_id,contact_person_name from invoice_tbl_new LEFT JOIN client_tbl on client_tbl.cust_code=invoice_tbl_new.cust_id LIMIT $start,$limit";
                                                 $result=mysql_query($sql);	
												
												 while($row=mysql_fetch_array($result)) {
                                                     if ($row['id'] != null) {
                                                         ?>
                                                         <tr>
                                                             <td><?php echo $ctr; ?></td>
                                                             <td><?php echo $row['invoice_no']; ?></td>
                                                             <td><?php echo $row['cust_id']; ?></td>
                                                             <td><?php echo $row['organization_name']; ?></td>
                                                             <td><?php echo $row['contact_person_name']; ?></td>
                                                             <td><?php echo $row['gross_value']; ?></td>
                                                             <td><?php echo $row['tax_amount']; ?></td>
                                                             <td><?php echo $row['invoice_value']; ?></td>

                                                             <td>
                                                                 <a href="quotation_form.php?id=<?php echo $row['id']; ?>"><i
                                                                             class="fa fa-edit"></i> </a>
                                                                 <?php if ($row['type_id'] =='type_1') { ?>
                                                                 <a href="invoice_format1.php?iid=<?php echo $row['id']; ?>"><i
                                                                             class="fa fa-print"></i> </a>
                                                             <?php } else { ?>
                                                             <a href="invoice_format2.php?iid=<?php echo $row['id']; ?>"><i
                                                                         class="fa fa-print"></i> </a>
                                                             <?php } ?>
<!--                                                                 <a onclick="mailinvoice('--><?php //echo $row['id']; ?>
<!--                                                                 ','--><?php ////echo $row['po_code']; ?><!--//');"><i-->
<!--//                                                                             class="fa fa-envelope"></i> </a>-->
                                                                 <a style="cursor:pointer"
                                                                    onclick="dela(<?php echo $row['id']; ?>)"><i
                                                                             class="fa fa-trash"></i></a>

                                                             </td>
                                                         </tr>
                                                         <?php
                                                         $ctr++;
                                                     }
                                                 }
											  ?>										 								
											</tbody>
										</table>
									</div>
									
									
									<nav aria-label="Page navigation">
									  <?php echo pagination('invoice_master.php',$total_pages,$page,$limit); ?>
									</nav>
									
								</div>
								</div>						 
							</form> 
							
							
						</div>
					</div>
				</div>
				
			</div>
		   
			
		</div>
			
	</div>
	
	
	
</body>





<script type="text/javascript" src="script/leave.js"></script>
<script type="text/javascript" src="js/toastr.min.js"></script>
<script type="text/javascript">
        $( document ).ready(function() 
		{
            if(localStorage.getItem("store_msg")=='delete')
            {
                $("#div_delete").remove();
                $(".mid-content").prepend('<div class="row" id="div_delete">'+
                    '<div class="alert alert-success col-md-12 alert-dismissible" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">×</span>'+
                    '</button>'+
                    'Tax Deleted Successfully'+
                    '</div>'+
                    '</div>');
                localStorage.setItem("store_msg","");
            }
			$('.input-daterange').datepicker
			({
				autoclose: true,
				todayBtn: "linked"
			});			
			
			$("select").change(function(){
				$(this).find("option:selected").each(function(){
					var optionValue = $(this).attr("value");
					if(optionValue){
						$(".box").show();
					} else{
						$(".box").hide();
					}
				});
			}).change();
			
        });

        function mailinvoice(id,po_code) {
            $.ajax({
                type: 'GET',
                url: 'mail_invoice_format.php',
                cache: false,
                data: {iid: id,po_code:po_code},
                success: function (data) {
                    if(data == 1) {
                        toastr.success('Mail Sent Successfully');
                    }
                    else
                    {
                        toastr.error('Mail Was Not Sent');
                    }
                }
            });
        }
        function dela(id)
        {
            var url = window.location.href;
            $("#div_delete").remove();
            x=confirm("Do You want to Delete This Entry");
            if(x==true)
            {
                $.ajax({
                    type: 'GET',
                    url: 'delete.php',
                    dataType: 'json',
                    cache: false,
                    data: {peti_payment:id},
                    success: function(data)
                    {

                        $.each( data, function( key, value )
                        {
                            if(key=='success')
                            {
                                toastr.success('Deleted Successfully');
                                setTimeout(function(){
                                    window.location.href=""+url+"";
                                },2500);



                            }

                        });

                    },
                    error: function(data)
                    {

                        $.each( data, function( key, value )
                        {
                            console.log( key + ": " + value );
                        });

                    }
                });
            }
        }
		
    </script>
</html>
