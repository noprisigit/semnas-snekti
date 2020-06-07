<!--Start breadcrumbs Area-->
<section class="breadcrumbs" style="padding: 50px;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Registrasi Peserta Seminar Nasional</h2>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumbs Area-->

<!--Start Contact Wrap-->
<div class="contact-wrap">
    <!--Start Container-->
    <div class="container">
        <!--Contact Map-->
        <!--Start Row-->
        <div class="row justify-content-center">
            <div id="semnas" data-semnas="<?= $this->session->flashdata('msg_semnas'); ?>"></div>
        </div>
        <form action="<?= base_url('registration/getregist'); ?>" method="post">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="NamaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namalengkap" id="namalengkap" value="<?= set_value('namalengkap') ?>" placeholder="Nama Lengkap">
                        <?php echo form_error('namalengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="AsalInstansi">Asal Instansi</label>
                        <input type="text" class="form-control" id="asalinstansi" name="asalinstansi" value="<?= set_value('asalinstansi') ?>" placeholder="Asal Instansi">
                        <?php echo form_error('asalinstansi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="JenisKelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jeniskelamin" name="jeniskelamin" value="<?= set_value('jeniskelamin') ?>">
                            <option value="" selected disabled>--Jenis Kelamin--</option>
                            <option value="Laki-Laki" <?= set_select('jeniskelamin', 'Laki-Laki', (!empty($jnsKelamin) && $jnsKelamin == "Laki-Laki" ? TRUE : FALSE)); ?>>Laki - Laki</option>
                            <option value="Perempuan" <?= set_select('jeniskelamin', 'Perempuan', (!empty($jnsKelamin) && $jnsKelamin == "Perempuan" ? TRUE : FALSE)); ?>>Perempuan</option>
                        </select>
                        <?php echo form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="Email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Email">
                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="NoTelp">No. Telp/HP</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" value="<?= set_value('notelp') ?>" placeholder="No. Telp/HP">
                        <?php echo form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="contact-frm-btn">
                        <button type="submit" name="submit" id="btn-registration" class="mr_btn_fill">Submit</button>
                    </div>
                </div>
            </div>   
        </form>
    </div>
    <!--End Container-->
</div>
<!--End Contact Wrap-->
