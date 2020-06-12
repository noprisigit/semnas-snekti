<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
					<div class="col-sm-6">
						<h1><?= $c_title; ?></h1>
					</div>
			</div>
		</div>
	</section>
	<div class="row justify-content-center">
		<div class="flash-message" data-title="Data Pemakalah" data-message="<?= $this->session->flashdata('message'); ?>"></div>
	</div>

   <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="data-paper" class="table table-bordered table-striped" width="100%">
									<thead>
										<tr class="text-center">
											<th>No</th>
											<th>Judul Tim</th>
											<th>Penulis</th>
											<th>Sub Tema</th>
											<th>Institusi</th>
											<th>Status Bayar</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach($data_makalah as $row) : ?>
										<tr>
											<td class="text-center"><?= $no; ?></td>
											<td><?= $row['judul_tim']; ?></td>
											<td><?= $row['nama_penulis']; ?></td>
											<td><?= $row['sub_tema']; ?></td>
											<td><?= $row['institusi']; ?></td>
											<?php if($row['bukti_bayar'] == "" or $row['bukti_bayar'] == null) : ?>
												<td class="text-center"><span class="badge badge-danger">Belum Ada Bukti Bayar</span></td>
											<?php else: ?>
												<?php if ($row['status_bayar'] == 0) : ?>
													<td class="text-center"><span class="badge badge-warning">Menunggu Konfirmasi</span></td>
												<?php else : ?>
													<td class="text-center"><span class="badge badge-success">Sukses</span></td>
												<?php endif; ?>
											<?php endif; ?>
											<td class="text-center">
													<span data-toggle="modal" data-target="#modal-detail-paper">
														<button type="button" class="mt-1 btn btn-info btn-detail-paper" data-toggle="tooltip" data-placement="top" title="Detail" data-id="<?= $row['id_pemakalah'] ?>" data-judul="<?= $row['judul_tim']?>" data-penulis="<?= $row['nama_penulis']?>" data-tema="<?= $row['sub_tema']?>" data-institusi="<?= $row['institusi']?>" data-status="<?= $row['status']?>" data-email="<?= $row['email']?>" data-telp="<?= $row['no_telp']?>" data-alamat="<?= $row['alamat']?>" data-status_bayar="<?= $row['status_bayar'] ?>" data-bukti_bayar="<?= $row['bukti_bayar'] ?>"><i class="fas fa-eye"></i></button>
													</span>
													<a href="<?= base_url('admin/downloadmakalah/?file=') . $row['nama_file']; ?>" class="mt-1 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Download"><i class="fas fa-download"></i></a>
													<a href="<?= base_url('admin/deletemakalah/') . $row['id_pemakalah'] ?>" class="mt-1 btn btn-danger btn-delete-pemakalah" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
												
											</td>
										</tr>
										<?php $no++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="modal-detail-paper">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title">Detail Call For Paper</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="card mb-0">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">							
								<table class="table">
									<tr>
										<td class="text-bold" width="25%">Judul Paper</td>
										<td id="detailJudul"></td>
									</tr>
									<tr>
										<td class="text-bold" width="25%">Penulis</td>
										<td id="detailPenulis"></td>
									</tr>
									<tr>
										<td class="text-bold" width="25%">Sub Tema</td>
										<td id="detailTema"></td>
									</tr>
									<tr>
										<td class="text-bold" width="25%">Institusi</td>
										<td id="detailInstitusi"></td>
									</tr>
									<tr>
										<td class="text-bold" width="25%">Email</td>
										<td id="detailEmail"></td>
									</tr>
									
								</table>
							</div>
							<div class="col-md-6">							
								<table class="table">
									<tr>
										<td class="text-bold" width="25%">No. Telp/HP</td>
										<td id="detailTelp"></td>
									</tr>
									<tr>
										<td class="text-bold" width="25%">Status</td>
										<td id="detailStatus"></td>
									</tr>
									<tr>
										<td class="text-bold" width="25%">Alamat</td>
										<td id="detailAlamat"></td>
									</tr>
									<tr>
										<td class="text-bold" width="25%">Status Bayar</td>
										<td id="detailStatusBayar"></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-end">
				<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalBuktiBayarPemakalah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title">Bukti Bayar</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="card mb-0">
					<div class="card-body">
						<img id="imgBuktiBayarPemakalah" src="" class="img-fluid d-flex mx-auto" alt="bukti bayar">
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-end">
				<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
