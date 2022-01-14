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
    <title>DATA SISWA</title>

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
                            if(isset($_GET['edit'])){
                                $edit = mysqli_query($con,"SELECT * FROM tbsiswa WHERE idsiswa='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data Siswa</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idsiswa' class='form-control-label'>NIS Siswa</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idsiswa' name='idsiswa' value='$r[idsiswa]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idkelas' class='form-control-label'>Kelas</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='idkelas' id='idkelas' class='form-control'>
                                                        <option value='$r[idkelas]'>$r[idkelas]</option>
                                                        <option value='0'>TK</option>
                                                        <option value='1'>1/Satu</option>
                                                        <option value='2'>2/Dua</option>
                                                        <option value='3'>3/Tiga</option>
                                                        <option value='4'>4/Empat</option>
                                                        <option value='5'>5/Lima</option>
                                                        <option value='6'>6/Enam</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_siswa' class='form-control-label'>Nama Siswa</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_siswa' name='nama_siswa' value='$r[nama_siswa]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='jk' class='form-control-label'>Jenis Kelamin</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='jk' id='jk' class='form-control'>
                                                        <option value='$r[jk]'>$r[jk]</option>
                                                        <option value='Perempuan'>Perempuan</option>
                                                        <option value='Laki-laki'>Laki-laki</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='tempat_lahir' class='form-control-label'>Tempat Lahir</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='tempat_lahir' name='tempat_lahir' value='$r[tempat_lahir]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='tanggal_lahir' class='form-control-label'>Tanggal Lahir</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='tanggal_lahir' name='tanggal_lahir' value='$r[tanggal_lahir]' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='alamat' class='form-control-label'>Alamat</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='alamat' name='alamat' value='$r[alamat]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='agama' class='form-control-label'>Agama</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='agama' id='agama' class='form-control'>
                                                        <option value='$r[agama]'>$r[agama]</option>
                                                        <option value='Islam'>Islam</option>
                                                        <option value='Kristen'>Kristen</option>
                                                        <option value='Hindu'>Hindu</option>
                                                        <option value='Budha'>Budha</option>
                                                        <option value='Konghucu'>Konghucu</option>
                                                        <option value='Lainnya'>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_ayah' class='form-control-label'>Nama Ayah</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_ayah' name='nama_ayah' value='$r[nama_ayah]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_ibu' class='form-control-label'>Nama Ibu</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_ibu' name='nama_ibu' value=' $r[nama_ibu]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='alamat_ortu' class='form-control-label'>Alamat Orangtua</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='alamat_ortu' name='alamat_ortu' value='$r[alamat_ortu]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='telepon' class='form-control-label'>Telepon</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='telepon' name='telepon' value='$r[telepon]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=data_siswa'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE tbsiswa SET
                                        idkelas='$_POST[idkelas]',
                                        nama_siswa='$_POST[nama_siswa]',
                                        jk='$_POST[jk]',
                                        tempat_lahir='$_POST[tempat_lahir]',
                                        tanggal_lahir='$_POST[tanggal_lahir]',
                                        alamat='$_POST[alamat]',
                                        agama='$_POST[agama]',
                                        nama_ayah='$_POST[nama_ayah]',
                                        nama_ibu='$_POST[nama_ibu]',
                                        alamat_ortu='$_POST[alamat_ortu]',
                                        telepon='$_POST[telepon]'
                                        WHERE idsiswa='$_POST[idsiswa]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=data_siswa')</script>";
                                }

                            }elseif(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Data Siswa</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idsiswa' class='form-control-label'>NIS Siswa</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idsiswa' name='idsiswa' placeholder='NIS siswa' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idkelas' class='form-control-label'>Kelas</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='idkelas' id='idkelas' class='form-control'>
                                                        <option value='0'>TK</option>
                                                        <option value='1'>1/Satu</option>
                                                        <option value='2'>2/Dua</option>
                                                        <option value='3'>3/Tiga</option>
                                                        <option value='4'>4/Empat</option>
                                                        <option value='5'>5/Lima</option>
                                                        <option value='6'>6/Enam</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_siswa' class='form-control-label'>Nama Siswa</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_siswa' name='nama_siswa' placeholder='Nama Siswa' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='jk' class='form-control-label'>Jenis Kelamin</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='jk' id='jk' class='form-control'>
                                                        <option value='Perempuan'>Perempuan</option>
                                                        <option value='Laki-laki'>Laki-laki</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='tempat_lahir' class='form-control-label'>Tempat Lahir</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='tempat_lahir' name='tempat_lahir' placeholder='Tempat Lahir' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='tanggal_lahir' class='form-control-label'>Tanggal Lahir</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='tanggal_lahir' name='tanggal_lahir' placeholder='dd/mm/yyyy' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='alamat' class='form-control-label'>Alamat</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='alamat' name='alamat' placeholder='Alamat' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='agama' class='form-control-label'>Agama</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='agama' id='agama' class='form-control'>
                                                        <option value='Islam'>Islam</option>
                                                        <option value='Kristen'>Kristen</option>
                                                        <option value='Hindu'>Hindu</option>
                                                        <option value='Budha'>Budha</option>
                                                        <option value='Konghucu'>Konghucu</option>
                                                        <option value='Lainnya'>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_ayah' class='form-control-label'>Nama Ayah</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_ayah' name='nama_ayah' placeholder='Nama Ayah' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_ibu' class='form-control-label'>Nama Ibu</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_ibu' name='nama_ibu' placeholder='Nama Ibu' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='alamat_ortu' class='form-control-label'>Alamat Orangtua</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='alamat_ortu' name='alamat_ortu' placeholder='Alamat Orangtua' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='telepon' class='form-control-label'>Telepon</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='telepon' name='telepon' placeholder='Telepon' class='form-control'>
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
                                    mysqli_query($con,"INSERT INTO tbsiswa (idsiswa,idkelas,nama_siswa,jk,tempat_lahir,tanggal_lahir,alamat,agama,nama_ayah,nama_ibu,alamat_ortu,telepon)
                                        VALUES ('$_POST[idsiswa]',
                                                '$_POST[idkelas]',
                                                '$_POST[nama_siswa]',
                                                '$_POST[jk]',
                                                '$_POST[tempat_lahir]',
                                                '$_POST[tanggal_lahir]',
                                                '$_POST[alamat]',
                                                '$_POST[agama]',
                                                '$_POST[nama_ayah]',
                                                '$_POST[nama_ibu]',
                                                '$_POST[alamat_ortu]',
                                                '$_POST[telepon]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_siswa')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM tbsiswa WHERE idsiswa='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=data_siswa'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data siswa</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <form action="" method="post">
                                        <div class="rs-select2--light rs-select2--md">
                                            
                                            <select class="js-select2" name="idkelas">

                                            <?php

                                                $no=1;
                                                $tampil=mysqli_query($con,"SELECT * FROM tbkelas ORDER BY idkelas ASC");
                                                while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                                <option value="<?php echo $data['idkelas']; ?>"><?php echo $data['nama_kelas']; ?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>

                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        
                                        <input type="submit" name="submit" value="filter" class="btn au-btn-filter">
                                            </form>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='?page=data_siswa&add'>
                                            <i class="zmdi zmdi-plus"></i>tambah siswa</a>
                                    </div>
                                </div>
                                
                                <!-- END OF TABLE TOP -->
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>nipd</th>
                                                <th>kelas</th>
                                                <th>nama siswa</th>
                                                <th>tempat lahir</th>
                                                <th>alamat</th>
                                                <th>controls</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php
                                                if (isset($_POST['submit'])) {
                                                    $idkelas = $_POST['idkelas'];
                                                        
                                                if ($idkelas != "") {
                                                $no=1;
                                                $tampil=mysqli_query($con,"SELECT * FROM tbsiswa WHERE idkelas='$idkelas'");
                                                while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['idsiswa']; ?></td>
                                                <td><?php echo $data['idkelas']; ?></td>
                                                <td><?php echo $data['nama_siswa']; ?></td>
                                                <td><?php echo $data['tempat_lahir']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_siswa&edit=<?php echo $data['idsiswa']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_siswa&hapus=<?php echo $data['idsiswa']; ?>">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
                                                </td>
                                            </tr>
                                            <?php
                                                        }
                                                    }
                                                }else{
                                                    $no=1;
                                                    $tampil=mysqli_query($con,"SELECT * FROM tbsiswa");
                                                    while ($data=mysqli_fetch_array($tampil)) {
                                                
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['idsiswa']; ?></td>
                                                <td><?php echo $data['idkelas']; ?></td>
                                                <td><?php echo $data['nama_siswa']; ?></td>
                                                <td><?php echo $data['tempat_lahir']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_siswa&edit=<?php echo $data['idsiswa']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_siswa&hapus=<?php echo $data['idsiswa']; ?>">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                        
                        <?php
                            }
                        ?>

                        
                            </div>
                        </div>
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
