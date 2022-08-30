<?php
include "config.php";

$sql = "SELECT * FROM `transporter` where id=".$rec_id;
$result = mysqli_query($conn, $sql);

 

while($row = mysqli_fetch_assoc($result)) {
 
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 
"<h5 style='
    text-align: center;
    font-weight: 800;
'>Transporter Detail</h5><table class='table table-bordered display-tables'>"



."<tr>".
"<th>"."Name"."</th>".
"<td>".$row["Name"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Address"."</th>".
"<td>".$row["Address"]."</td>"."</tr>"
."<tr>"
.
"<th>"."City"."</th>".
"<td>".$row["City"]."</td>"."</tr>"
."<tr>"
.
"<th>"."State"."</th>".
"<td>".$row["State"]."</td>"."</tr>"
."<tr>"
.
"<th>"."State_Code"."</th>".
"<td>".$row["State_Code"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Pin_Code"."</th>".
"<td>".$row["Pin_Code"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Mobile_No"."</th>".
"<td>".$row["Mobile_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."alternate_Mobile_No"."</th>".
"<td>".$row["alternate_Mobile_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."E_mail"."</th>".
"<td>".$row["E_mail"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Website"."</th>".
"<td>".$row["Website"]."</td>"."</tr>"
."<tr>"

."</table>";
 }
$sql1 = "SELECT * FROM `transporter_employee` where `employee_ref_id`=".$rec_id;
$result1 = mysqli_query($conn, $sql1);

while($row1 = mysqli_fetch_assoc($result1)) {
$output1 .= 
"<h5 style='
    text-align: center;
    font-weight: 800;
'>Employee Detail</h5><table class='table table-bordered display-tables'>"



."<tr>".
"<th>"."employee_name"."</th>".
"<td>".$row1["employee_name"]."</td>"."</tr>"
."<tr>"
.
"<th>"."employee_number"."</th>".
"<td>".$row1["employee_number"]."</td>"."</tr>"
."<tr>".
"<th>"."employee_email"."</th>".
"<td>".$row1["employee_email"]."</td>"."</tr>"
  
  
  ."<tr>".
"<th>"."employee_designation"."</th>".
"<td>".$row1["employee_designation"]."</td>"."</tr>"
 
."</table>";

 }
echo $output;
echo $output1;
 
mysqli_close($conn);
?>
<!-- <br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->