<?php
    //include 'api/config.php';
    //include '../api/class_user.php';
    //$user = new User();
    //session_start();
    
    //session_start();
    //if(!isset($_SESSION["login"])){
    //    header('location: admin_index.php');
    //    exit;
    //}

    include "../admin/layout/js_script.php";
    
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>INPUT DATA NILAI PORTOFOLIO</title>

    <?php 
        include '../admin/layout/css.php';
    ?>

</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- PAGE CONTAINER-->
        <div class="page-container">
          
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php
                        if(isset($_GET['nama_kelas'],$_GET['nama_pilar'],$_GET['thn_ajaran'],$_GET['semester'])){
                            
                            //isset($_GET['nisn'],$_GET['kdpilar'],$_GET['idkelas'],$_GET['idsem'])
                            
                                //$idsiswa = $_GET['nisn'];
                                //$kdpilar = $_GET['kdpilar'];
                                //$idkelas = $_GET['idkelas'];
                                //$idsem = $_GET['idsem'];
                                
                                $nama_kelas = $_GET['nama_kelas'];
                                $nama_pilar = $_GET['nama_pilar'];
                                $thn_ajaran = $_GET['thn_ajaran'];
                                $semester = $_GET['semester'];
    
                                //$nama_siswa = $_POST['nama_siswa'];
                                //$nama_kelas = $_POST['nama_kelas'];
                                //$thn_ajaran = $_POST['thn_ajaran'];
                                //$semester = $_POST['semester'];
                                //$kd = $_POST['kd'];
                                //$nilai_kd = $_POST['nilai_kd'];
                                
                                $pilih = mysqli_query($con, "SELECT * FROM tbpilar 
                                LEFT JOIN tbsiswa ON tbpilar.idkelas=tbsiswa.idkelas 
                                LEFT JOIN pilar ON tbpilar.kdpilar=pilar.kdpilar
                                LEFT JOIN tbsemester ON tbpilar.idsem=tbsemester.idsem
                                WHERE idsiswa='$idsiswa' AND tbpilar.idsem='$idsem' AND tbpilar.kdpilar='$kdpilar'") or die(mysqli_error());
                                $value=mysqli_fetch_array($pilih);

                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>INPUT NILAI KOMPETENSI DASAR PILAR</strong>
                                    </div>
                                    <div class='card-body card-block'>";

                                    ?>
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="idkelas" class="form-control-label">KELAS</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" id="idkelas" name="idkelas" class="form-control" value="<?php echo $value['idkelas']; ?>" >
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="kdpilar" class="form-control-label">PILAR</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" id="kdpilar" name="kdpilar" class="form-control" value="<?php echo $value['nama_pilar']; ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="idsiswa" class="form-control-label">NISN</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" id="idsiswa" name="idsiswa" class="form-control" value="<?php echo $value['idsiswa']; ?>"></input>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="nama_siswa" class="form-control-label">NAMA SISWA</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" id="nama_siswa" name="nama_siswa" class="form-control" value="<?php echo $value['nama_siswa']; ?>"></input>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="idsem" class="form-control-label">Tahun Ajaran dan Semester</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" id="idsem" name="idsem" class="form-control" value="<?php echo $value['idsem']; ?>"></input>
                                                </div>
                                            </div>
                                            <hr>
                                        
                                            <div class="row form-group">
                                                <!--<input hidden type="text" name="idnilai[]" class="form-control">-->
                                                <div class="col col-md-3">

                                                    <select name="idpilar[]" class="form-control">
                                                        <option value="">PILIH KOMPETENSI DASAR</option>
                                                        <?php
                                                        $pilih = mysqli_query($con, "SELECT * FROM tbpilar 
                                LEFT JOIN tbsiswa ON tbpilar.idkelas=tbsiswa.idkelas 
                                LEFT JOIN pilar ON tbpilar.kdpilar=pilar.kdpilar
                                LEFT JOIN tbsemester ON tbpilar.idsem=tbsemester.idsem
                                WHERE idsiswa='$idsiswa' AND tbpilar.idsem='$idsem' AND tbpilar.kdpilar='$kdpilar'") or die(mysqli_error());
                                                            while ($pilihkd=mysqli_fetch_array($pilih)) {
                                                        ?>
                                                            <option value="<?php echo $pilihkd['idpilar']; ?>"><?php echo $pilihkd['kd']; ?></option>
                                                            
                                                        <?php 
                                                                }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <!--<input type="text" name="nilai_kd[]" class="form-control">-->
                                                    <input type="radio" name="nilai_kd[]" value="1">1
                                                    <input type="radio" name="nilai_kd[]" value="2">2
                                                    <input type="radio" name="nilai_kd[]" value="3">3
                                                    <input type="radio" name="nilai_kd[]" value="4">4
                                                    <input type="radio" name="nilai_kd[]" value="5">5
                                                        <small class="form-text text-muted"></small>
                                                </div>
                                                <div class="col-md-2">
                                                <input type="button" id="tambah" name="tambah" value="Tambah" class="btn btn-primary btn-md"/>
                                                </div>
                                                <div class="col-md-2">
                                                <input type="button" id="btn-reset-form" name="btn-reset-form" value="Reset" class="btn btn-primary btn-md"/>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="insert-form"></div>
                                            
                                            <div class="card-footer">
                                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-sm"/>
                                            </div>
                                       </form>

                                       <input type="hidden" id="jumlah-form" value="1">
                                        <script>
                                            $(document).ready(function(){ // Ketika halaman sudah diload dan siap
                                                $("#tambah").click(function(){ // Ketika tombol Tambah Data Form di klik
                                                    var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
                                                    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

                                                    <?php $pilih = mysqli_query($con, "SELECT * FROM tbpilar LEFT JOIN tbsiswa ON tbpilar.idkelas=tbsiswa.idkelas WHERE idsiswa='$idsiswa' AND kdpilar='$kdpilar'")or die(mysqli_error());
                                                    ?>                                
                                                    // Kita akan menambahkan form dengan menggunakan append
                                                    // pada sebuah tag div yg kita beri id insert-form
                                                     $("#insert-form").append(
                                                        "<div class='row form-group'>"+
                                                        "<div class='col col-md-3'>" +
                                                        "<select name='idpilar[]' class='form-control'>"+
                                                        "<option value=''>PILIH KOMPETENSI DASAR</option>"+
                                                        <?php while ($pilihkd=mysqli_fetch_array($pilih)){ ?>
                                                        "<option value='<?php echo $pilihkd['idpilar']; ?>'><?php echo $pilihkd['kd']; ?></option>"+
                                                        <?php } ?>
                                                        "</select>"+
                                                        "</div>"+
                                                        "<div class='col-md-2'>"+
                                                        "<input type='radio' name='nilai_kd[]'' value='1'>1<input type='radio' name='nilai_kd[]'' value='2'>2<input type='radio' name='nilai_kd[]'' value='3'>3<input type='radio' name='nilai_kd[]'' value='4'>4<input type='radio' name='nilai_kd[]'' value='5'>5"+
                                                        //"<input type='text' name='nilai_kd[]' class='form-control'>"+
                                                        "<small class='form-text text-muted'></small>"+
                                                        "</div>"+
                                                        "</div>");

                                                    $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
                                                    });
                                                    // Buat fungsi untuk mereset form ke semula
                                                    $("#btn-reset-form").click(function(){
                                                    $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                                                    $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
                                                    });
                                            });
                                        </script>
                                       
                                       
                                    <?php
                                    echo "</div>
                                    </div>
                                </div>";

                            if(isset($_POST['simpan'])){
                                // Ambil data yang dikirim dari form
                                //$idnilai = $_POST['idnilai'];
                                $idsiswa = $_POST['idsiswa']; 
                                $idkelas = $_POST['idkelas']; 
                                $idsem = $_POST['idsem'];
                                $idpilar = $_POST['idpilar'];
                                $nilai_kd = $_POST['nilai_kd'];


                                // Proses simpan ke Database
                                $query = "INSERT INTO tbnilaikd (idsiswa,idkelas,idsem,idpilar,nilai_kd) VALUES";

                                $index = 0; // Set index array awal dengan 0
                                foreach($idpilar as $datanilai){ // Kita buat perulangan berdasarkan nis sampai data terakhir
                                    $query .= "('".$idsiswa."','".$idkelas."','".$idsem."','".$datanilai."','".$nilai_kd[$index]."'),";
                                    $index++;
                                }

                                // Kita hilangkan tanda koma di akhir query
                                // sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
                                // INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
                                $query = substr($query, 0, strlen($query) - 1).";";

                                // Eksekusi $query
                                mysqli_query($con, $query);

                                // Buat sebuah alert sukses, dan redirect ke halaman awal (index.php)
                                echo "<script>alert('Data berhasil disimpan');window.location = 'tambah_porto.php';</script>";
                            }
                        }
                        ?>
                            
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>

    </div>

    

    <?php
    include "../admin/layout/js_script.php";
    ?>
    

</body>

</html>
<!-- end document-->
