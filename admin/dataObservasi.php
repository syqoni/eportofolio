<?php
    include '../api/config.php';
    //include '../api/functions.php';
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
    <title>DATA KOMPETENSI DASAR</title>

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
                                $edit = mysqli_query($con,"SELECT * FROM tbobservasi WHERE idobservasi='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data Observasi</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col-12 col-md-9'>
                                                    <input type='hidden' id='idobservasi' name='idobservasi' value='$r[idobservasi]' class='form-control'>
                                                </div>
                                            </div>
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
                                                    <label for='foto' class='form-control-label'>Foto Observasi</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idsiswa' name='foto' value='$r[foto]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='ctt_observe' class='form-control-label'>Catatan Observasi</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='ctt_observe' name='ctt_observe' value='$r[ctt_observe]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=dataObservasi'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE tbobservasi SET
                                        idsiswa='$_POST[idsiswa]',
                                        foto='$_POST[foto]',
                                        ctt_observe='$_POST[ctt_observe]'
                                        WHERE idobservasi='$_POST[idobservasi]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=dataObservasi')</script>";
                                }

                            }elseif(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Observasi</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col-12 col-md-9'>
                                                    <input type='hidden' id='idobservasi' name='idobservasi' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idsiswa' class='form-control-label'>NIS Siswa</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idsiswa' name='idsiswa' placeholder='NIS siswa' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan NIS Siswa</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='foto' class='form-control-label'>Foto Observasi</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='foto' name='foto' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan Foto</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='ctt_observe' class='form-control-label'>Foto Observasi</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='ctt_observe' name='ctt_observe' class='form-control'>
                                                    <small class='form-text text-muted'>Catatan</small>
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
                                    mysqli_query($con,"INSERT INTO tbobservasi(idobservasi,idsiswa,foto,ctt_observe)
                                        VALUES ('$_POST[idobservasi]',
                                                '$_POST[idsiswa]',
                                                '$_POST[idsem]',
                                                '$_POST[foto]',
                                                '$_POST[ctt_observe]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=dataObservasi')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM tbobservasi WHERE idobservasi='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=dataObservasi'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data Observasi Siswa</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='?page=data_kd&add'>
                                            <i class="zmdi zmdi-plus"></i>add item</a>
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
                                                <th>idsiswa</th>
                                                <th>idsem</th>
                                                <th>foto</th>
                                                <th>catatan observasi</th>
                                                <th>controls</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php

                                            $no=1;
                                            $tampil=mysqli_query($con,"SELECT * FROM tbobservasi");
                                            while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['idsiswa']; ?></td>
                                                <td><?php echo $data['idsem']; ?></td>
                                                <td><img src="../images/<?= $data['foto']; ?>" width="100"></td>
                                                <td><?php echo $data['ctt_observe']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=dataObservasi&edit=<?php echo $data['idobservasi']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=dataObservasi&hapus=<?php echo $data['idobservasi']; ?>">
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
