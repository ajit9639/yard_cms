<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
$host='localhost';
$username='root';
$password='';
$database='car';
$conn = mysqli_connect($host,$username,$password,$database);
if(!$conn)
{
    echo mysqli_error($conn);

}
?>