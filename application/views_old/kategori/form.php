<div class="container-fluid">
<!--
            <div class="block-header">
                <h2>
                    Kategori
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tamabah Data Kategori
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="form_advanced_validation" action="<?=$action?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="id_kategori">Kode Kategori</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_kategori" name="data[id_kategori]" class="form-control" placeholder="Ketik kode kategori" value="<?php echo isset($data['id_kategori']) ? $data['id_kategori'] : $kode_kategori; ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama_kategori">Nama Kategori</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_kategori" name="data[nama_kategori]" class="form-control" placeholder="Ketik nama kategori" value="<?php echo isset($data['nama_kategori']) ? $data['nama_kategori'] : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
										<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save">&nbsp;&nbsp;
										<a href="<?=site_url()?>/kategori/v_kategori"><button type="button" class="btn btn-default m-t-15 waves-effect">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>