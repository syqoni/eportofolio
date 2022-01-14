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
    <title>DATA KOMPETENSI DASAR PILAR</title>

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
                                $edit = mysqli_query($con,"SELECT * FROM tbpilar WHERE idpilar='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data Kompetensi Dasar</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col-12 col-md-9'>
                                                    <input type='hidden' id='idpilar' name='idpilar' value='$r[idpilar]' class='form-control'>
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
                                                    <label for='pilar' class='form-control-label'>Pilar</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='kdpilar' id='kdpilar' class='form-control'>
                                                        <option value='$r[kdpilar]'>$r[kdpilar]</option>
                                                        <option value='P01'>Akhlak dan Leadership</option>
                                                        <option value='P02'>Ilmu dan Logika</option>
                                                        <option value='P03'>Bakat dan Lifeskill</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='kd' class='form-control-label'>Kompetensi Dasar</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <textarea name='kd' id='kd' rows='4' placeholder='Kompetensi Dasar' class='form-control'>$r[kd]</textarea>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=data_pilar'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE tbpilar SET
                                        idkelas='$_POST[idkelas]',
                                        kdpilar='$_POST[kdpilar]',
                                        kd='$_POST[kd]'
                                        WHERE idpilar='$_POST[idpilar]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=data_pilar')</script>";
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
                                                    <label for='idkelas' class='form-control-label'>Kelas</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='idkelas' id='idkelas' class='form-control'>
                                                        <option value=''>PILIH KELAS</option>
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
                                                    <label for='kdpilar' class='form-control-label'>Pilar</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='kdpilar' id='kdpilar' value='' class='form-control'>
                                                        <option value='P01'>Akhlak dan Leadership</option>
                                                        <option value='P02'>Ilmu dan Logika</option>
                                                        <option value='P03'>Bakat dan Lifeskill</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='kd' class='form-control-label'>Kompetensi Dasar</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <textarea name='kd' id='kd' rows='4' placeholder='Kompetensi Dasar' class='form-control'></textarea>
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
                                    mysqli_query($con,"INSERT INTO tbpilar(idkelas,kdpilar,kd)
                                        VALUES ('$_POST[idkelas]',
                                                '$_POST[kdpilar]',
                                                '$_POST[kd]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_pilar')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM tbpilar WHERE idpilar='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=data_pilar'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data Kompetensi Dasar Pilar</h3>
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
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='?page=data_pilar&add'>
                                            <i class="zmdi zmdi-plus"></i>Tambah Kompetensi Dasar</a>
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
                                                <th>id pilar</th>
                                                <th>kelas</th>
                                                <th>pilar</th>
                                                <th>kompetensi dasar</th>
                                                <th>kontrol</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                           <?php
                                                if (isset($_POST['submit'])) {
                                                    $idkelas = $_POST['idkelas'];
                                                    
                                                        
                                                if ($idkelas != "") {
                                                
                                                $tampil=mysqli_query($con,"SELECT * FROM tbpilar WHERE idkelas='$idkelas'");
                                                while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                             <tr>
                                                <td><?php echo $data['idpilar']; ?></td>
                                                <td><?php echo $data['idkelas']; ?></td>
                                                <td><?php echo $data['kdpilar']; ?></td>
                                                <td><?php echo $data['kd']; ?></td>
                                                <td><div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_pilar&edit=<?php echo $data['idpilar']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_pilar&hapus=<?php echo $data['idpilar']; ?>">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div></td>
                                            </tr>
                                        
                                            <?php
                                                    }
                                                }
                                            }else{
                                            
                                            $tampil=mysqli_query($con,"SELECT * FROM tbpilar");
                                            while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $data['idpilar']; ?></td>
                                                <td><?php echo $data['idkelas']; ?></td>
                                                <td><?php echo $data['kdpilar']; ?></td>
                                                <td><?php echo $data['kd']; ?></td>
                                                <td><div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_pilar&edit=<?php echo $data['idpilar']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_pilar&hapus=<?php echo $data['idpilar']; ?>">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div></td>
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
