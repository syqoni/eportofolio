<?php
    include '../api/config.php';
    //include '../api/class_user.php';
    //$user = new User();
    //session_start();
    
    session_start();
    if(!isset($_SESSION["login"])){
        header('location: admin_index.php');
        exit;
    }
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
        include 'layout/css.php';
    ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
            include "layout/header_mobile.php";
            include "layout/menu_sidebar.php";
        ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
           <?php
                include 'layout/header_desktop.php';
            ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php
                            if(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Data User</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_user' class='form-control-label'>Nama</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_user' name='nama_user' placeholder='Nama User' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan nama anda.</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='email' class='form-control-label'>Email</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='email' id='email' name='email' placeholder='Enter Email' class='form-control'>
                                                    <small class='help-block form-text'>Masukkan email anda.</small>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='username' class='form-control-label'>Username</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='username' name='username' placeholder='username' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan username anda.</small>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='password' class='form-control-label'>Password</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='password' id='password' name='password' placeholder='Password' class='form-control'>
                                                    <small class='help-block form-text'>Masukkan password anda.</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='level' class='form-control-label'>Level User</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='level' id='level' class='form-control'>
                                                        <option value='fasil'>Fasilitator</option>
                                                        <option value='ortu'>Orangtua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='simpan' value='Simpan' class='btn btn-primary btn-sm'/>
                                        <button type='reset' class='btn btn-danger btn-sm'>
                                            <i class='fa fa-ban'></i> Reset
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                            if(isset($_POST['simpan'])){
                                    mysqli_query($con,"INSERT INTO user (id_user,nama_user,email,username,password,level)
                                        VALUES ('$_POST[id_user]',
                                                '$_POST[nama_user]',
                                                '$_POST[email]',
                                                '$_POST[username]',
                                                '$_POST[password]',
                                                '$_POST[level]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_porto')</script>";
                                }
                            }else{
                        ?>
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>input nilai</h3>
                                <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row form-group">
                                                <div class="col-md-2">
                                                    <label for="idkelas" class="form-control-label">Kelas</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name='idkelas' id='idkelas' class='form-control'>
                                                        <option value="">PILIH KELAS</option>
                                                        <?php
                                                            include '../api/config.php';

                                                            $tampil=mysqli_query($con,"SELECT * FROM tbkelas ORDER BY idkelas ASC");
                                                                while ($data=mysqli_fetch_array($tampil)) {
                                                        ?>
                                                            <option value="<?php echo $data['idkelas']; ?>"><?php echo $data['nama_kelas']; ?></option>
                                                            
                                                        <?php 
                                                                }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                <input type="submit" name="submit" value="Cari Kelas" class="btn btn-md btn-info btn-block" >
                                            </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                                
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>nisn</th>
                                                <th>nama siswa</th>
                                                <th>kontrol</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($_POST['submit'])) {
                                                    $idkelas = $_POST['idkelas'];

                                                    if ($idkelas != "") {
                                                        $query = "SELECT * FROM tbsiswa WHERE idkelas='$idkelas'";
                                                        $data = mysqli_query($con,$query);
                                                        while ($row=mysqli_fetch_array($data)) {
                                                                //$idsiswa = $_POST['idsiswa'];
                                                                //$nama_siswa = $_POST['nama_siswa'];
                                                                //$kd = $_POST['kd'];
                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['idsiswa'];?></td>
                                                                <td><?php echo $row['nama_siswa'];?></td>
                                                                <td><div class="table-data-feature">
                                                                <a class="item" data-toggle="tooltip" data-placement="top" title="Input" href="?page=data_porto&add=<?php echo $row['idsiswa']; ?>">
                                                                    <i class="zmdi zmdi-edit"></i>
                                                                </a></div></td>
                                                                <!--<td><?php //echo $row['kd'];?></td>
                                                                <td><div class='row form-group'>
                                                                    <div class='col-12 col-md-9'>
                                                                        <input type='text' id='nilai' name='nilai' class='form-control'>
                                                                        <small class='form-text text-muted'></small>
                                                                    </div>
                                                                    </div>
                                                                </td>
                                                                <td><div class='row form-group'>
                                                                    <div class='col-12 col-md-9'>
                                                                        <input type='text' id='nilai_avg' name='nilai_avg' class='form-control'>
                                                                        <small class='form-text text-muted'></small>
                                                                    </div>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                            <?php
                                                        }
                                                    }
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    include "layout/js_script.php";
    ?>

</body>

</html>
<!-- end document-->
