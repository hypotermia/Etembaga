<div class="container-fluid">
			<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pemesanan
                            </h2>
                        </div>
                        <div class="body">
                          <table class="table">
                                <tbody>
                                    <tr class="bg-green">
                                        <th>&nbsp;</th>
                                        <td colspan="3"><b>Data Pesanan</b></td>
                                    </tr>
									<tr class="">
                                        <th width="2%">&nbsp;</th>
                                        <td width="20%"scope="row"><b>Nomor Pesanan</b></td>
                                        <td width="1%">:</td>
										<td width="78%"><b><?= $data['id_pesanan'];?></b></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">&nbsp;</th>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td><?= $data['tgl_pesanan'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">&nbsp;</th>
                                        <td>Penerima</td>
                                        <td>:</td>
                                        <td><?= $data['penerima'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">&nbsp;</th>
                                        <td>Alamat Penerima</td>
                                        <td>:</td>
                                        <td><?= $data['alamat_penerima'];?></td>
                                    </tr>
                                </tbody>
                            </table>
							<div class="table-responsive">	
								<table class="table">
                                <tbody>
									<tr class="bg-green">
										<th>&nbsp;</th>
                                        <th colspan="4">List Produk</th>
                                    </tr>
                                    <tr>
                                        <th width="2%">No</th>
                                        <th width="40%">Nama produk</th>
										<th width="18">Harga satuan</th>
                                        <th width="10%">Jumlah</th>
                                        <th width="30%">Subtotal</th>
                                    </tr>
									<?php 
									if(count($data_detail)){
										$no = 1;
										foreach($data_detail as $data_dtl){									
										?>
										<tr>
											<th scope="row"><?= $no ;?></th>
											<td><?= $data_dtl['nama_produk']; ?></td>
											<td><?= $data_dtl['harga_produk']; ?></td>
											<td><?= $data_dtl['jumlah'];?></td>
											<th>Rp. <?= $data_dtl['subtotal'];?></th>
										</tr>
										<?php 
											$no++;
										}
										?>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>Biaya kirim</td>
											<th>Rp. <?= $data['biaya'];?></th>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<th scope="row"><h3>Total</h3></th>
											<td><h3><span class="label label-info">Rp. <?= $data['total_harga'];?> </span></h3></td>
										</tr>
										<?php
									}else{
										echo "<tr>
													<td colspan='4'>Belum ada barang</td>
												 </tr>";
									}
									?>
									
                                </tbody>
                            </table>
                        </div>
						<?php 
						if(count($data_pembayaran) > 0 && $data['status'] != "draft"){
						?>
						<table class="table">
                                <tbody>
									<tr class="bg-teal">
										<th>&nbsp;</th>
                                        <th scope="row" colspan="3">Data Pembayaran</th>
                                    </tr>
                                    <tr>
                                        <th width="4%">&nbsp;</th>
                                        <th width="20%" scope="row"><b>ID Pembayaran</b></th>
                                        <td width="1%">:</td>
										<td width="80%"><b><?= $data_pembayaran['id_pembayaran'];?></b></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">&nbsp;</th>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td><?= $data_pembayaran['tgl_bayar'];?></td>
                                    </tr>
									<tr>
                                        <th scope="row">&nbsp;</th>
                                        <td>Total Bayar</td>
                                        <td>:</td>
                                        <td>Rp. <?= $data_pembayaran['jumlah_bayar'];?></td>
                                    </tr>
							</tbody>
						</table>
						<?php
						} //tutup if tampil data pembayaran
						if($data['status']=="confirm"){
						?>	
						<ol class="breadcrumb breadcrumb-bg-orange">
                                <li><a href="javascript:void(0);">Pengirirman</a></li>
                                <li class="active">Tambahkan Kurir</li>
                            </ol>
						<br>
						<form action="<?= site_url();?>/pemesanan/add_pengirim" method="post">
							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-1  form-control-label">
									<label for="SD">Kurir  :</label>
								</div>
								<div class="col-lg-5 col-md-4 col-sm-4 col-xs-6">
									<div class="form-line">
										<input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan'];?>">
										<input type="hidden" name="id_pengiriman" value="<?=$kode_pengiriman;?>">
										<select name="id_kurir" class="form-control" <?php ($data['status']!='confirm') ? "disabled" : ""?>>
											<option value="">-- Pilih kurir --</option>
											<?php
											if(count($list_kurir) > 1){
												foreach($list_kurir as $row){
													if($data['id_kurir']==$row['id_kurir']){
														echo "<option selected value='".$row['id_kurir']."'>".$row['nama_kurir']."</option>";
													}else{
												?>
												
												<option value="<?=$row['id_kurir']?>"><?=$row['nama_kurir']?></option>
												<?php
													}
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
										<input type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="SAVE">
								</div>
								
							</div>
						</form>
						<div class="row clearfix"><br></div>
						<div class="row clearfix"><hr></div>
						<?php
						}else if($data['status']!="draft"){
						?>
						<table class="table">
                                <tbody>
									<tr class="bg-teal">
										<th>&nbsp;</th>
                                        <th scope="row" colspan="3">Data Pengiriman</th>
                                    </tr>
                                    <tr>
                                        <th width="4%">&nbsp;</th>
                                        <th width="20%" scope="row"><b>ID Kurir</b></th>
                                        <td width="1%">:</td>
										<td width="80%"><b><?= $data['id_kurir'];?></b></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">&nbsp;</th>
                                        <td>Nama Kurir</td>
                                        <td>:</td>
                                        <td><?= $data['nama_kurir'];?></td>
                                    </tr>
									<tr>
                                        <th scope="row">&nbsp;</th>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><?php
											if($data['status'] == 'on_process'){
												$style = "label label-info";
											}else if($data['status'] == 'delivered'){
												$style = "label label-success";
											}else if($data['status'] == 'cancel'){
												$style = "label label-danger";
											}
											?>	
											<span class="<?= $style;?>"><?= $data['status']?></span>
										</td>
                                    </tr>
							</tbody>
						</table>
						<?php
						}
						?>												
						<div class="row clearfix">
						<div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-4 col-xs-offset-5">
							<?php
							if($data['status']=="draft"){
							?>
								<a href="<?=site_url()?>/pemesanan/confirm_pesanan/<?= $data['id_pesanan'];?>"><button type="button" class="btn btn-lg btn-warning m-t-15 waves-effect">Confirm</button></a>
								&nbsp;&nbsp;
								<a href="<?=site_url()?>/pemesanan/cancel_pesanan/<?= $data['id_pesanan'];?>"><button type="button" class="btn btn-lg btn-danger m-t-15 waves-effect">Cancel Pesanan</button></a>
								&nbsp;&nbsp;
							<?php
							}else if($data['status']=="on_process"){
							?>
								<a href="<?=site_url()?>/pemesanan/delivered_pesanan/<?= $data['id_pesanan'];?>"><button type="button" class="btn btn-lg btn-success m-t-15 waves-effect">Delivered</button></a>
								&nbsp;&nbsp;
							<?php
							}
							?>
							<a href="<?=site_url()?>/pemesanan/v_pemesanan"><button type="button" class="btn btn-lg btn-default m-t-15 waves-effect">Close</button></a>
						</div>
							</div>
                    </div>
            </div>
			</div>
</div>