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
                                $edit = mysqli_query($con,"SELECT * FROM tbkd WHERE idkd='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data Kompetensi Dasar</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idkd' class='form-control-label'>ID Kompetensi Dasar</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idkd' name='idkd' value='$r[idkd]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='kd' class='form-control-label'>Kompetensi Dasar</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='kd' name='kd' value='$r[kd]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='pilar' class='form-control-label'>Pilar Kurikulum</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='pilar' id='pilar' value='$r[pilar]' class='form-control'>
                                                        <option value='P01'>Akhlak dan Leadership</option>
                                                        <option value='P02'>Ilmu dan Logika</option>
                                                        <option value='P03'>Bakat dan Lifeskill</option> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=data_kd'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE tbkd SET
                                        kd='$_POST[kd]',
                                        pilar='$_POST[pilar]'
                                        WHERE idkd='$_POST[idkd]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=data_kd')</script>";
                                }

                            }elseif(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Kompetensi Dasar</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idkd' class='form-control-label'>ID KD</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idkd' name='idkd' placeholder='Id KD' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan KD</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='kd' class='form-control-label'>Kompetensi Dasar</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                <textarea name='kd' id='kd' rows='9' placeholder='Kompetensi Dasar' class='form-control'></textarea>
                                                    
                                                    <small class='form-text text-muted'>Masukkan Kompetensi Dasar</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='pilar' class='form-control-label'>Pilar Kurikulum</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='pilar' id='pilar' class='form-control'>
                                                        <option value='P01'>Akhlak dan Leadership</option>
                                                        <option value='P02'>Ilmu dan Logika</option>
                                                        <option value='P03'>Bakat dan Lifeskill</option>
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
                                    mysqli_query($con,"INSERT INTO tbkd(idkd,kd,pilar)
                                        VALUES ('$_POST[idkd]',
                                                '$_POST[kd]',
                                                '$_POST[pilar]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_kd')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM tbkd WHERE idkd='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=data_kd'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
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
                                                <th>idkd</th>
                                                <th>kompetensi dasar</th>
                                                <th>pilar</th>
                                                <th>controls</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php

                                            $no=1;
                                            $tampil=mysqli_query($con,"SELECT * FROM tbkd");
                                            while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['idkd']; ?></td>
                                                <td><?php echo $data['kd']; ?></td>
                                                <td><?php echo $data['pilar']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_kd&edit=<?php echo $data['idkd']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_kd&hapus=<?php echo $data['idkd']; ?>">
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
