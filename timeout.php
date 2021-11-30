<?php
session_start();
 $timeout = 3; // setting timeout dalam menit
 $logout = "index.php"; // redirect halaman tujuan
 
 $timeout = $timeout*60; // menit ke detik
 if(isset($_SESSION['start_session'])){
 $elapsed_time = time()-$_SESSION['start_session'];
 if($elapsed_time >= $timeout){
 require_once('./vendor/autoload.php');
setcookie('Mendoan', 'LOGOUT');
 echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
 }
 }
 
 $_SESSION['start_session']=time();
 
?>