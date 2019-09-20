<div class="container-fluid">
<!--
            <div class="block-header">
                <h2>
                    KATEGORI
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
-->
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Ongkir
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
								window.location.href = "v_ongkir";';
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
								window.location.href = "v_ongkir";';
								echo '}});';
								echo '}, 1000);</script>';
							}
                        	?>
							<p><a href="<?= site_url()?>/ongkir/add_ongkir"><button type="button" class="btn btn-success waves-effect">
                                    <i class="material-icons">add_box</i>
                                    <span>Tambah Data</span>
							</button></a></p>
							<br>
                            <div class="table-responsive">								
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
											<th>Kode Ongkir</th>
                                            <th>Kota</th>
                                            <th>Biaya</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
										<?php
										$no=1;
										foreach($data->result_array() as $value){										
										?>
                                        <tr>
											<td><?=$value['id_ongkir'];?></td>
                                            <td><?= $value['kota_kirim']?></td>
                                            <td><?= $value['biaya']?></td>
                                            <td>													
												<a href="<?= site_url()?>/ongkir/edit_ongkir/<?= $value['id_ongkir']?>"><button type="button" class="btn btn-warning btn-xs waves-effect">
                                    				<i class="material-icons" title="Edit">create</i>
												</button></a>
												<a href="#"><button type="button" class="btn btn-danger btn-xs waves-effect" onclick="confirmDel('<?=$value['id_ongkir'];?>')">
                                    				<i class="material-icons" title="Delete">delete</i>
												</button></a>
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
	echo 'window.location.href = "delete_ongkir" + "/" + a;';
	echo '} else {
		swal("BATAL", "Hapus data batalkan!", "error");';
	echo'}
		});
		}
		</script>';
?>
