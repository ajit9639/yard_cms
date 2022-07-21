<?php
/**
 * Created by PhpStorm.
 * User: AIPL4
 * Date: 12-Mar-2019
 * Time: PM 05:57
 */
session_start();
session_destroy();
$_SESSION['is_authenticated']=0;
echo '<script>window.location="index.php";</script>';
?>