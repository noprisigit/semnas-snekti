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
        <div class="flash-message" data-title="Materi Semnas" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                + Upload Materi
            </button>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-tables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembicara</th>
                                        <th>Judul Materi</th>
                                        <th>Nama File Materi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($data_materi as $row) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['nama_pemateri']; ?></td>
                                        <td><?= $row['judul_materi']; ?></td>
                                        <td><?= $row['nama_file']; ?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-success editmateri" data-toggle="modal" data-target="#modal-edit" data-toggle="tooltip" data-placement="top" title="Edit" data-materiid="<?= $row['id']; ?>" data-pemateri="<?= $row['nama_pemateri']; ?>" data-judul="<?= $row['judul_materi']; ?>" data-file="<?= $row['nama_file']; ?>"><i class="fas fa-edit"></i></button>
                                                    <a href="<?= base_url('admin/deletemateri/') . $row['id']; ?>" class="btn btn-danger deletemateri" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembicara</th>
                                        <th>Judul Materi</th>
                                        <th>Nama File Materi</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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

<!-- Modal Upload Materi Pembicara -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Materi Pembicara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <div class="row">
                    <div class="col">
                        <?php echo form_open_multipart('admin/materi');?>
                        <form method="post" action="<?= base_url('admin/materi'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pembicara</label>
                                <input type="text" class="form-control" id="nama_pembicara" name="nama_pembicara" placeholder="Nama Pembicara">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Judul Materi</label>
                                <input type="text" class="form-control" id="judul_materi" name="judul_materi" placeholder="Judul Materi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upload Materi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="nama_file" name="nama_file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Upload Materi Pembicara -->

<!-- Modal Edit Upload Materi Pembicara -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Materi Pembicara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <div class="row">
                    <div class="col">
                        <?php echo form_open_multipart('admin/editmateri');?>
                        <form method="post" action="<?= base_url('admin/editmateri'); ?>">
                            <input type="hidden" id="edit_id" name="materiid">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pembicara</label>
                                <input type="text" class="form-control" id="edit_nama_pembicara" name="nama_pembicara" placeholder="Nama Pembicara">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Judul Materi</label>
                                <input type="text" class="form-control" id="edit_judul_materi" name="judul_materi" placeholder="Judul Materi">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama File Lama</label>
                                        <input type="text" class="form-control" id="edit_nama_file_lama" name="nama_file_lama" placeholder="Judul Materi" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload Materi Baru</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="edit_nama_file_baru" name="nama_file_baru">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Edit Upload Materi Pembicara -->

   

