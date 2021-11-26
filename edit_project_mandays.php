<?php 
include "css.php";
include "navbar.php";
include "sidebar.php";
?>
<style>
    .container form .card{
        margin-top:10px;
    }
    .container form input{
        height : 30px;
    }
    .container form select{
        height : 30px;
    }
    .container form button{
        margin-top:20px;
        margin-left:10px;
        margin-bottom: 20px;
    }
</style>
<?php
    if(isset($_GET['project_id'])){
        $project_id    =$_GET['project_id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    $url = "http://192.168.3.250:9966/api/trello/projectmdetail?project_id=";
    $lurl = $project_id ;
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
              foreach ($result2['Project'] as $Sum2){
               ?>
            <form action="simpan_project_mandays.php" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $Sum2['id']?>">
            <div style="text-transform: uppercase; font-weight: bold; margin-top:0px; font-size: 14px;">
                PROJECT DETAIL :
                <?php echo $Sum2['status']?></div>
            <hr>
            <span style="color:#696969; font-weight: bold;">PROJECT INFORMATION </span>
            <div class="container">
                <div class="row mt-3">
                    <div class="col-6">
                        <h6> Nama Project </h6>
                        <h4> <?php echo $Sum2['project']?></h4>
                    </div>
                    <div class="col-6">
                        <h6> Project Manager </h6>
                        <h4> <?php echo $Sum2['fullname']?></h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <h6> Nama Client </h6>
                        <h4> <?php echo $Sum2['nama']?></h4>
                    </div>
                    <div class="col-6">
                        <h6> Project Div </h6>
                        <h4> <?php echo $Sum2['projectdiv']?></h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <h6> Project Type </h6>
                        <h4> <?php echo $Sum2['project_type']?></h4>
                    </div>
                    <div class="col-6">
                        <h6> Mandays Digunakan </h6>
                        <h4> <?php echo $Sum2['jumlah']?></h4>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-5">
                        <div>Start Date / yyyy-mm-dd</div>
                        <div class="card">
                        <input type="date" value="<?php echo $Sum2['start_date']?>" name="start_date">
                        </div>
                    </div>
                    <div class="col-5 offset-1">
                        <div>End Date / yyyy-mm-dd</div>
                        <div class="card">
                        <input type="date" value="<?php echo $Sum2['end_date']?>"  name="end_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div>Jumlah Mandays di Setting</div>
                        <div class="card">
                        <input type="text" value="<?php echo $Sum2['mandays']?>"  name="mandays">
                        </div>
                    </div>
                    <div class="col-5 offset-1">
                        <div>Nilai Project Rupiah</div>
                        <div class="card">
                        <input type="text" value="<?php echo $Sum2['nilai_project']?>"  name="nilai_project">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div>Project Status</div>
                        <div class="card">
                        <select name="status" id="status">
                            <option value="<?php echo $Sum2['status']?>" disabled selected><?php echo $Sum2['status']?></option>
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="PENDING">PENDING</option>
                            <option value="CLOSED">CLOSED</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success"style="padding: 5px 0px 5px 0px; width: 70px; font-size: 13px;">Update</button>
            </form>
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
include "footer.php";
include "js.php";
?>