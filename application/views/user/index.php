<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <div class="row justify-content-center">
        <div class="flash-message" data-title="User" data-message="<?= $this->session->flashdata('message'); ?>"></div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php if(validation_errors()) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</p>
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                + Tambah User
            </button>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-tables">
                                <thead>
                                    <tr class="text-center">
                                        <th width="8px">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($data_users as $row) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['f_name'] . " " . $row['l_name']; ?></td>
                                        <td><?= $row['username']; ?></td>
                                        <td>
                                            <?php if($row['level'] == 1) : ?>
                                                <span class="">
                                                    Root
                                                </span>
                                                <?php elseif($row['level'] == 2) : ?>
                                                <span class="">
                                                    User
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row['is_active'] == 1) : ?>
                                                <center>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="remember" checked="checked">
                                                    <label for="remember">
                                                        Active
                                                    </label>
                                                </div>
                                                </center>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" class="btn btn-success edituser" data-toggle="modal" data-target="#modal-edituser" data-toggle="tooltip" data-placement="top" title="Edit" data-userid="<?= $row['id']; ?>" data-username="<?= $row['username']; ?>" data-fname="<?= $row['f_name']; ?>" data-lname="<?= $row['l_name']; ?>"><i class="fas fa-edit"></i></button>
                                                    <a href="<?= base_url('admin/deleteuser/') . $row['id']; ?>" class="btn btn-danger deleteuser" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
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
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Status</th>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('admin/users'); ?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last Name">
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
<!-- End Modal Tambah User -->

<!-- Modal Edit User -->
<div class="modal fade" id="modal-edituser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('admin/edituser'); ?>" method="post">
                            <input type="hidden" id="edit_userid" name="userid" />   
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" id="edit_username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="Password" data-userid="<?= $row['id']; ?>" data-username="<?= $row['username']; ?>" data-fname="<?= $row['f_name']; ?>" data-lname="<?= $row['l_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="edit_f_name" name="f_name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" id="edit_l_name" name="l_name" placeholder="Last Name">
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
<!-- End Modal Edit User -->