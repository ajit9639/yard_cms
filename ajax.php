<?php
//include('includes/db.php');
//include_once('includes/header.php');
$conn = mysqli_connct('localhost','root','','car');

if(!empty($_POST['vendor_code']))
{ $vc =$_POST['vendor_code'];
    $sql=mysqli_query($conn,"select * from user where 1=1 `id` = '$id'");
    while($row=mysqli_fetch_assoc($sql))
    {
 //echo '<option value="'.$row['id'].'">'.$row['bill_no'].'</option>';
 echo $row['id'];
 }
 }

?>