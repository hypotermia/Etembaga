<div class="container-fluid">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tamabah Data Kurir
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="form_advanced_validation" action="<?=$action?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="id_kurir">Id Kurir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_kurir" name="data[id_kurir]" class="form-control" placeholder="Ketik kode kurir" value="<?php echo isset($data['id_kurir']) ? $data['id_kurir'] : $kode_kurir; ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama_kurir">Nama Kurir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_kurir" name="data[nama_kurir]" class="form-control" placeholder="Ketik nama kurir" value="<?php echo isset($data['nama_kurir']) ? $data['nama_kurir'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="noktp">Nomor KTP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="noktp" name="data[noktp_kurir]" class="form-control" placeholder="Ketik no ktp kurir" value="<?php echo isset($data['noktp_kurir']) ? $data['noktp_kurir'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="notlp_kurir">Nomor Telp</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="notlp_kurir" name="data[notlp_kurir]" class="form-control" placeholder="Ketik no telp kurir" value="<?php echo isset($data['notlp_kurir']) ? $data['notlp_kurir'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="alamat_kurir">Alamat Kurir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="alamat_kurir" name="data[alamat_kurir]" class="form-control" placeholder="Ketik alamat kurir" value="<?php echo isset($data['alamat_kurir']) ? $data['alamat_kurir'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="gender">Jenis Kelamin Kurir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<?php
											$lk = "";
											$pr = "";
											if (isset($data['jeniskel_kurir'])){
												if($data['jeniskel_kurir'] == 'Laki Laki'){
													$lk = 'checked';
												}else if($data['jeniskel_kurir'] == 'Perempuan'){
													$pr = 'checked';
												}
											}
											?>
											<input type="radio" name="data[jeniskel_kurir]" id="male" class="with-gap" value="Laki Laki" <?= $lk; ?>>
											<label for="male">Male</label>

											<input type="radio" name="data[jeniskel_kurir]" <?= $pr ?> id="female" class="with-gap" value="Perempuan">
											<label for="female" class="form-control">Female</label>
											
										</div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="username_kurir">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="username_kurir" name="data[username_kurir]" class="form-control" placeholder="Ketik username kurir" value="<?php echo isset($data['username_kurir']) ? $data['username_kurir'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="pass_kurir">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="pass_kurir" name="data[pass_kurir]" class="form-control" placeholder="Ketik password kurir" value="<?php echo isset($data['pass_kurir']) ? $data['pass_kurir'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
										<input type="submit" class="btn btn-lg btn-primary m-t-15 waves-effect" value="Save">&nbsp;&nbsp;
										<a href="<?=site_url()?>/kurir/v_kurir"><button type="button" class="btn btn-lg btn-default m-t-15 waves-effect">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>