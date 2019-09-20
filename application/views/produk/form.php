<div class="container-fluid">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tamabah Data Produk
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="form_advanced_validation" action="<?=$action?>" method="post" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="id_produk">ID Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_produk" name="data[id_produk]" class="form-control" placeholder="Ketik kode produk" value="<?php echo isset($data['id_produk']) ? $data['id_produk'] : $kode_produk; ?>" required readonly>
                                                <input type="hidden" name="photo_old" value="<?php echo isset($data['photo']) ? $data['photo'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama_produk">Nama Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_produk" name="data[nama_produk]" class="form-control" placeholder="Ketik nama produk" value="<?php echo isset($data['nama_produk']) ? $data['nama_produk'] : set_value('data[nama_produk]'); ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="harga_produk">Harga Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="harga_produk" name="data[harga_produk]" class="form-control" placeholder="Ketik nama produk" value="<?php echo isset($data['harga_produk']) ? $data['harga_produk'] : set_value('data[harga_produk]'); ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="harga_produk">Desc Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="des_produk" name="data[des_produk]" class="form-control" placeholder="Ketik desc produk" value="<?php echo isset($data['des_produk']) ? $data['des_produk'] : set_value('data[des_produk]'); ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="harga_produk">Photo</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="photo" class="form-control" placeholder="Upload image" >
												<?php echo form_error('photo','<span class="alert-danger">','</span>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
										<input type="submit" class="btn btn-lg btn-primary m-t-15 waves-effect" value="Save">&nbsp;&nbsp;
										<a href="<?=site_url()?>/produk/v_produk"><button type="button" class="btn btn-lg btn-default m-t-15 waves-effect">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>