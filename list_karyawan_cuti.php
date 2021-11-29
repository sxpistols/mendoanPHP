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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card"
                        style="width: auto; height: 50px; text-align: left; padding: 15px 10px 15px 20px;">
                        <h2 class="m-0">Daftar Karyawan Cuti</h2>
                    </div>
                    <div class="card"
                        style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
                        <?php 
$sumber2 = 'http://192.168.3.250:9966/api/karyawan/listcuti';
$konten2 = file_get_contents($sumber2);
$konten2=utf8_encode($konten2);
$result2=json_decode($konten2,true);
$Sum2=$result2['Cuti'];
 ?>
                        <a href="export_excel_cuti.php" class="btn btn-success btn-sm active" role="button"
                            aria-pressed="true" style="width: 90px; font-size: 14px; padding: 0px 0px 0px 0px;">Save to
                            Excel</a>
                        <br>
                        <table id="example" class="table  table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr style="text-align: center;">
                                    <th class="has-text-grey" style="text-align: center;">NO</th>
                                    <th class="has-text-grey">NAMA KARYAWAN</th>
                                    <th class="has-text-grey">TANGGAL CUTI</th>
                                    <th class="has-text-grey">KETERANGAN</th>
                                    <th class="has-text-grey">EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
     $no = 1;
      for($a = 0; $a <count ($Sum2); $a++){
      ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no ?></td>
                                    <td><?php echo $Sum2[$a]['fullname']?>
                                    <td><?php echo $Sum2[$a]['tanggal_cuti']?></td>
                                    <td><?php echo $Sum2[$a]['keterangan']?></td>
                                    <td><a href=""><?php echo "delete"?>

                                </tr>
                                <?php
    $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="card">

            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php
include "footer.php";
include "js.php";
?>