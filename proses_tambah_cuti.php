    <?php
    $resource_name = $_POST["fullname"];
    $tanggal = $_POST["tanggal"];
    $keterangan = $_POST["keterangan"];
    


    $url="http://192.168.3.250:9966/api/karyawan/cuti";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,"resource_name=$resource_name&tanggal=$tanggal&keterangan=$keterangan");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
//     $document = '<script language="javascript">swal({
//   title: "success",
//   text: "nik and confirm nik do not match !",
//   type: "success"
// }, function(){
//       window.location.href = "list_karyawan_cuti.php";
// });</script>';
    
    // echo $response;
        echo 
    header('Location:list_karyawan_cuti.php');
    ?>
	
