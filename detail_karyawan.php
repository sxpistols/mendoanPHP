<?php 
include "css.php";
include "navbar.php";
include "sidebar.php";
?>

<?php
    if(isset($_GET['user_id'])){
        $id_karyawan    =$_GET['user_id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
        $url = "http://192.168.3.250:9966/api/karyawan?user_id=";
        $lurl = $id_karyawan ;
            $sumber2 = "$url$lurl";
            $konten2 = file_get_contents($sumber2);
            $konten2=utf8_encode($konten2);
            $result2=json_decode($konten2,true);
           
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <?php  
             $b=1;
              foreach ($result2['karyawan'] as $Sum2){
               ?>
            <div style="text-transform: uppercase; font-weight: bold; margin-top:0px; font-size: 14px;">
                <?php echo $Sum2['fullname']?> -
                <?php echo $Sum2['status']?></div>
            <div style="color:#A9A9A9;">Lama Bekerja : <?php echo $Sum2['year']?> Tahun, <?php echo $Sum2['month']?>
                Bulan, <?php echo $Sum2['day']?> Hari</div>
            <hr>
            <span style="color:#696969; font-weight: bold;">USER INFORMATION </span>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <span style="font-weight: bold;"> ID User </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px;">
                            <input value="<?php echo $Sum2['user_id']==null?'None': $Sum2['user_id']?> "></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <span style="font-weight: bold;"> Fullname </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['fullname']==null?'None': $Sum2['fullname']?>"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <span style="font-weight: bold;"> Email Address </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['email']==null?'None': $Sum2['email']?>"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <span style="font-weight: bold;"> NIK Karyawan </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['nikkaryawan']==null?'None': $Sum2['nikkaryawan']?>"></input>
                        </div>
                    </div>
                    <div class="col-3">
                        <span style="font-weight: bold;"> Posisi </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['posisi']==null?'None': $Sum2['posisi']?>"></input>
                        </div>
                    </div>
                    <div class="col-3">
                        <span style="font-weight: bold;"> Divisi </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['divisi']==null?'None': $Sum2['divisi']?>"></input>
                        </div>
                    </div>
                    <div class="col-3">
                        <span style="font-weight: bold;"> ID Telegram </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['telegram']==null?'None': $Sum2['telegram']?>"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <span style="font-weight: bold;"> Trello username </span>
                        <div class="card" style="font-size: 14px;margin-top: 5px">
                            <input value="<?php echo $Sum2['trelloid']==null?'None': $Sum2['trelloid']?>"></input>
                        </div>
                    </div>
                    <div class="col-3">
                        <span style="font-weight: bold;"> Pendidikan </span>
                        <div class="card" style="font-size: 14px;margin-top: 5px">
                            <input value="<?php echo $Sum2['pendidikan']==null?'None': $Sum2['pendidikan']?>"></input>
                        </div>
                    </div>
                    <div class="col-3">
                        <span style="font-weight: bold;"> Institusi </span>
                        <div class="card" style="font-size: 14px;margin-top: 5px">
                            <input value="<?php echo $Sum2['institusi']==null?'None': $Sum2['institusi']?>"></input>
                        </div>
                    </div>
                    <div class="col-3">
                        <span style="font-weight: bold;"> Jurusan </span>
                        <div class="card" style="font-size: 14px;margin-top: 5px">
                            <input value="<?php echo $Sum2['jurusan']==null?'None': $Sum2['jurusan']?>"></input>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <span style="color:#696969; font-weight: bold;">CONTACT INFORMATION </span>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <span style="font-weight: bold;">Alamat</span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['alamat']==null?'None': $Sum2['alamat']?>"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <span style="font-weight: bold;"> Nomor Telepon </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['phone']==null?'None': $Sum2['phone']?>"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <span style="font-weight: bold;"> Tanggal Masuk </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input
                                value="<?php echo $Sum2['tanggalmasuk']==null?'None': $Sum2['tanggalmasuk']?>"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <span style="font-weight: bold;"> Status Karyawan </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input
                                value="<?php echo $Sum2['statuskaryawan']==null?'None': $Sum2['statuskaryawan']?>"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <span style="font-weight: bold;"> Identitas Digunakan </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['identitas']==null?'None': $Sum2['identitas']?>"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <span style="font-weight: bold;"> Nomor Identitas </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input value="<?php echo $Sum2['nik']==null?'None': $Sum2['nik']?>"></input>
                        </div>
                    </div>
                    <div class="col-4">
                        <span style="font-weight: bold;"> Status Pernikahan </span>
                        <div class="card" style="font-size: 14px; margin-top: 5px">
                            <input
                                value="<?php echo $Sum2['statuspernikahan']==null?'None': $Sum2['statuspernikahan']?>"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <button type="submit" class="btn btn-success"
                            style="padding: 5px 0px 5px 0px; width: 70px; font-size: 13px;">Update</button>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-danger"
                            style="padding: 5px 0px 5px 0px; width: 70px; font-size: 13px;">Resign</button>
                    </div>
                </div>
            </div>
            <?php  
}?>
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
<!-- ./wrapper -->
<?php 
include "js.php";
?>