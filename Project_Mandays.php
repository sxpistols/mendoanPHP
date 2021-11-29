<?php 
session_start();
include "css.php";
include "navbar.php";
include "sidebar.php";
?>
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<style>
    .card select{
        margin-top:10px;
        height:30px;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card" style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
                        <?php 
                        if(isset($_GET['tahun'])){
                        $tahuntampil=$_GET["tahun"];
                        }else{
                        $tahuntampil =date("Y");
                        }
                        ?>
                        <h2 class="m-0">Daftar Mandays Project Tahun <?php echo $tahuntampil ?></h2>
                        <form action="" method="GET" id="form_id">
                        <select id="tahun" name="tahun" onChange="document.getElementById('form_id').submit();" style="width:90px; height:30px; margin-right:30px;">
                            <option value="" disabled>Pilih Tahun</option>
                            <option <?php if(!empty($tahuntampil)){ echo $tahuntampil == '2019' ? 'selected':''; } ?> value="2019">2019</option>
                            <option <?php if(!empty($tahuntampil)){ echo $tahuntampil == '2020' ? 'selected':''; } ?> value="2020">2020</option>
                            <option <?php if(!empty($tahuntampil)){ echo $tahuntampil == '2021' ? 'selected':''; } ?> value="2021">2021</option>                 
                        </select>
                        <?php 
                        $tahunkirim= "2021";
                        if(isset($_GET['tahun'])){
                        $tahunkirim=$_GET["tahun"];
                        }
                        $_SESSION['Tahunkirim'] =$tahunkirim;
                        echo "<a href='export_excel_project_mandays.php' class='btn btn-success btn-sm active' role='button'
                            aria-pressed='true' style='height:30px; width: 90px; font-size: 14px; padding: 0px 0px 0px 0px;'>EXPORT</a>";
                        ?>
                        </form>
                    </div>
                    <div class="card" style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
<?php 
    if(isset($_GET['tahun'])){
    $tahun=$_GET["tahun"];
    }else{
    $tahun =date("Y");
    }
    $url = "http://192.168.3.250:9966/api/trello/projectmandays?tahun=";
    $lurl = $tahun ;
    $sumber2 = "$url$lurl";
    $konten2 = file_get_contents($sumber2);
    $konten2=utf8_encode($konten2);
    $result2=json_decode($konten2,true);
?>
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NAMA PROJECT</th>
                                    <th>STATUS</th>
                                    <th>TYPE</th>
                                    <th>PM</th>
                                    <th>TARGET</th>
                                    <th>USED</th>
                                    <th>NILAI RUPIAH</th>
                                    <th>EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
     $no = 1;
      foreach ($result2['Mandays'] as $Sum2){
      ?>
                                <tr>
                                    <td><a href="detail_project.php?id=<?=$Sum2['id']?>"><?php echo $Sum2['project']?></a></td>
                                    <td><?php echo $Sum2['status']?></td>
                                    <td><?php echo $Sum2['project_type']?></td>
                                    <td><?php echo $Sum2['fullname']?></td>
                                    <td><?php echo $Sum2['mandays']?></td>
                                    <td style="color:green;font-weight: bold;"><?php echo $Sum2['jumlah']?></td>
                                    <td><?php echo number_format($Sum2['nilai_project'])?></td>
                                    <td><a href="edit_project_mandays.php?project_id=<?=$Sum2['id']?>"><i class='bx bx-edit'></i></a></td>
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