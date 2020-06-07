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
    <div class="row justify-content-center">
        <div class="flash-message" data-title="Verifikasi Pembayaran" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-pembayaran-semnas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Instansi</th>
                                            <th>Email</th>
                                            <th>Telp</th>
                                            <th>Status</th>
                                            <th>Bukti Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($data_bayar as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $row['kode'] . " - " . $row['nama_lengkap']; ?></td>
                                            <td><?= $row['asal_instansi']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['no_telp']; ?></td>
                                            <td>
                                                <center>
                                                    <span class="badge bg-danger">Belum Bayar</span>
                                                </center>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($row['bukti_bayar'] != null) : ?>
                                                    <a href="#" id="enlargeImage" data-img="<?= $row['bukti_bayar'] ?>" class="badge badge-success">Lihat Bukti Bayar</a>
                                                <?php else : ?>
                                                    <span class="badge badge-warning">Belum Ada Upload Bukti</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <form action="<?= base_url('admin/verifikasipembayaran'); ?>" method="post">
                                                        <input type="hidden" name="kode" value="<?= $row['kode']; ?>">
                                                        <input type="hidden" name="email" value="<?= $row['email']; ?>">
                                                        <button type="submit" class="btn btn-primary btn-xs">Verifikasi</button>
                                                    </form>
                                                </center>
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
<div class="modal" id="modalEnlargeImage" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bukti Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="imgBuktiBayar" class="img-fluid d-flex mx-auto zoom" width="200" src="" alt="bukti-bayar">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
