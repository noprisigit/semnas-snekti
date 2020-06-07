<!--Start breadcrumbs Area-->
<section class="breadcrumbs" style="padding: 50px;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Materi Pembicara Seminar</h2>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumbs Area-->
<section class="upcomingevent_area pt-3" style="padding-bottom: 0px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="upevent">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Pembicara</th>
                                <th>Judul Materi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($list_materi as $row) : ?>
                            <tr>
                                <th class="text-center"><?= $no; ?></th>
                                <td><?= $row['nama_pemateri']; ?></td>
                                <td><?= $row['judul_materi']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/downloadmateri/?file=') . $row['nama_file']; ?>" class="btn btn-primary btn-sm">Download</a>
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
</section>