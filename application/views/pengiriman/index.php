<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Pengiriman
                            </h2>
                            
                        </div>
                        <div class="body">
							<?php 
							if(isset($status) && $status == 'success'){ 
								echo '<script type="text/javascript">
								setTimeout(function () { 
								swal({
								title: "SUCCESS!",
								text: "Data Berhasil Disimpan!",
								type: "success",
								confirmButtonText: "OK"
								},
								function(isConfirm){
								if (isConfirm) {
								window.location.href = "v_pengiriman";';
								echo '}});';
								echo '}, 1000);</script>';
							}else if(isset($status) && $status == 'error'){
								echo '<script type="text/javascript">
								setTimeout(function () { 
								swal({
								title: "FAILED!",
								text: "Data Gagal Disimpan!",
								type: "error",
								confirmButtonText: "OK"
								},
								function(isConfirm){
								if (isConfirm) {
								window.location.href = "v_pengiriman";';
								echo '}});';
								echo '}, 1000);</script>';
							}
                        	?>
<!--
							<p><a href="<?= site_url()?>/kategori/add_kategori"><button type="button" class="btn btn-success waves-effect">
                                    <i class="material-icons">add_box</i>
                                    <span>Tambah Data</span>
							</button></a></p>
-->
                            <div class="table-responsive">								
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
											<th>No</th>
                                            <th>ID Pengiriman</th>
											<th>ID Pemesanan</th>
											<th>Kurir</th>
											<th>Penerima</th>
                                            <th>Alamat Penerima</th>
											<th>status</th>
											<th>&nbsp;</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
										<?php
										$no=1;
										foreach($data->result_array() as $value){
											
										?>
                                        <tr>
											<td><?=$no;?></td>
                                            <td><?= $value['id_pengiriman']?></td>
											<td><?= $value['id_pesanan']?></td>
											<td><?= $value['nama_kurir'];?></td>
											<td><?= $value['penerima']?></td>
											<td><?= $value['alamat_penerima']?></td>
											<td>
											<?php
											if($value['status'] == 'on_process'){
												$style = "label label-info";
											}else if($value['status'] == 'delivered'){
												$style = "label label-success";
											}else if($value['status'] == 'cancel'){
												$style = "label label-danger";
											}
											?>	
											<span class="<?= $style;?>"><?= $value['status']?></span>
											</td>
                                            <td>													
												<a href="<?= site_url()?>/pemesanan/preview_pesanan/<?= $value['id_pesanan']?>"><button type="button" class="btn btn-success waves-effect">Liat Detail</button></a>
											</td>
                                        </tr>
										<?php
											$no++;
										} //tutup foreach
								  		?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
</div>
<!-- Alert Confirm Delete -->
<?php
echo '<script type="text/javascript">
		function confirmDel(a){
			swal({
			  title: "HAPUS!",
			  text: "Apakah anda yakin ingin menghapus data ini?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Ya!",
			  cancelButtonText: "Tidak!",
			  confirmButtonClass: "btn-danger",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm) {
			if (isConfirm) {
			swal("HAPUS!", "Data berhasil terhapus!", "success");';
	echo 'window.location.href = "delete_pengiriman" + "/" + a;';
	echo '} else {
		swal("BATAL", "Hapus data batalkan!", "error");';
	echo'}
		});
		}
		</script>';
?>
