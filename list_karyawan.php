<?php 
include "direct_jwt.php";
include "timeout.php";
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
                        <h2 class="m-0">Daftar Karyawan PMO</h2>
                    </div>
                    <div class="card"
                        style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
                        <?php 
$sumber2 = 'http://192.168.3.250:9966/api/karyawan/list?user_role=6';
$konten2 = file_get_contents($sumber2);
$konten2=utf8_encode($konten2);
$result2=json_decode($konten2,true);
$Sum2=$result2['karyawan'];
 ?>
                        <a href="export_excel_karyawan.php" class="btn btn-success btn-sm active" role="button"
                            aria-pressed="true" style="width: 90px; font-size: 14px; padding: 0px 0px 0px 0px;">Save to
                            Excel</a>
                        <br>
                        <table id="example" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr style="text-align: center;">
                                    <th class="has-text-grey">NO</th>
                                    <th class="has-text-grey">NAMA KARYAWAN</th>
                                    <th class="has-text-grey">NIK</th>
                                    <th class="has-text-grey">LAMA BEKERJA</th>
                                    <th class="has-text-grey">POSISI</th>
                                    <th class="has-text-grey">JURUSAN</th>
                                    <th class="has-text-grey">PENDIDIKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
     $no = 1;
      for($a = 0; $a <count ($Sum2); $a++){
      ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no ?></td>
                                    <td><a href="detail_karyawan.php?user_id=<?=$Sum2[$a]['user_id']?>"><?php echo $Sum2[$a]['fullname']?>
                                    </td>
                                    <td><?php echo $Sum2[$a]['nik']?></td>
                                    <td><?php echo $Sum2[$a]['year']?> Tahun <?php echo $Sum2[$a]['month']?> Bulan
                                        <?php echo $Sum2[$a]['day']?> Hari</td>
                                    <td><?php echo $Sum2[$a]['posisi']?></td>
                                    <td><?php echo $Sum2[$a]['jurusan']?></td>
                                    <td><?php echo $Sum2[$a]['pendidikan']?></td>
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

