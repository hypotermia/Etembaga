<div class="container-fluid">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tamabah Data Barang Masuk
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="form_advanced_validation" action="<?=$action?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-sm-2 form-control-label">
                                        <label for="id_produk">Kode Produk</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_produk" name="id_produk" class="form-control" placeholder="Ketik ID produk" value="<?php echo isset($data['id_produk']) ? $data['id_produk'] : ''; ?>" <?php echo isset($data['id_produk']) ? "readonly" : ''; ?> required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-sm-2 form-control-label">
                                        <label for="tgl_masuk">Tanggal Masuk</label>
                                    </div>
                                    <div class="col-sm-3">
										<div class="form-group">
										<div class="input-group form-line date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
											<input class="form-control" size="10" type="text" name="tgl_masuk" value="<?php echo isset($data['tgl_masuk']) ? $data['tgl_masuk'] : ''; ?>">
							 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										</div>
										</div>
                                    </div>
								</div>
								<div class="row clearfix">								
									<div class="col-sm-2 form-control-label">
                                        <label for="jumlah">Jumlah</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Ketik jumlah" value="<?php echo isset($data['jumlah']) ? $data['jumlah'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
										<input type="submit" class="btn btn-lg btn-primary m-t-15 waves-effect" value="Save">&nbsp;&nbsp;
										<a href="<?=site_url()?>/pemasukan_barang/v_pemasukan_barang"><button type="button" class="btn btn-lg btn-default m-t-15 waves-effect">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
