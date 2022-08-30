<?php
include_once('includes/db.php');



$id = $_GET['id'];

$query = mysqli_query($conn , "SELECT * FROM `unloading_rake_closing` where `rake_opening_reference`='$id' ");
$query1 = mysqli_fetch_assoc($query);

$query2 = mysqli_query($conn , "SELECT * FROM `unloading_rake_opening` where `id`='$id' ");
$query3 = mysqli_fetch_assoc($query2);

$query4 = mysqli_query($conn , "SELECT * FROM `unloading_vehicle_in_temp` where `unloading_ref_id`='$id' ");
$query5 = mysqli_fetch_assoc($query4);

$query6 = mysqli_query($conn , "SELECT * FROM `unloading_vehicle_out_temp` where `unloading_ref_id`='$id' ");
$query7 = mysqli_fetch_assoc($query6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="keywords" content="Complains" />
<meta name="description" content="Complains">
<title>YARD: Print Rake Kata</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!Doctype html>
<html>
<head>

<style>
body{
	background:#fff;
	font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;
    margin:0px;
	}
.page {
    width: 8.26in;
    min-height: 11.89in;
    border: 0px solid;
    margin: 0px auto;
    background: white;
    padding: 10px;
    padding-top: 0px;
}
	


.header{
	height:50px;
	border:1px solid;
	
	
	}
.company_heading{
	padding:0px;
	text-align:center;
	margin-top:0px;
	position:inherit;
	line-height:1px;
	font-size:14px;
	font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;
	}
	
.company_address{
	padding-top:2px;
	text-align:center;
	margin-top:0px;
	position:inherit;
	line-height:17px;
	font-size:12px;
	
	}
	
.company_gst{
	padding-top:2px;
	text-align:center;
	margin-top:0px;
	position:inherit;
	line-height:2px;
	font-size:18px;
	font-weight:bold;
	
	}
.middle_row{
	height:50px;
	border:1px solid;
	font-size:15px;
	line-height:20px;
	
	}
.left{
	float:left;
	position:relative;
	left:10px;
	margin-top: 2px;
	}	
.right{
	float:right;
	position:relative;
	right:10px;
	margin-top: 2px;
	}
.address{
	border:1px solid;
	height:120px;
	
	}

.address1{
	border:1px solid;
	min-height:30px;
	
	}

.address2{
	border:1px solid;
	min-height:75px;
	
	}
	
	
.billing_address{
	height:100%;
	border-right:0px solid;
	width:394px;
	float:left;
	background:white;
	}
.shiping_address{
	height:100%;
	border-left:0px solid;
	width:394px;
	float:right;
	background:white;
	
	}	
.b_a{
	font-size:12px;
	padding-left:10px;
	padding-right:10px;
	padding-top:2px;
	padding-bottom:2px;
	}
.b_a label{
	font-weight:bold;
	}
.table{
	width:793px;
	border:1px solid #000;
	font-size:11px;
	min-height:50px;
	border-collapse:collapse;
	}

.table th{
	padding:2px;
	}	
	
.table td{
	padding:2px;
	}	

.table_scc{
	width:793px;
	border:1px solid #000;
	font-size:11px;
	min-height:100px;
	border-collapse:collapse;
	}

.table_scc th{
	padding:2px;
	}	
	
.table_scc td{
	padding:2px;
	}
	
.footer_middle{
	min-height:145px;
	border:1px solid;
	}
.sub_table{
	width:294px;
	font-size:12px;
	}
.word_amount{
	height:100%;
	border-right:0px solid;
	width:294px;
	float:left;
	background:white;
	}
.final_amount{
	height:100%;
	border-left:0px solid;
	width:294px;
	float:right;
	background:white;
	}	
.terms{
	border: 0px solid;
    min-height: 30px;
    font-size: 10px;
    padding: 20px;
    margin-top: 5px;
	}

.office_copy{
	width:97%;
	font-size:11px;
	}

.office_copy th{
	padding:5px;
	}	
	
.office_copy td{
	padding:5px;
	border:1px solid #000;
	font-style: italic;
	}	
</style>
</head>

<body>

<div class="page">
<!--Header Section-->
   <div class="header">
       <div class="company_logo">
           
       </div>
       <div class="company_heading">
       
            
            <h2 style="font-size:18px; padding-top: 11px;">
           RAKE VEHICLE - KATA REPORT
            </h2>
       </div>
       
        <div class="company_logo_right" style="float: right;
    margin-right: 80px;
    top: -100px;
    margin-top: -67px;">
            
       </div>
       
     
       
       
       
   </div>
<!--Header Section end-->
<!--middle Row Section-->

    <div class="middle_row">
        <label class="left" style="font-size: 11px;"> RR No. : <b><?= $query3['RR_No']?></b>, RR Weight : <b><?= $query3['RR_Qty']?> ton</b>, Placement Date : <b><?= $query3['RR_Date']?></b>, Placement Time : <b><?= $query3['Placement_Time']?></b>, Release Date : <b><?= $query1['rake_release_date']?></b></label>
        <br/>
           <label class="left" style="font-size: 22px;"> Company : <b><?= $query3['Company']?></b>, Transporter : <b><?= $query3['Transporter']?></b></label>
    </div>
<!--middle Row Section end-->

<!--Billing & shipping -->

<table border="1" class="table">
<tr>
<th  width="40px">Sl. No.</th>
<th  width="80px">Vehicle No.</th>
<th rowspan="" width="80px">Vehicle Type</th>
 
<th rowspan="" width="120px">Out Date<br/>Out Time</th>
<th>Challan No.</th>
<th>Tare Wt.</th>
<th>Gross Wt.</th>
<th>Net Wt.</th>
</tr>
<?php
$s=1;
$query_out_temp = mysqli_query($conn , "SELECT * FROM `unloading_vehicle_out_temp` where `unloading_ref_id`='$id' ");
while($query_out_temp1 = mysqli_fetch_assoc($query_out_temp)){?>
                <tr>
                  <td  width="40"><?= $s ?></td>
                    <td><?= $query_out_temp1['vehicle_no'] ?></td>
                     <td><?= $query_out_temp1['vehicle_type'] ?></td>
                      <td><?= $query_out_temp1['date'] ?></td>
                       <td><?= $query_out_temp1['company_challan'] ?></td>
                        <td><?= $query_out_temp1['tare_weight'] ?></td>
                         <td><?= $query_out_temp1['gross_weight'] ?></td>
                         <td><?= $query_out_temp1['gross_weight'] - $query_out_temp1['tare_weight'] ?></td>
                </tr>
                <?php $s++;} ?>

    </table>
<br/>

<!--


<div class="terms" style="float:left; padding:0px; width:100%">
         
<p style="float:right;  padding:0px; margin-top:35px; font-size:14px; text-align:right">
<b>
Office Signature
</b></p>
    </div>
 <div class="terms" style="float:right; padding:0px; width:100%; ">   
    <p style="float:right;  padding:0px; padding-right:183px; margin-top:0px; font-size:14px; text-align:right">
<b>
Name :
</b></p> 
    
    </div>
    <br/>
 <div class="terms" style="float:right; padding:0px; width:100%;">   
    <p style="float:right;  padding:0px; padding-right:150px; margin-top:0px; font-size:14px; text-align:right">
<b>
Mobile No. :
</b></p> </div>
-->



</body>

</html></body>
</html>