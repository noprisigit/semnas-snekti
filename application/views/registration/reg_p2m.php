<!--Start breadcrumbs Area-->
<section class="breadcrumbs" style="padding: 50px;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Registrasi Pemakalah P2M</h2>
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
            <div id="pemakalah" class="pemakalah" data-pemakalah="<?= $this->session->flashdata('msg_pemakalah'); ?>"></div>
        </div>
        <?= form_open_multipart('registration/reg_p2m'); ?>
        <!-- <form action="<?= base_url('registration/pemakalah'); ?>" method="post"> -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="JudulTim">Judul Makalah</label>
                        <input type="text" class="form-control" name="judultim" id="judultim" placeholder="Judul">
                        <?php echo form_error('judultim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="namaPenulis">Nama Penulis (First Author)</label>
                        <input type="text" class="form-control" id="namapenulis" name="namapenulis" placeholder="Nama Penulis">
                        <?php echo form_error('namapenulis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="subTema">Kategori PKM</label>
                        <select class="form-control" id="subtema" name="subtema">
                            <option value="" selected disabled>--Pilih--</option>
                            <option value="RenewableEnergy">Program Kemitraan Masyarakat</option>
                            <option value="SmartEnergy">Program Kemitraan Masyarakat Stimulus</option>
                            <option value="CleanEnergy">Program Kuliah Kerja Nyata Pembelajaran dan Pemberdayaan Masyarakat (KKN-PPM)</option>
                            <option value="Kontrol dan TI">Program Pengembangan Kewirausahaan</option>
                            <option value="Smart Building">Program Pengembangan Kewirausahaan</option>
                            <option value="Infrastruktur Energi">Program Pengembangan Produk Unggulan Daerah</option>
                            <option value="Material Kontruksi">Program Pengembangan Usaha Produk Intelektual Kampus</option>
                            <option value="Rekayasa Infrastruktur">Rekayasa Infrastruktur</option>
                            <option value="Pembangkit Mikro">Pembangkit Mikro</option>
                            <option value="Konversi Energi">Konversi Energi</option>
                            <option value="Power Plant">Power Plant</option>
                            <option value="Internet of Things">Internet of Things</option>
                            <option value="Artificial Inteligent">Artificial Inteligent</option>
                            <option value="DataScience">Data Science</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Audit energy">Audit energy</option>
                            <option value="Manajemen Energi">Manajemen Energi</option>
                            <option value="Sistem Transformator">Sistem Transformator</option>
                            <option value="Bahan Teknik Pembangkit Listrik">Bahan Teknik Pembangkit Listrik</option>
                            <option value="Ilmu Terapan Pemodelan Matematika">Ilmu Terapan Pemodelan Matematika</option>
                            <option value="Rekayasa Sumber Daya Air">Rekayasa Sumber Daya Air</option>
                            <option value="Manajemen Pembangkit Listrik">Manajemen Pembangkit Listrik</option>
                            <option value="Informatic">Informatic</option>
                            <option value="Data Mining">Data Mining</option>
                        </select>
                        <?php echo form_error('subtema', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="institusi">Institusi</label>
                        <input type="text" class="form-control" id="institusi" name="institusi" placeholder="Institusi">
                        <?php echo form_error('institusi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="Status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="" selected disabled>--Pilih--</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Umum">Umum</option>
                        </select>
                        <?php echo form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="Email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="NoTelp">No. Telp/HP</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No. Telp/HP">
                        <?php echo form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                        <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="Upload File">Upload Makalah</label>
                        <input type="file" class="form-control form-control-file" id="uploadfile" name="uploadfile">
                        <?php echo form_error('uploadfile', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="contact-frm-btn">
                        <button type="submit" name="submit" id="btn-registration" class="mr_btn_fill">Submit</button>
                    </div>
                </div>
            </div>   
        </form>
    </div>   
</div>