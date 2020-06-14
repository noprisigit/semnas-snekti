<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $c_title; ?></h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SEMINAR NASIONAL -->
            <div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">SEMINAR NASIONAL</h5>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box">
											<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Jumlah Peserta</span>
													<span class="info-box-number">
														<?= $jumlah_peserta_semnas; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Belum Bayar</span>
													<span class="info-box-number">
														<?= $peserta_belum_bayar; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->

									<!-- fix for small devices only -->
									<div class="clearfix hidden-md-up"></div>

									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Kehadiran</span>
													<span class="info-box-number">
														<?= $kehadiran_peserta_semnas; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Ketidakhadiran</span>
													<span class="info-box-number">
														<?= $ketidakhadiran_peserta_semnas; ?>
														<small>Orang</small>
													</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
									<h5 class="card-title">CALL FOR PAPER</h5>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
							</div>
							<div class="card-body">                           
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box">
											<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

											<div class="info-box-content">
												<span class="info-box-text">Jumlah Judul</span>
												<span class="info-box-number">
													<?= $jumlah_tim ?>
												<small>judul</small>
												</span>
											</div>
										</div>
									</div>

									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Belum Upload Bukti</span>
													<span class="info-box-number">
														<?= $jumlah_belum_upload['jumlah']; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Perlu Konfirmasi</span>
													<span class="info-box-number">
														<?= $jumlah_menunggu_konfirmasi['jumlah']; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Pembayaran Sukses</span>
													<span class="info-box-number">
														<?= $jumlah_sukses['jumlah']; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- fix for small devices only -->
									<div class="clearfix hidden-md-up"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
					<div class="card">
							<div class="card-header">
									<h5 class="card-title">PEMAKALAH PkM</h5>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
							</div>
							<div class="card-body">                           
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box">
											<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

											<div class="info-box-content">
												<span class="info-box-text">Jumlah Judul</span>
												<span class="info-box-number">
													<?= $jumlah_tim_pkm ?>
												<small>judul</small>
												</span>
											</div>
										</div>
									</div>

									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Belum Upload Bukti</span>
													<span class="info-box-number">
														<?= $jumlah_belum_upload_pkm['jumlah']; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- /.col -->
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Perlu Konfirmasi</span>
													<span class="info-box-number">
														<?= $jumlah_menunggu_konfirmasi_pkm['jumlah']; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<div class="col-12 col-sm-12 col-md-12">
										<div class="info-box mb-3">
											<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

											<div class="info-box-content">
													<span class="info-box-text">Pembayaran Sukses</span>
													<span class="info-box-number">
														<?= $jumlah_sukses_pkm['jumlah']; ?>
														<small>Orang</small>
													</span>
											</div>
											<!-- /.info-box-content -->
										</div>
										<!-- /.info-box -->
									</div>
									<!-- fix for small devices only -->
									<div class="clearfix hidden-md-up"></div>
								</div>
							</div>
						</div>
					</div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

        