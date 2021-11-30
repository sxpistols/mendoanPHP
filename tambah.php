<?php
include "direct_jwt.php";
include "timeout.php";
include "css.php";
include "sidebar.php";
?>
<style>
.container input {
    margin-left: 25%;
    width: 50%;
}

.container textarea {
    margin-left: 25%;
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
<div class="content-wrapper">
    <div class="content-header">
        <form action="proses.php" method="post">
            <div class="container">
                <div class="card" style="width: auto; height: 50px; text-align: left; padding: 15px 10px 15px 20px;">
                    <h2 class="m-0"> Tambah Karyawan </h2>
                </div>
                <div class="card" style="width: auto; height: auto; text-align: left; padding: 15px 10px 15px 20px;">
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
                            <option value="KTP">KTP</option>
                            <option value="SIM">SIM</option>
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
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-1">
                            <button type="submit" class="btn btn-success"
                                style="padding: 5px 0px 5px 0px; width: 70px; font-size: 13px;">Tambah</button>
                        </div>
                        <div class="col-1 offset-1">
                            <button type="reset" class="btn btn-danger"
                                style="padding: 5px 0px 5px 0px; width: 70px; font-size: 13px;">Reset</button>
                        </div>
                    </div>
        </form>
        </section>
    </div>
</div>
<?php
include "footer.php";
include "js.php";
?>