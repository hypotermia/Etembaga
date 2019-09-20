<div class="container-fluid">
<!--
            <div class="block-header">
                <h2>
                    Kategori
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
-->
			<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pemesanan
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="form_advanced_validation" action="<?=$action?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="id_pesanan">Kode Pemesanan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_pesanan" name="data[id_pesanan]" class="form-control" placeholder="Ketik kode pemesanan" value="<?php echo isset($data['id_pesanan']) ? $data['id_pesanan'] : $kode_pemesanan; ?>" required readonly>
												<input type="hidden" name="id_pemesanan" value="<?php echo isset($data['id_pesanan']) ? $data['id_pesanan'] : $kode_pemesanan; ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="penerima">Penerima</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="penerima" name="data[penerima]" class="form-control" placeholder="Ketik nama penerima" value="<?php echo isset($data['penerima']) ? $data['penerima'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="alamat_penerima">Alamat Penerima</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="alamat_penerima" name="data[alamat_penerima]" class="form-control" placeholder="Ketik alamat penerima" value="<?php echo isset($data['alamat_penerima']) ? $data['alamat_penerima'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
										<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save">&nbsp;&nbsp;
										<a href="<?=site_url()?>/pemesanan/v_pemesanan"><button type="button" class="btn btn-default m-t-15 waves-effect">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
			</div>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Detail Pesanan
                            </h2>
                        </div>
                        <div class="body">							
                            <form action="<?=$action_dtl?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
													<select name="ex" class="form-control show-tick">
														<option value="">-- Please select --</option>
														<?php
														if(count($list_produk) > 1){
															foreach($list_produk->result_array() as $list){
															?>
															<option value="<?=$list['id_produk']?>"><?=$list['nama_produk']?></option>
															<?php
															}
														}
										   				?>
													</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="id_produk" value="PRD-0001" class="form-control" placeholder="id produk">
												<input type="hidden" name="id_pesanan" value="<?php echo isset($data['id_pesanan']) ? $data['id_pesanan'] : $kode_pemesanan; ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                                        <input type="checkbox" id="remember_me_4" class="filled-in">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save">
                                    </div>
                                </div>
                            </form>
							<div class="table-responsive">	
								<table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama product</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
									if(count($data_detail)){
										$no = 1;
										foreach($data_detail as $data_dtl){									
										?>
										<tr>
											<th scope="row"><?= $no ;?></th>
											<td><?= $data_dtl['nama_produk']; ?></td>
											<td><?= $data_dtl['jumlah'];?></td>
											<td><?= $data_dtl['subtotal'];?></td>
											<td><a href="<?=site_url()?>/pemesanan/delete_dtl_pemesanan/<?=$data_dtl['id_pesanan']?>/<?=$data_dtl['id_detailpesanan']?>"><button type="button" class="btn btn-danger btn-xs waves-effect">
														<i class="material-icons" title="Delete">delete</i>
													</button></a>
											</td>
										</tr>
										<?php 
											$no++;
										}
									}else{
										echo "<tr>
													<td colspan='5'>Belum ada barang</td>
												 </tr>";
									}
									?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>