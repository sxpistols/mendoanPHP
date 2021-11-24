<?php 
include "css.php";
include "navbar.php";
include "sidebar.php";
?>
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
                        <h2 class="m-0">Daftar Mandays Project 2021</h2>
                        <form action="" method="GET" id="form_id">
                        <select id="tahun" name="tahun" onChange="document.getElementById('form_id').submit();">
                            <option value="">Pilih Tahun</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>                 
                        </select>
                        </form>
                        <a target="_blank" href="export_excel_project_mandays.php">EXPORT KE EXCEL</a>
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
                                    <td><?php echo $Sum2['project']?></td>
                                    <td><?php echo $Sum2['status']?></td>
                                    <td><?php echo $Sum2['project_type']?></td>
                                    <td><?php echo $Sum2['fullname']?></td>
                                    <td><?php echo $Sum2['mandays']?></td>
                                    <td><?php echo $Sum2['jumlah']?></td>
                                    <td><?php echo $Sum2['nilai_project']?></td>
                                    <td><?php echo date("Y")?></td>
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