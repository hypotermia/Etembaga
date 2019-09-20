<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW PRODUCT</div>
                            <div class="number count-to" data-from="0" data-to="<?= $jumlah_produk;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW ORDER</div>
                            <div class="number count-to" data-from="0" data-to="<?= $jumlah_new_order;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_shipping</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW SHIPPING</div>
                            <div class="number count-to" data-from="0" data-to="<?= $jumlah_new_shipping;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW CUSTOMER</div>
                            <div class="number count-to" data-from="0" data-to="<?= $jumlah_new_customer;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>TASK INFO PENGIRIMAN</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Pengiriman</th>
                                            <th>ID Pesanan</th>
                                            <th>Kurir</th>
                                            <th>Penerima</th>
											<th>Alamat Penerima</th>
											<th>Status</th>
											<th>Progres</th>
                                        </tr>
                                    </thead>	
                                    <tbody>
										<?php
											if(count($list_shipping) > 0){
												$no = 1;
												foreach($list_shipping as $row){
										?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= $row['id_pengiriman']; ?></td>
												<td><?= $row['id_pesanan']; ?></td>
												<td><?= $row['nama_kurir']; ?></td>
												<td><?= $row['penerima']; ?></td>
												<td><?= $row['alamat_penerima']; ?></td>
												<td>
												<?php
												if($row['status'] == 'on_process'){
													$style = "label bg-indigo";
												}else if($row['status'] == 'delivered'){
													$style = "label label-success";
												}else if($row['status'] == 'cancel'){
													$style = "label label-danger";
												}
												?>	
												<span class="<?= $style;?>"><?= $row['status']?></span>
												</td>
												<td>
													<div class="progress">
														<div class="progress-bar bg-orange" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
													</div>
												</td>
											</tr>
										<?php
												$no++;
												}
											}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
			<div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>TASK INFO PEMESANAN BARU</h2>
                        </div>
                        <div class="body">                            
							<div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Pesanan</th>
                                            <th>Penerima</th>
											<th>Alamat Penerima</th>
											<th>Total pesanan</th>
											<th>Status</th>
											<th>Progres</th>
                                        </tr>
                                    </thead>	
                                    <tbody>
										<?php
											if(count($list_pesanan) > 0){
												$no = 1;
												foreach($list_pesanan as $row){
										?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= $row['id_pesanan']; ?></td>
												<td><?= $row['penerima']; ?></td>
												<td><?= $row['alamat_penerima']; ?></td>
												<td><?= $row['total_harga']; ?></td>
												<td>
												<?php
												if($row['status'] == 'on_process'){
													$style = "label bg-indigo";
												}else if($row['status'] == 'delivered'){
													$style = "label label-success";
												}else if($row['status'] == 'cancel'){
													$style = "label label-danger";
												}
												?>	
												<span class="<?= $style;?>"><?= $row['status']?></span>
												</td>
												<td>
													<div class="progress">
														<div class="progress-bar bg-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
													</div>
												</td>
											</tr>
										<?php
												$no++;
												}
											}else{
												echo "<tr>
												<td colspan='7'>Belum Ada Pesanan</td>
												</tr>";
											}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>