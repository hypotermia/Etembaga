{_header_}

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait ...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">E-Tembaga</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->

                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url()?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama_admin'); ?></div>
                    <div class="email"><?= $this->session->userdata('email_admin'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?=site_url()?>/login/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">                    
                    <li <?= ($this->uri->segment(1)=='' || $this->uri->segment(1)=='login') ? 'class="active"' : '';?>>
                        <a href="<?= site_url(); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					<li <?= ($this->uri->segment(1)=='pemasukan_barang') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/pemasukan_barang/v_pemasukan_barang">
                            <i class="material-icons">assignment_returned</i>
                            <span>Pemasukan Barang</span>
                        </a>
                    </li>
<!--
                    <li <?= ($this->uri->segment(1)=='kategori') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/kategori/v_kategori">
                            <i class="material-icons">apps</i>
                            <span>Kategori</span>
                        </a>
                    </li>
-->
<!--
					<li <?= ($this->uri->segment(1)=='kurir') ? 'class="active"' : '';?>>
                        <a  href="<?=site_url()?>/kurir/v_kurir">
                            <i class="material-icons">directions_run</i>
                            <span>Kurir</span>
                        </a>
                    </li>
-->
<!--
					<li <?= ($this->uri->segment(1)=='ongkir') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/ongkir/v_ongkir">
                            <i class="material-icons">monetization_on</i>
                            <span>Biaya Kirim</span>
                        </a>
                    </li>
-->
<!--
					<li <?= ($this->uri->segment(1)=='produk') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/produk/v_produk">
                            <i class="material-icons">assignment</i>
                            <span>Produk</span>
                        </a>
                    </li>
-->
<!--
					<li <?= ($this->uri->segment(1)=='admin') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/admin/v_admin">
                            <i class="material-icons">account_circle</i>
                            <span>Admin</span>
                        </a>
                    </li>
-->
					<!--
					<li <?= ($this->uri->segment(1)=='pelanggan') ? 'class="active"' : '';?>>
                        <a href="<?=site_url();?>/pelanggan/v_pelanggan">
                            <i class="material-icons">group</i>
                            <span>Pelanggan</span>
                        </a>
                    </li>
-->
					<?php
					if($this->session->userdata('ROLE') == 'admin'){
					?>
					<li <?= ($this->uri->segment(1)=='pembayaran') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/pembayaran/v_pembayaran">
                            <i class="material-icons">monetization_on</i>
                            <span>Pembayaran</span>
                        </a>
                    </li>
                    <li <?= ($this->uri->segment(1)=='pemesanan') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/pemesanan/v_pemesanan">
                            <i class="material-icons">shopping_cart</i>
                            <span>Pemesanan</span>
                        </a>
                    </li>
					<li <?= ($this->uri->segment(1)=='pengiriman') ? 'class="active"' : '';?>>
                        <a href="<?=site_url()?>/pengiriman/v_pengiriman">
                            <i class="material-icons">local_shipping</i>
                            <span>Pengiriman</span>
                        </a>
                    </li>
					<?php
					}
					?>
					<li <?= ($this->uri->segment(1)=='kategori' || $this->uri->segment(1)=='produk' || $this->uri->segment(1)=='ongkir') ? 'class="active"' : '';?>>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">
                            <i class="material-icons">assignment</i>
                            <span>Master</span>
                        </a>
                        <ul class="ml-menu" style="display: block;">
                            <li>
								<a href="<?=site_url()?>/kategori/v_kategori" class=" waves-effect waves-block">
									<span>Master Kategori Produk</span>
								</a>
							</li>
							<li>
								<a href="<?=site_url()?>/produk/v_produk" class=" waves-effect waves-block">
									<span>Master Produk</span>
								</a>
							</li>
							<li>
                                <a href="<?=site_url()?>/ongkir/v_ongkir" class=" waves-effect waves-block">
									<span>Master Biaya Kirim</span>
								</a>
                            </li>
                        </ul>
                    </li>
					<li <?= ($this->uri->segment(1)=='kurir' || $this->uri->segment(1)=='pelanggan' || $this->uri->segment(1)=='admin') ? 'class="active"' : '';?>>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">
                            <i class="material-icons">group</i>
                            <span>User</span>
                        </a>
                        <ul class="ml-menu" style="display: block;">
                            <li>
								<a  href="<?=site_url()?>/kurir/v_kurir">
									<span>Kurir</span>
								</a>
							</li>
							<li>
								<a href="<?=site_url();?>/pelanggan/v_pelanggan">
									<span>Pelanggan</span>
								</a>
							</li>
							<?php
							if($this->session->userdata('ROLE') == 'pemilik'){
							?>
							<li>
                                <a href="<?=site_url()?>/admin/v_admin">
									<span>Admin</span>
								</a>
                            </li>
							<?php
							}
							?>
                        </ul>
                    </li>
					<?php
					if($this->session->userdata('ROLE') == 'pemilik'){
					?>
					<li <?= ($this->uri->segment(1)=='report') ? 'class="active"' : '';?>>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">
                            <i class="material-icons">assessment</i>
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu" style="display: block;">
                            <li>
                                <a href="<?=site_url();?>/report/pemasukan" class=" waves-effect waves-block">
                                    <span>Laporan Pemasukan Barang</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=site_url();?>/report/transaksi" class=" waves-effect waves-block">
                                    <span>Laporan Transaksi/Penjualan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
					<?php
					}
					?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">E-Tembaga</a>.
                </div>
                <div class="version">
                    <b>By: </b> Masboy
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        {_content_}
    </section>

{_footer_}


</body>
</html>