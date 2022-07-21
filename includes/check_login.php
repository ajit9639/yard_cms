<?php
/**
 * Created by PhpStorm.
 * User: AIPL4
 * Date: 12-Mar-2019
 * Time: PM 12:11
 */
if((!isset($_SESSION['is_authenticated']))&&($_SESSION['is_authenticated'] != 1))
{
    echo '<script>alert("Invalid Session Please Login Again"); window.location="index.php";</script>';
}