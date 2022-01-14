                            echo"<div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Tambah Data User</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="nama_user" class=" form-control-label">Nama</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_user" name="nama_user" placeholder="Text" class="form-control">
                                                    <small class="form-text text-muted">Masukkan nama anda.</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control">
                                                    <small class="help-block form-text">Masukkan email anda.</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="username" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="username" name="username" placeholder="Text" class="form-control">
                                                    <small class="form-text text-muted">Masukkan username anda.</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                                    <small class="help-block form-text">Masukkan password anda.</small>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="level" class=" form-control-label">Level User</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="level" id="level" class="form-control">
                                                        <option value="fasil">Fasilitator</option>
                                                        <option value="ortu">Orangtua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <!--<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Gambar</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="file-input" class="form-control-file">
                                                </div>
                                            </div>-->
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-sm"/>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>"
                            