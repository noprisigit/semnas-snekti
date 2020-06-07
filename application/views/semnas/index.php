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
        <div class="flash-message" data-title="Data Peserta Semnas" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table-semnas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Instansi</th>
                                            <th>Email</th>
                                            <th>Telp</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($data_semnas as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $row['kode'] . " - " . $row['nama_lengkap']; ?></td>
                                            <td><?= $row['asal_instansi']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['no_telp']; ?></td>
                                            <td>
                                                <center>
                                                    <?php if($row['status_bayar'] == "1") : ?>
                                                        <span class="badge bg-success">Sudah Bayar</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-danger">Belum Bayar</span>
                                                    <?php endif; ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="btn btn-primary viewsemnas" data-toggle="modal" data-target="#modal-default" data-toggle="tooltip" data-placement="top" title="View" data-kode="<?= $row['kode']; ?>" data-nmlengkap="<?= $row['nama_lengkap']; ?>" data-jnskelamin="<?= $row['jenis_kelamin']; ?>" data-asalinstansi="<?= $row['asal_instansi'] ?>" data-statusbayar="<?= $row['status_bayar']; ?>" data-email="<?= $row['email']; ?>" data-notelp="<?= $row['no_telp'] ?>"><i class="fas fa-eye"></i></button>
                                                        <button class="btn btn-success editsemnas" data-toggle="modal" data-target="#modal-editsemnas" data-toggle="tooltip" data-placement="top" title="Edit" data-kode="<?= $row['kode']; ?>" data-nmlengkap="<?= $row['nama_lengkap']; ?>" data-jnskelamin="<?= $row['jenis_kelamin']; ?>" data-asalinstansi="<?= $row['asal_instansi'] ?>" data-statusbayar="<?= $row['status_bayar']; ?>" data-email="<?= $row['email']; ?>" data-notelp="<?= $row['no_telp'] ?>"><i class="fas fa-edit"></i></button>
                                                        <a href="<?= base_url('admin/deletesemnas/') . $row['kode']; ?>" class="btn btn-danger deletesemnas" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                                    </div>
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

<!-- Modal View Data Detail Peserta Seminar Nasional -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Peserta Seminar Nasional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Peserta</label>
                            <input type="text" class="form-control view_kode" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" class="form-control view_nmlengkap" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <input type="text" class="form-control view_jnskelamin" readonly>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Bayar</label>
                            <input type="text" class="form-control view_statusbayar" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Asal Instansi</label>
                            <input type="text" class="form-control view_asalinstansi" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control view_email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon</label>
                            <input type="text" class="form-control view_notelp" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal View Data Detail Peserta Seminar Nasional -->

<!-- Modal Edit Data Detail Peserta Seminar Nasional -->
<div class="modal fade" id="modal-editsemnas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Peserta Seminar Nasional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <div class="row">
                    <div class="col-md-12">
                    <form action="<?= base_url('admin/editsemnas'); ?>" method="post">
                        <input type="hidden" class="form-control view_kode" name="kode" readonly>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" class="form-control view_nmlengkap" name="nm_lengkap">
                        </div>
                        
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="view_jnskelamin" name="jns_kelamin">
                                
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <input type="text" class="form-control view_jnskelamin" id="view_jnskelamin" name="jns_kelamin">
                        </div> -->
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Asal Instansi</label>
                            <input type="text" class="form-control view_asalinstansi" name="asal_instansi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control view_email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon</label>
                            <input type="text" class="form-control view_notelp" name="no_telp">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Edit Data Detail Peserta Seminar Nasional -->

        