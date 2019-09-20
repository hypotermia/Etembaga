<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Barang Masuk
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
								window.location.href = "v_pemasukan_barang";';
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
								window.location.href = "v_pemasukan_barang";';
								echo '}});';
								echo '}, 1000);</script>';
							}
                        	?>
							<p><a href="<?= site_url()?>/pemasukan_barang/add_pemasukan_barang"><button type="button" class="btn btn-success waves-effect">
                                    <i class="material-icons">add_box</i>
                                    <span>Tambah Data</span>
							</button></a></p>
							<br>
                            <div class="table-responsive">								
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
											<th>No</th>
                                            <th>Nama Barang</th>
											<th>Tanggal Masuk</th>
											<th>Jumlah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
										<?php
										$no=1;
										foreach($data->result_array() as $value){
											
										?>
                                        <tr>
											<td><?=$no;?></td>
                                            <td><?= $value['nama_produk'];?></td>
											<td><?= $value['tgl_masuk']?></td>
											<td><?= $value['jumlah']?></td>
                                            <td>													
												<a href="<?= site_url()?>/pemasukan_barang/edit_pemasukan_barang/<?= $value['id']?>"><button type="button" class="btn btn-warning btn-xs waves-effect">
                                    				<i class="material-icons" title="Edit">create</i>
												</button></a>
<!--
												<a href="#"><button type="button" class="btn btn-danger btn-xs waves-effect" onclick="confirmDel('<?=$value['id'];?>')">
                                    				<i class="material-icons" title="Delete">delete</i>
												</button></a>
-->
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
	echo 'window.location.href = "delete_pemasukan_barang" + "/" + a;';
	echo '} else {
		swal("BATAL", "Hapus data batalkan!", "error");';
	echo'}
		});
		}
		</script>';
?>
