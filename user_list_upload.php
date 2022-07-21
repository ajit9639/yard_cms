<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";
$output = '';
$rec_id = $_POST['id'];
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 

$sql = "SELECT * FROM user where id=".$rec_id;
$result = mysqli_query($conn, $sql);

 

   while($row = mysqli_fetch_assoc($result)) {
 
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 
"<table class='table table-bordered display-tables'>"
."<tr>".
"<th>"."Name"."</th>".
"<td>".$row["name"]."</td>"."</tr>"
."<tr>".
"<th>"."Username"."</th>".
"<td>".$row["username"]."</td>"."</tr>"
."<tr>".
"<th>"."Password"."</th>".
"<td>".$row["password"]."</td>"."</tr>"
."<tr>".
"<th>"."Adhar No"."</th>".
"<td>".$row["adhar_no"]."</td>"."</tr>"
."<tr>".
"<th>"."Mobile No"."</th>".
"<td>".$row["mobile"]."</td>"."</tr>"
."<tr>".
"<th>"."Driver Licence No"."</th>".
"<td>".$row["driver_license_no"]."</td>"."</tr>"
."<tr>".
"<th>"."Department"."</th>".
"<td>".$row["department"]."</td>"."</r>"
."<tr>".
"<th>"."Type"."</th>".
"<td>".$row["type"]."</td>"."</tr>"
."<tr>".
"<th>"."Key"."</th>".
"<td>".$row["key"]."</td>"."</tr>".
"</table>";




// "Name: ".$row["name"]."<br>"."Username: ".$row["username"]."<br>"."Password: ".$row["password"].
// "<br>"."Adhar_no: ".$row["adhar_no"]."<br>"."Mobile_no: ".$row["mobile"]."<br>"."Driver Licence No: ".$row["driver_license_no"]."<br>"."Department: ".$row["department"]."<br>"."Type: ".$row["type"].
// "<br>"."Key: ".$row["key"]."<br>"."Parent Id: ".$row["parent_id"];


 }
echo $output;
 
mysqli_close($conn);
?>
<br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
