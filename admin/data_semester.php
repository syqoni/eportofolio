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
    <title>DATA SEMESTER</title>

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
                                $edit = mysqli_query($con,"SELECT * FROM tbsemester WHERE idsem='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data User</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idsem' class='form-control-label'>Id Semester</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idsem' name='idsem' value='$r[idsem]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='thn_ajaran' class='form-control-label'>Tahun Ajaran</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='thn_ajaran' name='thn_ajaran' value='$r[thn_ajaran]' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='semester' class='form-control-label'>Semester</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='semester' id='semester' value='$r[semester]' class='form-control'>
                                                        <option value='1/Ganjil'>1/Ganjil</option>
                                                        <option value='2/Ganjil'>2/Ganjil</option>
                                                        <option value='3/Genap'>3/Genap</option>
                                                        <option value='4/Genap'>4/Genap</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='level' class='form-control-label'>Level User</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='status' id='status' value='$r[status]' class='form-control'>
                                                        <option value='aktif'>Aktif</option>
                                                        <option value='tidak aktif'>Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=data_semester'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE tbsemester SET
                                        idsem='$_POST[idsem]',
                                        thn_ajaran='$_POST[thn_ajaran]',
                                        semester='$_POST[semester]',
                                        status='$_POST[status]'
                                        WHERE idsem='$_POST[idsem]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=data_semester')</script>";
                                }

                            }elseif(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Data Semester</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idsem' class='form-control-label'>ID Semester</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idsem' name='idsem' placeholder='idsem' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan ID Semester.</small>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='thn_ajaran' class='form-control-label'>Tahun Ajaran</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='thn_ajaran' id='thn_ajaran' name='thn_ajaran' placeholder='thn_ajaran' class='form-control'>
                                                    <small class='help-block form-text'>Masukkan Tahun Ajaran.</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='semester' class='form-control-label'>Semester</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                <select name='semester' id='semester' value='Pilih Semester' class='form-control'>
                                                        <option value='1/Ganjil'>1/Ganjil</option>
                                                        <option value='2/Ganjil'>2/Ganjil</option>
                                                        <option value='3/Genap'>3/Genap</option>
                                                        <option value='4/Genap'>4/Genap</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='status' class='form-control-label'>Status Semester</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                <select name='status' id='status' value='Pilih Status' class='form-control'>
                                                        <option value='aktif'>Aktif</option>
                                                        <option value='tidak aktif'>Tidak Aktif</option>
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
                                    mysqli_query($con,"INSERT INTO tbsemester (idsem,thn_ajaran,semester,status)
                                        VALUES ('$_POST[idsem]',
                                                '$_POST[thn_ajaran]',
                                                '$_POST[semester]',
                                                '$_POST[status]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_semester')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM tbsemester WHERE idsem='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=data_semester'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data semester</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='?page=data_semester&add'>
                                            <i class="zmdi zmdi-plus"></i>tambah Semester</a>
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
                                                <th>ID Semester</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Aktif</th>
                                                <th>Kontrol</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php

                                            $no=1;
                                            $tampil=mysqli_query($con,"SELECT * FROM tbsemester");
                                            while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['idsem']; ?></td>
                                                <td><?php echo $data['thn_ajaran']; ?></td>
                                                <td><?php echo $data['semester']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_semester&edit=<?php echo $data['idsem']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_semester&hapus=<?php echo $data['idsem']; ?>">
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
