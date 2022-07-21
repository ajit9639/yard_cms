
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>



<?php
$text="";
include_once('config.php');
include_once('header.php');
$connn = mysqli_connect('localhost:3306','insight5_mkumarhrm','insight@2021#','insight5_mkumarhrmdb');
if(($_SESSION['permission_all']=='1')||($_SESSION['invoice_master'] == 1))
{
//   user is allowed to visit the page
}
else
{
    echo "<script>window.location.href='dashboard.php';</script>";
}

$ccd = $_SESSION['ccod'];
if (isset($_POST['save2']))
{
		$ccode = $_POST['ccode'];
		$orgname = $_POST['orgname'];
		$cname = $_POST['cname'];
		$cphone = $_POST['cphone'];
		$cemail = $_POST['cemail'];
		$address = $_POST['address'];
		$state = $_POST['state'];
		$gstno = $_POST['gstno'];
		$panno = $_POST['panno'];

	
	$data = mysqli_query($connn, "INSERT INTO `client_tbl`(`cust_code`, `organization_name`, `contact_person_name`, `contact_phone`, `contact_email`, `address`, `state_code`, `gst_no`, `pan_no`) VALUES ('$ccode','$orgname','$cname','$cphone','$cemail','$address','$state','$gstno','$panno')"); 
	if($data)
		{
			echo "<script>alert('Saved successfully');
			document.location = 'quotation_form.php';</script>";
			//header('Location:quotation_form.php');
		 
		} 
	else
	{
	echo "<script>alert('not regsitered');</script>";
	}
}
	
	?>
<title>Protective | Invoice Form</title>
<style>
    .accordion .panel-heading .panel-title a{
        display: block;
    }
</style>

<?php

if(isset($_REQUEST['form_submitted'])) {

    $clt_id = $_REQUEST['clt_id'];
    $invoice_no = $_REQUEST['invoice_no'];
    $mobile_no = $_REQUEST['mobile'];
    $delivery_date = $_REQUEST['delivery_date'];
    $st=explode("/",$delivery_date);
    $dt=$st[2]."-".$st[1]."-".$st[0];
    $delivery_date=date('Y-m-d',strtotime($dt));
    $work_order=$_POST['work_order'];
    $work_order_date=$_POST['work_order_date'];
    $st=explode("/",$work_order_date);
    $dt=$st[2]."-".$st[1]."-".$st[0];
    $work_order_date=date('Y-m-d',strtotime($dt));
	 $bill_period=$_POST['bill_month'];
	 $vendor_code=$_POST['vendor_code'];
	$cliend_id=$_POST['client_id'];
    $place_of_supply=$_POST['place_of_supply'];
    $payment_method=$_POST['payment_method'];

	
	
        if(($cliend_id == '')||($cliend_id== '0'))
    {
	//	$inv_code='INVOICE-'.sprintf("%00005d",$inv_id);
		
			 echo "<script>alert('Please Select a Client');
			document.location = 'quotation_form.php';</script>";

    }
	else{
		

			$data = mysqli_query($connn, "INSERT INTO `invoice_tbl_new`(`invoice_no`, `cust_id`, `delivery_date`, `work_order`, `work_order_date`, `bill_period`, `vendor_code`, `mobile`, `payment_method`) VALUES ('$invoice_no','$cliend_id','$delivery_date','$work_order','$work_order_date','$bill_period','$vendor_code','$mobile','$payment_method')"); 
	if($data)
		{
		
	  $last_id = $connn->insert_id;
		
		

	
	$cnt = count($_POST['sac_code']);
for($i=0;$i<$cnt;$i++){
   $item1 = $_POST['sac_code'][$i];
	 $item2 = $_POST['sac_code'][$i];
	 $item3 = $_POST['sac_code'][$i];
	 $item4 = $_POST['sac_code'][$i];
	 $item5 = $_POST['sac_code'][$i];
	 $item6 = $_POST['sac_code'][$i];
	
	$data = mysqli_query($connn, "INSERT INTO `item_details_tbl`(`code_no`, `sac_code`, `particular`, `quantity`, `price`, `amount`) VALUES ('$ccode','$orgname','$cname','$cphone','$cemail','$address','$state','$gstno','$panno')"); 
	if($data)
		{
			echo "<script>alert('Saved successfully');
			document.location = 'quotation_form.php';</script>";
			//header('Location:quotation_form.php');
		 
		} 
	else
	{
	echo "<script>alert('not regsitered');</script>";
	}
   
}
		
	






         

	
}
}}
?>


	<body>
<!-- Modal Box Create Vendor -->
<div class="modal fade" id="create_vendor_modal" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="client_form"  method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id=""><h3> Create New Client</h3></h4>
                </div>
                <div class="modal-body">
                    <!--                    <div class="form-group">-->
                    <!--                        <label class="col-md-3 col-xs-12">Client Name</label>-->
                    <!--                        <div class="col-sm-9">-->
                    <!--                            <input type="text" class="form-control" id="new_client_name" placeholder="Client Name">-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="form-group">
					<label class="col-md-3 col-xs-12">Client Code</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="ccode" value="" placeholder="Code For Client">
					</div>
				</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">Organization Name</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="orgname" value="" placeholder="Organization Name">
		</div>
					</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">Client Name</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="cname" value="" placeholder="Client Name">
		</div>
					</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">Contact Phone Number</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="cphone" value="" placeholder="Contact Number">
		</div>
					</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">Contact Email</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="cemail" value="" placeholder="Contact Email">
		</div>
					</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">Address</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="address" value="" placeholder="Address">
		</div>
					</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">State</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="state" value="" placeholder="State">
		</div>
					</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">GST No</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="gstno" value="" placeholder="GST No">
				</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 col-xs-12">PAN No</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" name="panno" value="" placeholder="PAN No">
			</div>
		</div>
                </div>
				<div class="modal-footer">
				<button name="save2" type="submit" class="btn btn-warning btn-sm" ><i class="fa fa-save"></i> Save</button>
					<a class="btn btn-sm btn-warning" href="quotation_form.php"><i class="fa fa-remove"></i> Cancel</a>
				</div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-10 col-xs-12">
    <div class="mid-content clearfix">
        <div class="con_mid">
            <form class="form-horizontal employee" name="quotation_form" id="quotation_form" method="post" enctype="multipart/form-data">
                <h3><?php echo $text." Invoice";?></h3>
                <input type="hidden" name="id" id="id" value="<?php if(isset($id)) echo $id; ?>">
                <input type="hidden" name="form_submitted" id="form_submitted" value="0">
               	 <div class="form-group">
                    <label class="col-md-2 col-xs-12">Bill To</label>
                    <div class="col-sm-6">
                        <?php
                        $query = mysql_query("select id,cust_code,organization_name,contact_phone, contact_email from client_tbl where 1=1");
                        $select = '<select name="client_id" id="client_id" onchange="getdetail(0);" class="form-control"><option value="">Select Client</option>';
						print_r($row);
                        while ($row = mysql_fetch_assoc($query)) {
					
                            if(isset($data['client_id']) && ($data['client_id'] == $row['cust_code']))
                            {
                                $select .= "<option selected='selected' value='" . $row['cust_code'] . "'>" . $row['cust_code'] . "-" . $row['organization_name'] . "</option>";
								$_SESSION['ccod'] =$row['cust_code'];
                            }
                            else {
                                $select .= "<option value='" . $row['cust_code'] . "'>" . $row['cust_code'] . "-" . $row['organization_name'] . "</option>";
                            }

                        }
                        $select .='</select>';
                        echo $select;
                        ?>

                    </div>
                    <div class="col-sm-3 padding-none">
                        <a class="create_text" data-toggle="modal" data-target="#create_vendor_modal" data-backdrop="static" data-whatever="Create New Client"><i class="fa fa-plus"></i> Create New Client </a>
                    </div>
                </div>
						
			
 	
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Client Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" readonly="readonly" name="client_name" id="client_name" value="<?php if(isset($client_name)) echo $client_name; else echo ''; ?>"  placeholder="Client Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Contact No</label>
                    <div class="col-sm-6">
                        <input type="text"  name="phone_no" readonly="readonly" id="phone_no" class="form-control" value="<?php if(isset($phone_no)) echo $phone_no; else echo ''; ?>"  placeholder="9825825822">
                    </div>
                   <!-- <div class="col-sm-3">
                        <input type="text" class="form-control" readonly="readonly" name="mobile_no" id="mobile_no" value="
<?php if(isset($mobile_no)) echo $mobile_no; else echo ''; ?>
"  placeholder="9825825822">
                    </div> -->

                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Email Id</label>
                    <div class="col-sm-6">
                        <input type="email" name="email_id" readonly="readonly"  class="form-control" id="email_id" value="<?php if(isset($email_id)) echo $email_id; else echo ''; ?>"  placeholder="xyz@abc.com">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Address</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" readonly="readonly" id="address" name="address" value="<?php if(isset($address)) echo $address; else echo ''; ?>"  placeholder="Address">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-2 col-xs-12">Invoice No</label>
                    <div class="col-sm-6">
                            <input type="text"   name="invoice_no" id="invoice_no" value="<?php if(isset($data['invoice_code'])) echo $data['invoice_code']; ?>" class="form-control admin" placeholder="Autogenerated Invoice No" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Invoice Date</label>
                    <div class="col-sm-6">
                        <div class="datepicker_cal">
                            <input type="text"   name="delivery_date" id="delivery_date" value="<?php if(isset($invoice_date)&& ($invoice_date != '01/01/1970')) echo $invoice_date; ?>" class="form-control admin" placeholder="dd/mm/yyyy"/>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Work Order No</label>
                    <div class="col-sm-6">
                        <input type="text"   name="work_order" id="work_order" value="<?php if(isset($data['work_order'])) echo $data['work_order']; ?>" class="form-control admin" placeholder="Work Order No" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Work Order Date</label>
                    <div class="col-sm-6">
                        <div class="datepicker_cal">
                            <input type="text"   name="work_order_date" id="work_order_date" value="<?php if(isset($data['work_order_date'])&& ($data['work_order_date'] != '01/01/1970')) echo $data['work_order_date']; ?>" class="form-control admin" placeholder="dd/mm/yyyy"/>
                        </div>

                    </div>
                </div>
             <!--   <div class="form-group">
                    <label class="col-md-2 col-xs-12">Bill Period From</label>
                    <div class="col-sm-6">
                        <div class="datepicker_cal">
                            <input type="text"   name="bill_from" id="bill_from" value="<?php //if(isset($bill_from)&& ($bill_from != '01/01/1970')) echo $bill_from; ?>" class="form-control admin" placeholder="dd/mm/yyyy"/>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Bill Period To</label>
                    <div class="col-sm-6">
                        <div class="datepicker_cal">
                            <input type="text"   name="bill_to" id="bill_to" value="<?php //if(isset($bill_to)&& ($bill_to != '01/01/1970')) echo $bill_to; ?>" class="form-control admin" placeholder="dd/mm/yyyy"/>
                        </div>

                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Bill Period</label>
                    <div class="col-sm-6">
                        
                            <input type="text"   name="bill_month" id="bill_month"  class="form-control admin" placeholder="Bill Period"/>
                        

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Vendor Code</label>
                    <div class="col-sm-6">
                        <input type="text"   name="vendor_code" id="vendor_code" value="<?php if(isset($data['vendor_code'])) echo $data['vendor_code']; ?>" class="form-control admin" placeholder="Vendor Code" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Mobile Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php if(isset($data['mobile_no'])) echo $data['mobile_no']; ?>" id="mobile" name="mobile" placeholder="Mobile Number">
                    </div>
                </div>
          <!--   <div class="form-group">
                    <label class="col-md-2 col-xs-12">Category</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php if(isset($data['category'])) echo $data['category']; ?>" id="category" name="category" placeholder="Category">
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Cost Code</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php if(isset($data['cost_code'])) echo $data['cost_code']; ?>" id="cost_code" name="cost_code" placeholder="Cost Code">
                    </div>
                </div> 

               


                <div class="form-group">
                    <label class="col-md-2 col-xs-12">Place Of Supply</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php if(isset($data['vendor_code'])) echo $data['vendor_code']; ?>" name="place_of_supply" id="place_of_supply" value="<?php if(isset($place_of_supply)) echo $place_of_supply; else echo ''; ?>" placeholder="Place Of Supply">
                    </div>
                </div> -->

                <div class="form-group" style="<?php  echo $style_po; ?>">
                    <label class="col-md-2 col-xs-12">GST TYPE</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="payment_method" id="payment_method">
                            <option value='CGST'>CGST</option>
							<option value='IGST'>IGST</option>
                        </select>
                    </div>
                </div>
       <!--        <div class="form-group">
                    <label class="col-md-2 col-xs-12">Amended Work Order</label>
                    <div class="col-sm-6">
                     <input type="text" class="form-control" name="ammendment_work_order" id="ammendment_work_order"  placeholder="Ammended Work Order">
                    </div>
                </div>  
           <div class="form-group" style="<?php  echo $style_po; ?>">
                    <label class="col-md-2 col-xs-12">Format</label>
                    <div class="col-sm-6">
                        <select class="form-control" onchange="showhide();" name="type_id" id="type_id">
                            <option value='type_1'>Format 1</option>
                            <option <?php if(isset($data['type_id']) && ($data['type_id'] == 'type_2')) { echo 'selected=selected'; } ?> value="type_2">Format 2</option>
                        </select>
                    </div>
                </div> -->





            <div class="col-md-12 margin-top20 type_1">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>HSN/SAC Code</th>
                            <th>Particulars</th>
                            <th>Quantity</th>
							<th>Unit Price</th>
                            <th>Amount</th>
                            <th width="20px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="item">
                                <td><input type="text" class="form-control item_code" name="item_code[]"></td>
                            <td><input type="text" class="form-control sac_code" name="sac_code[]"/> </td>
                            <td><input type="text" class="form-control particulars" name="particulars[]"></td>
                            <td><input type="text" class="form-control quantity" id="quantity" name="quantity[]"/> </td>
                            <td><input type="text" class="form-control unit_price" id="unit_price" name="unit_price[]"/> </td>
							 <td><input type="text" class="form-control amount" id="amount" name="amount[]"/> </td>
                            <td><label class="total tfootcontent" id="total" name="total[]"></label></td>
                            <td><button type="button" class="btn btn-danger btn-xs" onclick="deletetr(this)" style="display: none;"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align: left;"><button type="button" class="btn btn-info btn-md"><i class="fa fa-plus"></i> Add</button></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" class="tfootcontent">Value of taxable service</td>
                            <td colspan="2" class="tfootcontent"><span name="gross_total" id="gross_total"  class="tfootcontent"></span></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <!--    <div class="col-md-12 margin-top20">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SAC</th>
                            <th>Service Name</th>
                            <th>QTY</th>
                            <th>Rate</th>
                            <th>Gross</th>
                            <th>CGST</th>
                            <th>CGST Amount</th>
                            <th>SGST</th>
                            <th>SGST Amount</th>
                            <th>IGST</th>
                            <th>IGST Amount</th>
                            <th>Total TaxAmount</th>
                            <th width="20px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="itema">
                            <td><input type="text" class="form-control sac" name="sac[]"></td>
                            <td><input type="text" class="form-control service_name" name="service_name[]"></td>
                            <td><input type="text" class="form-control qty" name="qty[]"></td>
                            <td><input type="text" class="form-control bill_rate" name="bill_rate[]"></td>
                            <td><input type="text" class="form-control gross" readonly="readonly" name="gross[]"></td>
                            <td><input type="text" class="form-control csgt_rate" name="cgst_rate[]"/> </td>
                            <td><input type="text" class="form-control man_month cgst_amt" readonly="readonly" name="cgst_amt[]"/> </td>
                            <td><input type="text" class="form-control ssgt_rate" name="sgst_rate[]"/> </td>
                            <td><input type="text" class="form-control man_month sgst_amt" readonly="readonly" name="sgst_amt[]"/> </td>
                            <td><input type="text" class="form-control igst_rate" name="igst_rate[]"/> </td>
                            <td><input type="text" class="form-control man_month igst_amt" readonly="readonly" name="igst_amt[]"/> </td>
                            <td><span class="total_tax tfootcontent" name="total_tax[]"></span></td>
                            <td><button type="button" class="btn btn-dangera btn-xs" onclick="deletetr(this)"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td colspan="11" style="text-align: left;"><button type="button" class="btn btn-infa btn-md"><i class="fa fa-plus"></i> Add</button></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2" class="tfootcontent">Gross Value</td>
                            <td colspan="2" class="tfootcontent"><span id="gvalue" name="gvalue"  class="tfootcontent"></span></td>
                            <td colspan="2" class="tfootcontent">Tax Value</td>
                            <td class="tfootcontent"><span id="taxvalue" name="taxvalue"  class="tfootcontent"></span></td>
                            <td colspan="2" class="tfootcontent">Invoice Value</td>
                            <td colspan="2" class="tfootcontent"><span id="ivalue" name="ivalue"  class="tfootcontent"></span></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>  -->

            <div class="form-group">
                <label class="col-md-2 col-xs-12"></label>
                <div class="col-sm-9">

                    <input type="submit" class="btn btn-sm btn-warning" name="form_submitted" value="Save">

                    <a class="btn btn-sm btn-warning" href="#" id="btn_cancel"> <i class="fa fa-remove"></i> Cancel</a>

                </div>
            </div>
            </form>
        </div>

    </div>










</div>
<div style="display: none;background-color: bisque !important;" id="error_area" name="error_area">
</div>
</body>

<?php
if(isset($_GET['id']))
{ ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#type_id option:not(:selected)").remove();
        });
    </script>
<?php
}
?>

<script>
$(document).ready(function(){
  $("#quantity, #unit_price").change(function(){
     var rate = parseFloat($('#quantity').val()) || 0;
    var box = parseFloat($('#unit_price').val()) || 0;

    $('#total').val(rate * box);    
  });
});
</script>

<script type="text/javascript">
    var email_valid = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
  /* $( document ).ready(function() {
        showhide();
        getdetail(0);
        var id = getUrlParameter('id');
        if(id!==undefined)
        {
            getquotationservice(id);
        }

        $(".btn-danger:first").hide();
        $(".btn-dangera:first").hide();
        $('.employ_code_sec').hide();
        $(".root_category").trigger("change");
        $('#save_emp_details').click(function(){
            $('.employ_code_sec').slideDown(300);
            $('#save_emp_details').hide();
        });

        $(".create_text").click(function(){
            setTimeout(function () {
                $("#create_vendor_modal").css('display','block');
            },400);
        });

        $('.datepicker_cal input').datepicker({
            todayBtn: "linked",
            language: "it",
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy'
        });

//        $('.datepicker_time input').timepicker({
//            'step': 1,
//            autoclose: true
//        });



    }); */

	
	
	
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

	
    function showhide() {
        if($("#type_id").val() == 'type_1')
        {
            $(".type_1").show();
            $(".btn-infa").hide();
            $(".qty").attr("readonly",true);
            $(".bill_rate").attr("readonly",true);
        }
        else
        {
            $(".type_1").hide();
            $(".qty").attr("readonly",false);
            $(".bill_rate").attr("readonly",false);
            $(".gross").attr("readonly",true);
            $(".btn-infa").show();
        }
    }

    function createclient()
    {
        if($("#new_client_name").val()=="")
        {
            $('body').find("#div_err").remove();
            $("#new_client_name").parent().append('<span id="div_err">Please Enter Client Name</span>');
            $("#new_client_name").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;

        }
        else if ($('#new_organization_name').val() == "")
        {
            $('body').find("#div_err").remove();
            $("#new_organization_name").parent().append('<span id="div_err">Please Enter Organization Name</span>');
            $("#new_organization_name").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }  else if ($('#new_contact_person_1').val() == "")
        {
            $('body').find("#div_err").remove();
            $("#new_contact_person_1").parent().append('<span id="div_err">Please Enter Contact Person Name</span>');
            $("#new_contact_person_1").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }  else if ($('#contact_1').val() == "")
        {
            $('body').find("#div_err").remove();
            $("#contact_1").parent().append('<span id="div_err">Please Enter Contact Number</span>');
            $("#contact_1").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }  else if ($('#email_1').val() == "")
        {
            $('body').find("#div_err").remove();
            $("#email_1").parent().append('<span id="div_err">Please Enter Email</span>');
            $("#email_1").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }else if ($('#new_address_1').val() == "")
        {
            $('body').find("#div_err").remove();
            $("#new_address_1").parent().append('<span id="div_err">Please Enter Address</span>');
            $("#new_address_1").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }
        else
        {
            if (phonenumber($("#contact_1").val()) == false) {
//                In-correct phone number provided by the user
                $('body').find("#div_err").remove();
                $("#contact_1").parent().append('<span id="div_err">Contact No. is Invalid</span>');
                $("#contact_1").focus();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
            else
            {
                if (($("#contact_2").val() != '')&&(phonenumber($("#contact_2").val()) == false)) {
//                In-correct phone number provided by the user
                    $('body').find("#div_err").remove();
                    $("#contact_2").parent().append('<span id="div_err">Contact No. is Invalid</span>');
                    $("#contact_2").focus();
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                }
                else
                {
//                        submit
                    $.ajax
                    ({
                        type: 'GET',
                        url: 'createclient.php',
                        cache: false,
                        async: false,
                        data: {
                            org_name: $("#new_organization_name").val(),
                            contact_name_1: $("#new_contact_person_1").val(),
                            contact_phone_1: $("#contact_1").val(),
                            contact_email_1: $("#email_1").val(),
                            contact_name_2: $("#new_contact_person_2").val(),
                            contact_phone_2: $("#contact_2").val(),
                            contact_email_2: $("#email_2").val(),
                            address: $("#new_address_1").val(),
                            gst: $("#gst").val(),
                        },
                        success: function (result) {

                            if(result != '0') {
                                var code = result;
                                setTimeout(function(){
                                    getclient(code);
                                    getdetail(code);
                                    $(".close_modal").trigger('click');
                                },200);


                            }
                            else if(result == '5')
                            {
                                alert("Organization Already Exists !!!");
                                location.reload(true);
                            }
                            else
                            {
                                alert("Error !!! Please Try Again");
                            }


                        },
                        error: function (data) {
                            alert("Error !!! Please Try Again");
                        }
                    });
                }
            }
        }

    }
    function getdetail(code)
    {
        if(code == '0')
        {
            code=$("#client_id").val();
        }
        if(code != '' ) {
            $.ajax({
                type: 'GET',
                url: 'get_client_detail.php',
                dataType: 'json',
                cache: false,
                async: false,
                data: {client_code: code},
                success: function (data) {

                    $.each(data, function (key, value) {
                        if (key == 'success') {
                            $("#client_name").val(value['org_name']);
                            $("#phone_no").val(value['contact_1']);
                            $("#mobile_no").val(value['contact_2']);
                            $("#email_id").val(value['email_1']);
                            $("#address").val(value['address']);

                        }

                    });

                },
                error: function (data) {
                }
            });
        }
    }

    function phonenumber(inputtxt)
    {
        var phone = inputtxt;
        var phoneNum = phone.replace(/[^\d]/g, '');
        if(phoneNum.length == 10 && phoneNum.length < 11 && phone.length == 10) {
            return true;
        }
        else
        {
            return false;
        }
    }

    function getclient(code)
    {
        var id=$("#id").val();
        if((id !='')&& (id>0))
        {

        }
        else
        {
            id='0';
        }
        $.ajax
        ({
            type: 'GET',
            url: 'get_client.php',
            cache: false,
            data: {code: code,id:id},
            success: function (data) {

                $("#org_name").replaceWith(data);
            },
            error: function (data) {
            }
        });
    }

    function submitform(formtype)
    {
        if($("#org_name").val()=="")
        {
            $('body').find("#div_err").remove();
            $("#org_name").parent().append('<span id="div_err">Please Select Business Name</span>');
            $("#org_name").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;

        }
        else if ($('#date_of_quotation').val() == "")
        {
            $('body').find("#div_err").remove();
            $("#date_of_quotation").parent().append('<span id="div_err">Date Of Quotation is a required field</span>');
            $("#date_of_quotation").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }

        else if ($('#status').val() == "")
        {
            $('body').find("#div_err").remove();
            $("#status").parent().append('<span id="div_err">Status is a required field</span>');
            $("#status").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }
        else if (!email_valid.test($('#email_id').val()))
        {
            $('body').find("#div_err").remove();
            $("#email_id").parent().append('<span id="div_err">Please Enter Valid Email</span>');
            $("#email_id").focus();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        }
        else
        {
            if(formtype=="po")
                var url="save_po.php";
            else
                var url="save_quotation.php";
            $("#form_submitted").val(1);
            $('body').find("#div_err").remove();
            var data=Array();
            var webconent=$("#test").serializeArray();
            $(document).find(".item").each(function(index){
                if($(this).find(".qty").val()!="" && $(this).find(".price").val()!="")
                {
                    data[index]={};
                    data[index]["service_name"]=$(this).find(".service_list").val();
                    data[index]["plan"]=$(this).find(".plan").val();
                    data[index]["qty"]=$(this).find(".qty").val();
                    data[index]["price"]=$(this).find(".price").val();
                    data[index]["date"]=$(this).find(".date").val();
                }
            });
            var taxarray=Array();
            $(".tax_tr").each(function (idx) {
                if($(this).find(".tax").val()!="")
                {
                    taxarray[idx]={};
                    taxarray[idx]["name"]=$(this).find("td:first").text().trim();
                    taxarray[idx]["rate"]=$(this).find(".tax").val();
                }
            });
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                cache: false,
                async:false,
                data: {'id':$("#id").val(),'po_id':$("#po_id").val(),'org_name':$('#org_name').val(),'date_of_quotation':$('#date_of_quotation').val(),'client_name':$('#client_name').val(),'phone_no':$('#phone_no').val(),'mobile_no':$('#mobile_no').val(),'email_id':$('#email_id').val(),'address':$('#address').val(),'status':$('#status').val(),'delivery_period':$('#delivery_period').val(),'gross_total':$('#gross_total').text(),'discount':$('#discount').val(),'net_total':$('#net_total').text(),'service_tax':JSON.stringify(taxarray),'final_total':$('#final_total').text(),'service':JSON.stringify(data),'webconent':JSON.stringify(webconent),'mail_subject':$("#mail_subject").val(),'payment_method':$("#payment_method").val(),'description':$("#description").val(),'advance_payment':$(".advance_payment").val()},
                success: function(data)
                {
                    if(data!="") {
                        if (formtype == "po") {
                            var tempid = getUrlParameter('id');
                            window.location = "po_sample.php?id=" + data;
                        }

                        else {
                            if ($("#status option:selected").html() == 'Approved') {
                                location.reload(true);
                            }
                            else {
                                window.location = "quotation.php";
                            }
                        }
                    }
                },
                error: function(data)
                {
                }
            });
        }
    }

    $(document).on("change",".root_category",function () {
        var reftr=$(this);
        var id=reftr.val();
        $.ajax
        ({
            type: 'GET',
            url: 'getsubcategory.php?main_id='+id,
            cache: false,
            async:false,
            success: function (data) {
                reftr.parent().parent().find(".sub_category").html(data);
                reftr.parent().parent().find(".sub_category_id").trigger("change");
            },
            error: function (data) {
            }
        });
    });
    $(document).on("change",".sub_category_id",function () {
        var reftr=$(this);
        var id=reftr.val();
        $.ajax
        ({
            type: 'GET',
            url: 'getservice.php?main_id='+id,
            cache: false,
            async:false,
            success: function (data) {
                reftr.parent().parent().find(".service_record").html(data);
                reftr.parent().parent().find(".service_list").trigger("change");
            },
            error: function (data) {
            }
        });
    });
    $(document).on("change",".plan",function () {

        var plan=$(this).val();
        var price=$(this).parent().parent().find(".service_list option:selected").attr(plan);
        $(this).parent().parent().find(".price").val(price);
    });
    $(document).on("change",".service_list",function () {
        $(this).parent().parent().find(".plan").trigger("change");
    });

    $(".btn-info").click(function () {
        $(".btn-danger").show();
        var x=$(".item:first").html().trim();
        $("<tr class='item'>"+x+"</tr>").insertAfter($(".item:last"));
        $(".btn-danger:first").hide();
        $(".total:last").html("");
        $(".sub_category_id:last").trigger("change");
        $(".mandays, .rate").keyup(function () {
            x=$(this).parent().parent().find('.rate').val();
            y=$(this).parent().parent().find('.mandays').val();
            if((isNaN(x))&&(isNaN(y)))
            {

            }
            else
            {
                z=x*y;
                if(!isNaN(z)) {
                    $(this).parent().parent().find('.total').html(z);
                    sum=0;
                    $(".total").each(function(){
                        c=$(this).html();
                        sum=parseFloat(sum)+parseFloat(c);

                    });
                    $("#gross_total").html('');
                    $("#gross_total").html(sum);
                    $(".gross").val(0);
                    $(".gross").val(sum);
                    $(".csgt_rate").trigger('keyup');
                }
            }
            // calculateamount();
        });
        $(".mandays, .rate").keyup(function () {
            x=$(this).parent().parent().find('.rate').val();
            y=$(this).parent().parent().find('.mandays').val();
            if((isNaN(x))&&(isNaN(y)))
            {

            }
            else
            {
                z=x*y;
                if(!isNaN(z)) {
                    $(this).parent().parent().find('.total').html(z);
                    sum=0;
                    $(".total").each(function(){
                        c=$(this).html();
                        sum=parseFloat(sum)+parseFloat(c);

                    });
                    $("#gross_total").html('');
                    $("#gross_total").html(sum);
                    $(".gross").val(0);
                    $(".gross").val(sum);
                }
            }
            // calculateamount();
        });
    });


    $(".csgt_rate, .ssgt_rate,.igst_rate").keyup(function () {
        $(".gross").each(function(){
        amt=$(this).parent().parent().find('.gross').val();
        cgst=$(this).parent().parent().find('.csgt_rate').val();
        ssgst=$(this).parent().parent().find('.ssgt_rate').val();
        igst=$(this).parent().parent().find('.igst_rate').val();

        if(isNaN(cgst))
        {
            cgst=0;
        }
            camt = (parseFloat(amt) * parseFloat(cgst)) / 100;
        if(isNaN(camt))
        {
            camt=0;
        }
            $(this).parent().parent().find('.cgst_amt').val(camt);

            samt=(parseFloat(amt)*parseFloat(ssgst))/100;
            if(isNaN(samt))
            {
                samt=0;
            }
            $(this).parent().parent().find('.sgst_amt').val(samt);

            iamt=(parseFloat(amt)*parseFloat(igst))/100;
            if(isNaN(iamt))
            {
                iamt=0;
            }
            $(this).parent().parent().find('.igst_amt').val(iamt);
                   total_tax_amt=parseFloat(camt)+parseFloat(samt)+parseFloat(iamt);
            $(this).parent().parent().find('.total_tax').html(total_tax_amt);
            gval=$("#gvalue").val();
            taxvalue=$("#taxvalue").val();
            ivalue=$("#ivalue").val();
            if(gval == '')
            {
                gval=0;

            }
            if(taxvalue == '')
            {
                taxvalue=0;
            }
            if(ivalue == '')
            {
                ivalue=0;
            }
            gval=parseFloat(amt)+parseFloat(gval);
            if(!isNaN(gval))
            {
                $("#gvalue").html(gval);
            }
            taxvalue=parseFloat(total_tax_amt)+parseFloat(taxvalue);
            if(!isNaN(taxvalue)) {
                $("#taxvalue").html(taxvalue);
            }

             ivalue=parseFloat(gval)+ parseFloat(taxvalue)+parseFloat(ivalue);
            if(!isNaN(ivalue)) {
                $("#ivalue").html(ivalue);
            }



        });

        // calculateamount();
    });

    $(".btn-infa").click(function () {
        gval=0;
        taxvalue=0;
        ivalue=0;
        $(".btn-dangera").show();
        var x=$(".itema:first").html().trim();
        $("<tr class='itema'>"+x+"</tr>").insertAfter($(".itema:last"));
        $(".btn-dangera:first").hide();
        $(".total_tax:last").html("");
        $(".sub_category_id:last").trigger("change");
        // $(this).parent().parent().find('.total_tax').html('');
        $(".csgt_rate, .ssgt_rate,.igst_rate").keyup(function () {
            $(".gross").each(function(){
                amt=$(this).parent().parent().find('.gross').val();
                cgst=$(this).parent().parent().find('.csgt_rate').val();
                ssgst=$(this).parent().parent().find('.ssgt_rate').val();
                igst=$(this).parent().parent().find('.igst_rate').val();
                if(isNaN(cgst))
                {
                    cgst=0;
                }
                camt = (parseFloat(amt) * parseFloat(cgst)) / 100;
                if(isNaN(camt))
                {
                    camt=0;
                }
                $(this).parent().parent().find('.cgst_amt').val(camt);

                samt=(parseFloat(amt)*parseFloat(ssgst))/100;
                if(isNaN(samt))
                {
                    samt=0;
                }
                $(this).parent().parent().find('.sgst_amt').val(samt);

                iamt=(parseFloat(amt)*parseFloat(igst))/100;
                if(isNaN(iamt))
                {
                    iamt=0;
                }
                $(this).parent().parent().find('.igst_amt').val(iamt);
                total_tax_amt=parseFloat(camt)+parseFloat(samt)+parseFloat(iamt);
                $(this).parent().parent().find('.total_tax').html(total_tax_amt);
                gval=parseFloat(gval)+parseFloat(amt);
                taxvalue=parseFloat(taxvalue)+parseFloat(total_tax_amt);
                ivalue=parseFloat(ivalue)+parseFloat(gval)+parseFloat(taxvalue);
                if(gval == '')
                {
                    gval=0;

                }
                if(taxvalue == '')
                {
                    taxvalue=0;
                }
                if(ivalue == '')
                {
                    ivalue=0;
                }
                if(!isNaN(gval))
                {
                    $("#gvalue").html(gval);
                }
                taxvalue=parseFloat(total_tax_amt)+parseFloat(taxvalue);
                if(!isNaN(taxvalue)) {
                    $("#taxvalue").html(taxvalue);
                }

                ivalue=parseFloat(gval)+ parseFloat(taxvalue)+parseFloat(ivalue);
                if(!isNaN(ivalue)) {
                    $("#ivalue").html(ivalue);
                }



            });
ttamt=0;
totax=0;
todiff=0;
            $(".gross").each(function(){
                camt= $(this).parent().parent().find('.gross').val();
                ttax= $(this).parent().parent().find('.total_tax').html();
                ttamt=parseFloat(camt)+parseFloat(ttamt);
                totax=parseFloat(ttax)+parseFloat(totax);
                todiff=parseFloat(ttamt)+parseFloat(totax);
                $("#gvalue").html(ttamt);
                $("#taxvalue").html(totax);
                $("#ivalue").html(todiff);
            });
            // calculateamount();
        });
        $(".qty,.bill_rate").keyup(function () {
            if($("#type_id").val() == 'type_1') {} else {
                x = $(this).parent().parent().find('.qty').val();
                y = $(this).parent().parent().find('.bill_rate').val();
                if ((isNaN(x)) && (isNaN(y))) {

                }
                else {
                    z = x * y;
                    if (!isNaN(z)) {
                        $(this).parent().parent().find('.gross').val(z);
                        $(this).parent().parent().find('.gross').trigger('keyup');
                        $(this).parent().parent().find('.csgt_rate').trigger('keyup');

                    }
                }
            }
        });
    });
    function  deletetr(ref) {
        $(ref).parent().parent().remove();
    }
    $(document).on("keyup",".price, .qty",function () {
        var qty=parseFloat($(this).parent().parent().find(".qty").val());
        var price=parseFloat($(this).parent().parent().find(".price").val());
        if(!isNaN(qty) && !isNaN(price))
        {
            var total=qty*price;
            $(this).parent().parent().find(".total").html(total);
            calculateamount();
        }
    });
    $(".qty,.bill_rate").keyup(function () {
        if($("#type_id").val() == 'type_1') {} else {
            x = $(this).parent().parent().find('.qty').val();
            y = $(this).parent().parent().find('.bill_rate').val();
            if ((isNaN(x)) && (isNaN(y))) {

            }
            else {
                z = x * y;
                if (!isNaN(z)) {
                    $(this).parent().parent().find('.gross').val(z);
                    $(this).parent().parent().find('.gross').trigger('keyup');
                    $(this).parent().parent().find('.csgt_rate').trigger('keyup');

                }
            }
        }
    });
    $(".mandays, .rate").keyup(function () {
       x=$(this).parent().parent().find('.rate').val();
       y=$(this).parent().parent().find('.mandays').val();
       if((isNaN(x))&&(isNaN(y)))
       {

       }
       else
       {
           z=x*y;
           if(!isNaN(z)) {
               $(this).parent().parent().find('.total').html(z);
               sum=0;
               $(".total").each(function(){
                   c=$(this).html();
                   sum=parseFloat(sum)+parseFloat(c);

               });
               $("#gross_total").html('');
               $("#gross_total").html(sum);
               $(".gross").val(0);
               $(".gross").val(sum);
           }
       }
        // calculateamount();
    });

    function calculateamount()
    {

        var grosstotal=0;
        $(document).find(".total").each(function () {
            var x=parseFloat($(this).text());
            if(!isNaN(x))
            {
                grosstotal+=x;
            }
        });
        $("#gross_total").html(grosstotal);
    }

    function getquotationservice(id) {
var ctr=0;
        $.ajax({
            type: 'post',
            url: 'save_quotation.php',
            cache: false,
            async:false,
            data: {'id':id,"action":"getquotetionservice"},
            success: function(data)
            {
                var data=JSON.parse(data);

                $.each(data,function (k,v) {
                    ctr++;

                    $(".item:eq("+k+")").find(".wo_number").val(v["wo_line"]);
                    $(".item:eq("+k+")").find(".labour_type").val(v["labour_type"]);
                    $(".item:eq("+k+")").find(".sms").val(v["department"]);
                    $(".item:eq("+k+")").find(".mandays").val(v["mandays"]).trigger("change");
                    $(".item:eq("+k+")").find(".man_month").val(v["man_month"]).trigger("keyup");
                    $(".item:eq("+k+")").find(".rate").val(v["rate"]).trigger("change");
                    $(".item:eq("+k+")").find(".total").html(v["amount"]);
                    $(".btn-info").click();

                    //console.log(v['service_last_category']);
                });
                if(ctr>0) {
                    $(".item:last").remove();
                }
                $.ajax({
                    type: 'post',
                    url: 'save_quotation.php',
                    cache: false,
                    async:false,
                    data: {'id':id,"bill":"bill"},
                    success: function(data)
                    {
                        var data=JSON.parse(data);

                        $.each(data,function (k,v) {
                            ctr++;

                            $(".itema:eq("+k+")").find(".sac").val(v["sac"]);
                            $(".itema:eq("+k+")").find(".qty").val(v["quantity"]);
                            $(".itema:eq("+k+")").find(".bill_rate").val(v["rate"]);
                            $(".itema:eq("+k+")").find(".service_name").val(v["service_name"]);
                            $(".itema:eq("+k+")").find(".gross").val(v["amount"]);
                            $(".itema:eq("+k+")").find(".csgt_rate").val(v["cgst_rate"]).trigger("keyup");
                            // $(".itema:eq("+k+")").find(".cgst_amt").val(v["cgst_amt"]);
                            $(".itema:eq("+k+")").find(".ssgt_rate").val(v["sgst_rate"]).trigger("keyup");
                            // $(".itema:eq("+k+")").find(".sgst_amt").html(v["sgst_amt"]);
                            $(".itema:eq("+k+")").find(".igst_rate").val(v["igst_rate"]).trigger("keyup");
                            // $(".itema:eq("+k+")").find(".igst_amt").html(v["igst_amt"]);
                            $(".btn-infa").click();

                            //console.log(v['service_last_category']);
                        });
                        if(ctr>0)
                            $(".itema:last").remove();
                    },
                    error: function(data)
                    {
                    }
                });



            },
            error: function(data)
            {
            }
        });
    }
$("#btn_cancel").click(function(){
    history.go(-1);
});


</script>
</html>
