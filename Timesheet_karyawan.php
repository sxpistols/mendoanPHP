<?php 
include "css.php";
include "navbar.php";
include "sidebar.php";
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card"
                        style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
                        <?php
                        if(isset($_GET['tanggal'])){
				$tgl_tampil = $_GET['tanggal'];
			}else{
				$tgl_tampil = "";
			}
            ?>
                        <h2 style="margin-bottom: 10px;">Daily Activity <?php echo $tgl_tampil?></h2>
                        <form action="" method="GET" id="form_id">
                            <input type="date" name="tanggal" onChange="document.getElementById('form_id').submit();"
                                value="<?php echo $tgl_tampil ?>">
                        </form>
                    </div>
                    <div class="card"
                        style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
                        <?php 

if(isset($_GET['tanggal'])){
				$tgl = $_GET['tanggal'];
			}else{
				$tgl = date("DD-MM-YY");
			}
    $url = "http://192.168.3.250:9966/api/trello/dailyactivity?tanggal=";
    $lurl = $tgl ;
    $sumber2 = "$url$lurl";
    $konten2 = file_get_contents($sumber2);
    $konten2=utf8_encode($konten2);
    $result2=json_decode($konten2,true);
?>
                        <table id="example" class="table  table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NAMA KARYAWAN</th>
                                    <th>ACTIVE BOARDS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
     $no = 1;
      foreach ($result2['Activity'] as $Sum2){
      ?>
                                <tr>
                                    <td><?php echo $Sum2['fullname']?></td>
                                    <td><a
                                            href="detail_timesheet.php?board_id=<?=$Sum2['board_id']?>&tanggal=<?=$Sum2['tanggal']?>"><?php echo $Sum2['name']?>
                                    </td>
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