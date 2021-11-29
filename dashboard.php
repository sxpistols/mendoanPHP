<?php
session_start();
 $timeout = 3; // setting timeout dalam menit
 $logout = "index.php"; // redirect halaman logout
 
 $timeout = $timeout*60; // menit ke detik
 if(isset($_SESSION['start_session'])){
 $elapsed_time = time()-$_SESSION['start_session'];
 if($elapsed_time >= $timeout){
 session_destroy();
 echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
 }
 }
 
 $_SESSION['start_session']=time();
 
?>

<?php 
include "css.php";
include "navbar.php";
include "sidebar.php";
?>
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <h1>Welcome</h1>
        </div>
    </section>
</div>
<?php 
include "footer.php";
include "js.php";
?>