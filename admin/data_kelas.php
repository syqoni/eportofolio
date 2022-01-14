<?php
    include '../api/config.php';
    
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
    <title>DATA KELAS</title>

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
                                $edit = mysqli_query($con,"SELECT * FROM tbkelas WHERE idkelas='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data Kelas</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idkelas' class='form-control-label'>Id Kelas</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idkelas' name='idkelas' value='$r[idkelas]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_kelas' class='form-control-label'>Kelas</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_kelas' name='nama_kelas' value='$r[nama_kelas]' class='form-control'>
                                                </div>
                                            </div>

                                        
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=data_kelas'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE tbkelas SET
                                        nama_kelas='$_POST[nama_kelas]'
                                        WHERE idkelas='$_POST[idkelas]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=data_kelas')</script>";
                                }

                            }elseif(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Kelas</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idkelas' class='form-control-label'>ID Kelas</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idkelas' name='idkelas' placeholder='idkelas' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan ID Kelas.</small>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='nama_kelas' class='form-control-label'>Nama Kelas</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='nama_kelas' id='nama_kelas' name='nama_kelas' placeholder='nama_kelas' class='form-control'>
                                                    <small class='help-block form-text'>Masukkan Nama Kelas.</small>
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
                                    mysqli_query($con,"INSERT INTO tbkelas (idkelas,nama_kelas)
                                        VALUES ('$_POST[idkelas]',
                                                '$_POST[nama_kelas]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_kelas')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM tbkelas WHERE idkelas='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=data_kelas'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data Kelas</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='?page=data_semester&add'>
                                            <i class="zmdi zmdi-plus"></i>tambah Kelas</a>
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
                                                <th>ID Kelas</th>
                                                <th>Kelas</th>
                                                <th>Kontrol</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php

                                            $no=1;
                                            $tampil=mysqli_query($con,"SELECT * FROM tbkelas");
                                            while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['idkelas']; ?></td>
                                                <td><?php echo $data['nama_kelas']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_kelas&edit=<?php echo $data['idkelas']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_kelas&hapus=<?php echo $data['idkelas']; ?>">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
                                                </td>
                                            </tr>
                                            <?php
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
