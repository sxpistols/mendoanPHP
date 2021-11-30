<?php 
include "direct_jwt.php";
include "timeout.php";
include "css.php";
include "navbar.php";
include "sidebar.php";
?>


<?php
    if(isset($_GET['board_id'])&&($_GET['tanggal'])){
        $id_timesheet   =$_GET['board_id'];
        $tgl   =$_GET['tanggal'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
        $url = "http://192.168.3.250:9966/api/trello/boardmembersmandays?boardid=";
        $lurl = $id_timesheet ;
        $url2 =$tgl;
        $url3 = "&tanggal=";
            $sumber2 = "$url$lurl$url3$url2";
            $konten2 = file_get_contents($sumber2);
            $konten2=utf8_encode($konten2);
            $result2=json_decode($konten2,true);
        
        $urlbawah = "http://192.168.3.250:9966/api/trello/boardname?boardid=";
        $liurl = $id_timesheet ;
            $sumber3= "$urlbawah$liurl";
            $konten3= file_get_contents($sumber3);
            $konten3=utf8_encode($konten3);
            $result3=json_decode($konten3,true);

        $urltitle= "http://192.168.3.250:9966/api/trello/boarddetail?boardid=";
        $lurl = $id_timesheet ;
        $url2 =$tgl;
        $url3 = "&tanggal=";
            $sumber4= "$urltitle$lurl$url3$url2";
            $konten4= file_get_contents($sumber4);
            $konten4=utf8_encode($konten4);
            $result4=json_decode($konten4,true);
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div style="text-transform: uppercase; font-weight: bold; margin-bottom:30px; font-size: 14px;">
                <?php echo $result3['boardname'] ?></div>
            <table class="table-sm table-bordered table-striped" style="width: 60%; text-align: center;">
                <h2 style="margin-bottom: 10px; font-size: 14px;">Mandays Tahun Berjalan</h2>
                <thead>
                    <tr>
                        <th>FULLNAME</th>
                        <th>POSISI</th>
                        <th>MANDAYS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
     $no = 1;
      foreach ($result2['Members'] as $Sum2){
      ?>
                    <tr>
                        <td style="text-align: left; padding-left: 20px;">
                            <?php echo $Sum2['fullname']?></td>
                        <td style="text-align: right; padding-right: 20px; ">
                            <?php echo $Sum2['posisi']?></td>
                        <td style="text-align: end; padding-right: 20px; "><?php echo $Sum2['mandays']?>
                        </td>
                        </td>
                    </tr>
                    <?php
    $no++; } ?>
                </tbody>
            </table>
            <hr>
            <h2 style="margin-bottom: 10px; font-size: 14px;">Aktivitas 10 hari terakhir</h2>
            <table id="example" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>FULLNAME</th>
                        <th>ACTIVITY TYPE</th>
                        <th>TANGGAL</th>
                        <th>COMMENT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
     $no = 1;
      foreach ($result4['Boards'] as $Sum2){
      ?>
                    <tr>
                        <td style="text-align: left; padding-left: 20px;">
                            <?php echo $Sum2['fullname']?></td>
                        <td style="text-align: left; padding-right: 20px; ">
                            <?php echo $Sum2['type']?></td>
                        <td style="text-align: center; padding-right: 20px; ">
                            <?php echo $Sum2['tanggal']?></td>
                        <td style="text-align: left; padding-right: 20px; ">
                            <?php echo $Sum2['comment']?></td>
                    </tr>
                    <?php
    $no++; } ?>
                </tbody>
            </table>
        </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->


</div>
<?php
include "js.php";
?>