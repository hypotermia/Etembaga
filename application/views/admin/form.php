<div class="container-fluid">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tamabah Data Admin
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="form_advanced_validation" action="<?=$action?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="id_admin">Id Admin</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_admin" name="data[id_admin]" class="form-control" placeholder="Ketik id admin" value="<?php echo isset($data['id_admin']) ? $data['id_admin'] : $kode_admin; ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama_admin">Nama Admin</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_admin" name="data[nama_admin]" class="form-control" placeholder="Ketik nama admin" value="<?php echo isset($data['nama_admin']) ? $data['nama_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="username_admin">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="username_admin" name="data[username_admin]" class="form-control" placeholder="Ketik nama username" value="<?php echo isset($data['username_admin']) ? $data['username_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="pass_admin">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="pass_admin" name="data[pass_admin]" class="form-control" placeholder="Ketik Pass admin" value="<?php echo isset($data['pass_admin']) ? $data['pass_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="notlp_admin">No Telp</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="notlp_admin" name="data[notlp_admin]" class="form-control" placeholder="Ketik No telp admin" value="<?php echo isset($data['notlp_admin']) ? $data['notlp_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_admin">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" id="email_admin" name="data[email_admin]" class="form-control" placeholder="Ketik Email admin" value="<?php echo isset($data['email_admin']) ? $data['email_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="alamat_admin">Alamat</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="alamat_admin" name="data[alamat_admin]" class="form-control" placeholder="Ketik Alamat" value="<?php echo isset($data['alamat_admin']) ? $data['alamat_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kodepos_admin">Kode pos</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kodepos_admin" name="data[kodepos_admin]" class="form-control" placeholder="Ketik Kode pos " value="<?php echo isset($data['kodepos_admin']) ? $data['kodepos_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kota_admin">Kota</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kota_admin" name="data[kota_admin]" class="form-control" placeholder="Ketik Kode pos " value="<?php echo isset($data['kota_admin']) ? $data['kota_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="prov_admin">Provinsi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="prov_admin" name="data[prov_admin]" class="form-control" placeholder="Ketik Kode pos " value="<?php echo isset($data['prov_admin']) ? $data['prov_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="noktp_admin">Nomor KTP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="noktp_admin" name="data[noktp_admin]" class="form-control" placeholder="Ketik Kode pos " value="<?php echo isset($data['noktp_admin']) ? $data['noktp_admin'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
										<input type="submit" class="btn btn-lg btn-primary m-t-15 waves-effect" value="Save">&nbsp;&nbsp;
										<a href="<?=site_url()?>/admin/v_admin"><button type="button" class="btn btn-lg btn-default m-t-15 waves-effect">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>