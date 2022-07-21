<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";
$output = '';
$rec_id = $_POST['id'];
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 

$sql = "SELECT * FROM party_master where id=".$rec_id;
$result = mysqli_query($conn, $sql);

 

   while($row = mysqli_fetch_assoc($result)) {
 
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 

"<table class='table table-bordered display-tables'>"
."<tr>".
"<th>"."Name"."</th>".
"<td>".$row["name"]."</td>"."</tr>"
."<tr>".
"<th>"."Opening Balance"."</th>".
"<td>".$row["opening_balance"]."</td>"."</tr>"
."<tr>".
"<th>"."Date"."</th>".
"<td>".$row["date"]."</td>"."</tr>"
."</table>";



"Name: ".$row["name"]."<br>"."Opening Balance: ".$row["opening_balance"]."<br>"."Date: ".$row["date"];

 }
echo $output;
 
mysqli_close($conn);
?>
<br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;