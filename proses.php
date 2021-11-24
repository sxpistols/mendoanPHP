    <?php
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
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script type='text/javascript'>
Swal.fire({
  title: 'Anda akan menambahkan data karyawan, apakah anda ingin melanjutkan?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
})
.then(function() {
    window.location = "tambah.php";
});
</script> 
</body>