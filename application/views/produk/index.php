<div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Produk
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
								window.location.href = "v_produk";';
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
								window.location.href = "v_produk";';
								echo '}});';
								echo '}, 1000);</script>';
							}
                        	?>
							<p><a href="<?= site_url()?>/produk/add_produk"><button type="button" class="btn btn-success waves-effect">
                                    <i class="material-icons">add_box</i>
                                    <span>Tambah Data</span>
							</button></a></p>
							<br>
                            <div class="table-responsive">								
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>Foto</th>
											<th>Kode Produk</th>
                                            <th>Nama</th>
                                            <th>Des</th>
                                            <th>Terjual</th>
                                            <th>Size</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
										<?php
										$no=1;
										foreach($data->result_array() as $value){
											
										?>
                                        <tr>
                                        	<td><img src="<?=base_url();?>/uploads/<?=$value['photo'];?>" width="50px" height="50px">
											<td><?=$value['id_produk'];?></td>
                                            <td><?= $value['nama_produk']?></td>
                                            <td><?= $value['des_produk']?></td>
                                            <td><?= $value['terjual']?></td>
                                            <td><?= $value['size']?></td>
                                            <td>													
												<a href="<?= site_url()?>/produk/edit_produk/<?= $value['id_produk']?>"><button type="button" class="btn btn-warning btn-xs waves-effect">
                                    				<i class="material-icons" title="Edit">create</i>
												</button></a>
												<a href="#"><button type="button" class="btn btn-danger btn-xs waves-effect" onclick="confirmDel('<?=$value['id_produk'];?>')">
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
	echo 'window.location.href = "delete_produk" + "/" + a;';
	echo '} else {
		swal("BATAL", "Hapus data batalkan!", "error");';
	echo'}
		});
		}
		</script>';
?>
