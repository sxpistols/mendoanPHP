<?php
include "css.php";
include "sidebar.php";
?>
<style>
.container input {
    margin-left: 25%;
    width: 50%;
}

.container textarea {
    margin-left: 40%;
    width: 50%;
}

.container select {
    margin-left: 25%;
    width: 50%;
    height: 30px;
}

.container label {
    position: absolute;
    font-weight: normal !important;
}

.container button {
    margin-top: 25px;
}
</style>
<?php 
$sumber2 = 'http://192.168.3.250:9966/api/karyawan/list?user_role=2';
$konten2 = file_get_contents($sumber2);
$konten2=utf8_encode($konten2);
$result2=json_decode($konten2,true);
$Sum2=$result2['karyawan'];
 ?>
<div class="content-wrapper">
    <div class="content-header">
        <form action="proses_tambah_mutasi.php" method="post">
            <div class="container">
                <div class="card" style="width: auto; height: 50px; text-align: left; padding: 15px 10px 15px 20px;">
                    <h2 class="m-0"> Tambah Karyawan Mutasi</h2>
                </div>
                <div class="card" style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
                    <div class="mt-3">
                        <label>Nama Karyawan </label>
                        <select name="karyawan" id="karyawan">
                            <?php foreach($Sum2 as $s): ?>
                            <option value="<?php echo $s['fullname']?>"><?php echo $s['fullname']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Mutasi Ke Divisi </label>
                        <select name="divisi" id="divisi">
                            <option value="PMO">PMO</option>
                            <option value="BSO">BSO</option>
                            <option value="SDO">SDO</option>
                            <option value="RMO">RMO</option>
                            <option value="DSO">DSO</option>
                            <option value="KMO">KMO</option>
                            <option value="BO">BO</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary"
                                style="padding: 5px 0px 5px 0px; width: 70px; font-size: 13px;">Submit</button>
                        </div>
                    </div>
        </form>
    </div>
</div>
</div>
</div>
<?php
include "footer.php";
include "js.php";
?>