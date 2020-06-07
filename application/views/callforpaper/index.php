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
        <div class="flash-message" data-title="Data Pemakalah" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-paper" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Judul Tim</th>
                                            <th>Penulis</th>
                                            <th>Sub Tema</th>
                                            <th>Institusi</th>
                                            <th>Status</th>
                                            <th>Action</th>
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
                                            <td class="text-center"><?= $row['status']; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <span data-toggle="modal" data-target="#modal-detail-paper">
                                                        <button type="button" class="btn btn-info btn-detail-paper" data-toggle="tooltip" data-placement="top" title="Detail" data-judul="<?= $row['judul_tim']?>" data-penulis="<?= $row['nama_penulis']?>" data-tema="<?= $row['sub_tema']?>" data-institusi="<?= $row['institusi']?>" data-status="<?= $row['status']?>" data-email="<?= $row['email']?>" data-telp="<?= $row['no_telp']?>" data-alamat="<?= $row['alamat']?>"><i class="fas fa-eye"></i></button>
                                                    </span>
                                                    <a href="<?= base_url('admin/downloadmakalah/?file=') . $row['nama_file']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Download"><i class="fas fa-download"></i></a>
                                                    <a href="<?= base_url('admin/deletemakalah/') . $row['id_pemakalah'] ?>" class="btn btn-danger btn-delete-pemakalah" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                </div>
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

<div class="modal fade" id="modal-detail-paper">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Detail Call For Paper</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- <div class="card">
                    <div class="card-body"> -->
                        <table class="table table-bordered">
                            <tr>
                                <td width="25%">Judul Paper</td>
                                <td id="detailJudul"></td>
                            </tr>
                            <tr>
                                <td width="25%">Penulis</td>
                                <td id="detailPenulis"></td>
                            </tr>
                            <tr>
                                <td width="25%">Sub Tema</td>
                                <td id="detailTema"></td>
                            </tr>
                            <tr>
                                <td width="25%">Institusi</td>
                                <td id="detailInstitusi"></td>
                            </tr>
                            <tr>
                                <td width="25%">Status</td>
                                <td id="detailStatus"></td>
                            </tr>
                            <tr>
                                <td width="25%">Email</td>
                                <td id="detailEmail"></td>
                            </tr>
                            <tr>
                                <td width="25%">Alamat</td>
                                <td id="detailAlamat"></td>
                            </tr>
                        </table>
                    <!-- </div>
                </div> -->
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