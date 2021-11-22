<?php
include "css.php";
include "sidebar.php";
?>
<style>
    .container form input{
        margin-left:40%;
        width:50%; 
    }
    .container form textarea{
        margin-left:40%;
        width:50%;  
    }
    .container form select{
        margin-left:40%;
        width:50%;
        height:30px;  
    }
    .container form label{
        position:absolute;
        font-weight: normal !important;
    }
    .container form button{
        margin-top:50px;
    }
</style>
<div class="content-wrapper">
<div class="container bg-white">
<section class="content">
<form id="prosestambah" method="post">
<div>Tambah Karyawan</div>
<div class="text-success mt-3"><strong>IDENTITAS</strong></div>
<div class="mt-3">
    <label>User Id </label>
    <input type="text" name="user_id">
</div>
<div class="mt-3">
    <label>Nama Lengkap </label>
    <input type="text" name="fullname">
</div>
<div class="mt-3">
    <label>Tempat Lahir </label>
    <input type="text" name="tempatlahir">
</div>
<div class="mt-3">
    <label>Tanggal Lahir </label>
    <input type="date" name="tanggallahir">
</div>
<div class="mt-3">
    <label>Alamat Email </label>
    <input type="text" name="email">
</div>
<div class="mt-3">
    <label>ID Telegram </label>
    <input type="text" name="telegram">
</div>
<div class="mt-3">
    <label>Nomor Telepone </label>
    <input type="text" name="phone">
</div>
<div class="mt-3">
    <label>Jenis Identitas </label>
    <select name="identitas" id="identitas">
    <option value="" selected disabled>Pilih Jenis Identitas</option>
    <option value="KTP">KTP</option><option value="SIM">SIM</option>
    </select>
</div>
<div class="mt-3">
    <label>Nomor Identitas </label>
    <input type="text" name="nik">
</div>
<div class="mt-3">
    <label>Status Pernikahan </label>
    <select name="statuspernikahan" id="statuspernikahan">
    <option value="" selected disabled>Pilih Status Pernikahan</option>
    <option value="Single">Single</option>
    <option value="Menikah">Menikah</option>
    </select>
</div>
<div class="mt-3">
    <label>Alamat Tinggal Sesuai KTP</label>
    <textarea name="alamat" id="alamat" cols="30" rows="4"></textarea>
</div>
<div class="text-success mt-3"><strong>PENDIDIKAN</strong></div>
<div class="mt-3">
    <label>Pendidikan Akhir </label>
    <select name="pendidikan" id="pendidikan">
    <option value="" selected disabled>Pilih Status Pendidikan</option>
    <option value="SMK/SMU/Sederajat">SMK/SMU/Sederajat</option>
    <option value="D1">D1</option>
    <option value="D2">D2</option>
    <option value="D3">D3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    </select>
</div>
<div class="mt-3">
    <label>Nama Institusi </label>
    <input type="text" name="institusi">
</div>
<div class="mt-3">
    <label>Jurusan </label>
    <input type="text" name="jurusan">
</div>
<div class="text-success mt-3"><strong>KEPEGAWAIAN</strong></div>
<div class="mt-3">
    <label>NIK Karyawan </label>
    <input type="text" name="nikkaryawan">
</div>
<div class="mt-3">
    <label>Divisi </label>
    <select name="divisi" id="divisi">
    <option value="" selected disabled>Pilih Divisi</option>
    <option value="PMO">PMO</option>
    <option value="BSO">BSO</option>
    <option value="SDO">SDO</option>
    <option value="MSO">MSO</option>
    <option value="KMO">KMO</option>
    <option value="PDO">PDO</option>
    <option value="BO">BO</option>
    <option value="DSO">DSO</option>
    <option value="RMO">RMO</option>
    </select>
</div>
<div class="mt-3">
    <label>Posisi </label>
    <select name="posisi" id="posisi">
    <option value="" selected disabled>Pilih Posisi</option>
    <option value="Developer">Developer</option>
    <option value="Developer Analyst">Developer Analyst</option>
    <option value="System Analyst">System Analyst</option>
    <option value="Project Manager">Project Manager</option>
    <option value="Project Admin">Project Admin</option>
    <option value="Quality Control">Quality Control</option>
    <option value="Technical Writer">Technical Writer</option>
    <option value="Data Scientist">Data Scientist</option>
    <option value="Support Surveillance">Support Surveillance</option>
    <option value="Support Leader">Support Leader</option>
    <option value="Support Specialist">Support Specialist</option>
    <option value="Subject Matter Expert">Subject Matter Expert</option>
    <option value="UI / UX">UI / UX</option>
    <option value="System Architect">System Architect</option>
    <option value="Digital Solutions Senior Officer">Digital Solutions Senior Officer</option>
    <option value="RF Engineer">RF Engineer</option>
    <option value="System Administrator">System Administrator</option>
    <option value="Senior Training Officer">Senior Training Officer</option>
    <option value="Field Engineer Radar">Field Engineer Radar</option>
    <option value="Data Analyst">Data Analyst</option>
    <option value="Consultant">Consultant</option>
    <option value="Linguistic">Linguistic</option>
    <option value="Radar Engineer">Radar Engineer</option>
    <option value="Inventory Admin">Inventory Admin</option>
    <option value="Machine Learning Engineer">Machine Learning Engineer</option>
    </select>
</div>
<div class="mt-3">
    <label>Status Karyawan </label>
    <select name="statuskaryawan" id="statuskaryawan">
    <option value="" selected disabled>Pilih Status Karyawan</option>
    <option value="Permanent">Permanent</option>
    <option value="Fixed Term Contract">Fixed Term Contract</option>
    <option value="Freelance">Freelance</option>
    </select>
</div>
<div class="mt-3">
    <label>Penempatan Kerja </label>
    <select name="site" id="site">
    <option value="" selected disabled>Pilih Penempatan Kerja</option>
    <option value="Jakarta">Jakarta</option>
    <option value="Yogyakarta">Yogyakarta</option>
    </select>
</div>
<div class="mt-3">
    <label>Tanggal Bergabung </label>
    <input type="date" name="tanggalmasuk">
</div>
<div class="mt-3">
    <label>User Role Aplikasi </label>
    <select name="createby" id="createby">
    <option value="" selected disabled>Pilih User</option>
    <option value="HRD">HRD</option>
    <option value="PMO Admin">PMO Admin</option>
    <option value="PMO Employee">PMO Employee</option>
    <option value="BSO Admin">BSO Admin</option>
    <option value="BSO Employee">BSO Employee</option>
    <option value="SDO Admin">SDO Admin</option>
    <option value="SDO Employee">SDO Employee</option>
    <option value="RMO Admin">RMO Admin</option>
    <option value="RMO Employee">RMO Employee</option>
    <option value="Trello Admin">Trello Admin</option>
    </select>
</div>
<div class="row">
    <div class="col-1">
      <button type="submit"  class="btn btn-success">Tambah</button> 
    </div>
    <div class="col-1 offset-1">
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</div>
</form>
</section>
</div>
</div>
<?php
include "footer.php";
include "js.php";
if (isset($_POST['submit'])) {
    $user_id     = $_POST["user_id"];
    $fullname     = $_POST["fullname"];
    $tempatlahir     = $_POST["tempatlahir"];
    $tanggallahir     = $_POST["tanggallahir"];
    $email     = $_POST["email"];
    $telegram     = $_POST["telegram"];
    $phone     = $_POST["phone"];
    $identitas     = $_POST["identitas"];
    $nik     = $_POST["nik"];
    $statuspernikahan     = $_POST["statuspernikahan"];
    $alamat     = $_POST["alamat"];
    $pendidikan     = $_POST["pendidikan"];
    $institusi     = $_POST["institusi"];
    $jurusan     = $_POST["jurusan"];
    $nikkaryawan     = $_POST["nikkaryawan"];
    $divisi     = $_POST["divisi"];
    $posisi     = $_POST["posisi"];
    $statuskaryawan     = $_POST["statuskaryawan"];
    $site     = $_POST["site"];
    $tanggalmasuk     = $_POST["tanggalmasuk"];
    $createby     = $_POST["createby"];
    
    $url="http://192.168.3.250:9966/api/karyawan/add";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,"user_id=$user_id&fullname=$fullname&statuspernikahan=$statuspernikahan&nik=$nik&identitas=$identitas&divisi=$divisi&tanggalmasuk=$tanggalmasuk&statuskaryawan=$statuskaryawan&email=$email&phone=$phone&alamat=$alamat&posisi=$posisi&site=$site&telegram=$telegram&tempatlahir=$tempatlahir&tanggallahir=$tanggallahir&pendidikan=$pendidikan&institusi=$institusi&nikkaryawan=$nikkaryawan&jurusan=$jurusan&createdby=$createby");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);

    function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
    }

    $password = rand_string(8);
    $url2="http://192.168.3.250:9966/api/karyawan/mailreg";
    $curl2 = curl_init();
    curl_setopt($curl2, CURLOPT_URL, $url2);
    curl_setopt($curl2, CURLOPT_POST, 1);
    curl_setopt($curl2, CURLOPT_POSTFIELDS,"user_id=$user_id&password=$password&fullname=$fullname&email=$email&");
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
    $response2 = curl_exec($curl2);

    echo $response; 

}
    ?>