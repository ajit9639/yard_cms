<?php
include "config.php";

$sql = "SELECT * FROM `driver` where id=".$rec_id;
$result = mysqli_query($conn, $sql);

 

while($row = mysqli_fetch_assoc($result)) {
 
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 
"<table class='table table-bordered display-tables'>"



."<tr>".
"<th>"."Name"."</th>".
"<td>".$row["Name"]."</td>"."</tr>"
."<tr>"
.
"<th>"."DL_Type"."</th>".
"<td>".$row["DL_Type"]."</td>"."</tr>"
."<tr>"
.
"<th>"."DL_No"."</th>".
"<td>".$row["DL_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."DL_Validity"."</th>".
"<td>".$row["DL_Validity"]."</td>"."</tr>"
."<tr>"
.
"<th>"."City"."</th>".
"<td>".$row["City"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Address"."</th>".
"<td>".$row["Address"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Mobile_No"."</th>".
"<td>".$row["Mobile_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Emergency_Contact_No"."</th>".
"<td>".$row["Emergency_Contact_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Bank_Name"."</th>".
"<td>".$row["Bank_Name"]."</td>"."</tr>"
."<tr>"
.
"<th>"."AC_No"."</th>".
"<td>".$row["AC_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."AC_Name"."</th>".
"<td>".$row["AC_Name"]."</td>"."</tr>"
."<tr>"
.
"<th>"."IFSC_Code"."</th>".
"<td>".$row["IFSC_Code"]."</td>"."</tr>"
."<tr>"

."</table>";





 }
echo $output;
 
mysqli_close($conn);
?>
<!-- <br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->