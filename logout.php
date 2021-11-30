<?php 
require_once('./vendor/autoload.php');
setcookie('Mendoan', 'LOGOUT');
header('Location:index.php');
?>