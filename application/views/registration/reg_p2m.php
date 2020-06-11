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
            <div id="pemakalahp2m" class="pemakalahp2m" data-pemakalahp2m="<?= $this->session->flashdata('msg_pemakalah'); ?>"></div>
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
                        <label style="font-size: 15px; font-weight: 400" for="subTema">Kategori PkM</label>
                        <select class="form-control" id="subtema" name="subtema">
                           <option value="" selected disabled>--Pilih--</option>
                           <option value="Program Kemitraan Masyarakat">Program Kemitraan Masyarakat</option>
                           <option value="Program Kemitraan Masyarakat Stimulus">Program Kemitraan Masyarakat Stimulus</option>
                           <option value="Program Kuliah Kerja Nyata Pembelajaran dan Pemberdayaan Masyarakat (KKN-PPM)">Program Kuliah Kerja Nyata Pembelajaran dan Pemberdayaan Masyarakat (KKN-PPM)</option>
                           <option value="Program Pengembangan Kewirausahaan">Program Pengembangan Kewirausahaan</option>
                           <option value="Program Pengembangan Produk Unggulan Daerah">Program Pengembangan Produk Unggulan Daerah</option>
                           <option value="Program Pengembangan Usaha Produk Intelektual Kampus">Program Pengembangan Usaha Produk Intelektual Kampus</option>
                           <option value="Program Pengembangan Desa Mitra">Program Pengembangan Desa Mitra</option>
                           <option value="Program Kemitraan Wilayah">Program Kemitraan Wilayah</option>
                           <option value="Program Pemberdayaan Masyarakat Unggulan Perguruan Tinggi">Program Pemberdayaan Masyarakat Unggulan Perguruan Tinggi</option>
                           <option value="Program Penerapan IPTEK kepada Masyarakat">Program Penerapan Ipteks kepada Masyarakat</option>
                        </select>
                        <?php echo form_error('subtema', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                     <div class="form-group">
                        <label style="font-size: 15px; font-weight: 400" for="institusi">Metode Pelaksanaan PkM</label>
                        <select class="form-control" name="metode_pelaksanaan" id="metode_pelaksanaan">
                           <option value="" selected disabled>--Pilih--</option>
                           <option value="Pendidikan Masyarakat">Pendidikan Masyarakat</option>
                           <option value="Konsultasi">Konsultasi</option>
                           <option value="Difusi Ipteks">Difusi Ipteks</option>
                           <option value="Pelatihan">Pelatihan</option>
                           <option value="Mediasi">Mediasi</option>
                           <option value="Simulasi Ipteks">Simulasi Ipteks</option>
                           <option value="Substitusi Ipteks">Substitusi Ipteks</option>
                           <option value="Advokasi">Advokasi</option>
                           <option value="Metode lain yang sesuai dengan kegiatan">Metode lain yang sesuai dengan kegiatan</option>
                        </select>
                        <?php echo form_error('metode_pelaksanaan', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        <label for="Upload File">Unggah Makalah (Maskimal 12 MB)</label>
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