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
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="has-text-grey">NO</th>
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
                                    <td><?php echo $no ?></td>
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