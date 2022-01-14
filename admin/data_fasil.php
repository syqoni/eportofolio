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
    <title>DATA FASILITATOR</title>

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
                                $edit = mysqli_query($con,"SELECT * FROM tbfasil WHERE idfasil='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data Fasilitator</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idfasil' class='form-control-label'>ID FASIL</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idfasil' name='idfasil' value='$r[idfasil]' class='form-control'>
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
                                                    <label for='nama_fasil' class='form-control-label'>Nama Fasilitator</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_fasil' name='nama_fasil' value='$r[nama_fasil]' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='email_fasil' class='form-control-label'>Email Fasilitator</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='email' id='email_fasil' name='email_fasil' value='$r[email_fasil]' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='telepon' class='form-control-label'>Nomor HP</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='telepon' name='telepon' value='$r[telepon]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=data_fasil'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE tbfasil SET
                                        idkelas='$_POST[idkelas]',
                                        nama_fasil='$_POST[nama_fasil]',
                                        email_fasil='$_POST[email_fasil]',
                                        telepon='$_POST[telepon]'
                                        WHERE idfasil='$_POST[idfasil]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=data_fasil')</script>";
                                }

                            }elseif(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Data Fasilitator</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='idfasil' class='form-control-label'>ID Fasilitator</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='idfasil' name='idfasil' placeholder='ID Fasilitator' class='form-control'>
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
                                                    <label for='nama_fasil' class='form-control-label'>Nama Fasilitator</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='nama_fasil' name='nama_fasil' placeholder='Nama Fasilitator' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='email_fasil' class='form-control-label'>Email</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='email_fasil' id='email_fasil' name='email_fasil' class='form-control'>
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
                                
                                $idfasil = $_POST['idfasil'];
                                $idkelas = $_POST['idkelas'];
                                $nama_fasil = $_POST['nama_fasil'];
                                $email_fasil = $_POST['email_fasil'];
                                $telepon = $_POST['telepon'];
                                
                                    mysqli_query($con,"INSERT INTO tbfasil (idfasil,idkelas,nama_fasil,
                                                    email_fasil,telepon) VALUES ('$idfasil',
                                                    '$idkelas','$nama_fasil',
                                                    '$email_fasil','$telepon')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_fasil')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM tbfasil WHERE idfasil='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=data_fasil'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data Fasilitator</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='?page=data_fasil&add'>
                                            <i class="zmdi zmdi-plus"></i>tambah fasilitator</a>
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
                                                <th>id fasil</th>
                                                <th>id kelas</th>
                                                <th>nama fasilitator</th>
                                                <th>email fasilitator</th>
                                                <th>telepon</th>
                                                <th>controls</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php

                                            $no=1;
                                            $tampil=mysqli_query($con,"SELECT * FROM tbfasil");
                                            while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $data['idfasil']; ?></td>
                                                <td><?php echo $data['idkelas']; ?></td>
                                                <td><?php echo $data['nama_fasil']; ?></td>
                                                <td><?php echo $data['email_fasil']; ?></td>
                                                <td><?php echo $data['telepon']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_fasil&edit=<?php echo $data['idfasil']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_fasil&hapus=<?php echo $data['idfasil']; ?>">
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
