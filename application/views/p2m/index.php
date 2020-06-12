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
    <div class="row justify-content-center">
        <div class="flash-message" data-title="Data Pemakalah PkM" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                           <div class="table-responsive">
                              <table id="data-p2m" class="table table-bordered table-striped" width="100%">
                                 <thead>
                                    <tr class="text-center">
                                       <th style="vertical-align: middle;">#</th>
                                       <th style="vertical-align: middle;">Judul Tim</th>
                                       <th style="vertical-align: middle;">Penulis</th>
                                       <th style="vertical-align: middle;">Kategori PkM</th>
                                       <th style="vertical-align: middle;">Metode Pelaksanaan</th>
                                       <th style="vertical-align: middle;">Institusi</th>
                                       <th style="vertical-align: middle;">Status Bayar</th>
                                       <th style="vertical-align: middle;">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($makalah_p2m as $row) : ?>
                                    <tr>
                                       <td class="text-center"><?= $no; ?></td>
                                       <td><?= $row['judul_tim']; ?></td>
                                       <td><?= $row['nama_penulis']; ?></td>
                                       <td><?= $row['kategori']; ?></td>
                                       <td><?= $row['metode_pelaksanaan']; ?></td>
                                       <td><?= $row['institusi']; ?></td>
                                       <?php if ($row['bukti_bayar'] == "") : ?> 
                                          <td class="text-center"><span class="badge badge-danger">Belum Ada Bukti Bayar</span></td>
                                       <?php else : ?>
                                          <?php if ($row['status_bayar'] == 0) : ?>
                                             <td class="text-center"><span class="badge badge-warning">Menunggu Konfirmasi</span></td>
                                          <?php else: ?>
                                             <td class="text-center"><span class="badge badge-success">Sukses</span></td>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                       <td class="text-center">
                                          <button type="button" title="Detail Pemakalah PkM" data-id="<?= $row['id_pemakalah_p2m'] ?>" class="btn btn-primary btnDetailPkM mt-1"><i class="fas fa-book"></i></button>
                                          <a href="<?= base_url('admin/deletePemakalahP2M/') . $row['id_pemakalah_p2m']; ?>" title="Delete Pemakalah PkM" class="btn mt-1 btn-danger btnDeletePkM"><i class="fas fa-trash-alt"></i></a>
                                          <a href="<?= base_url('admin/downloadp2m/?file='). $row['nama_file'] ?>" class="btn btn-info mt-1"><i class="fas fa-download"></i></a>
                                       </td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php endforeach; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modalDetailPkM">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header bg-info">
               <h4 class="modal-title">Detail Pemakalah PkM</h4>
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
                              <td class="text-bold" width="35%">Judul Tim</td>
                              <td id="detJudul">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">Nama Pemakalah</td>
                              <td id="detPenulis">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">Kategori PkM</td>
                              <td id="detKategori">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">Metode Pelaksanaan</td>
                              <td id="detMetodePelaksanaan">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">Status</td>
                              <td id="detStatus">: Loading...</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-6">                        
                        <table class="table">
                           <tr>
                              <td class="text-bold" width="35%">Institusi</td>
                              <td id="detInstitusi">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">Email</td>
                              <td id="detEmail">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">No. Telp/HP</td>
                              <td id="detPhone">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">Alamat</td>
                              <td id="detAlamat">: Loading...</td>
                           </tr>
                           <tr>
                              <td class="text-bold">Status Bayar</td>
                              <td id="detStatusBayar">: Loading...</td>
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
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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