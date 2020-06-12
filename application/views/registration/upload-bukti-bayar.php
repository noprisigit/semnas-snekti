<section class="breadcrumbs" style="padding: 40px;">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-12 text-center">
            <h2>Upload Bukti Bayar Seminar Nasional</h2>
         </div>
      </div>
   </div>
</section>
<div class="contact-wrap" style="padding-top: 60px; padding-bottom: 10px">
   <div class="container">
      <div class="row justify-content-center">
         <div id="semnas" data-semnas="<?= $this->session->flashdata('msg_semnas'); ?>"></div>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="form-group">
               <label for="">Pilih Bidang</label>
               <select id="selectBidang" class="form-control">
                  <option value="" selected disabled>- Pilih bidang yang diikuti -</option>
                  <option value="Semnas">Seminar Nasional</option>
                  <option value="Pemakalah">Pemakalah</option>
                  <option value="Pemakalah P2M">Pemakalah P2M</option>
               </select>
            </div>
         </div>
      </div>
      <div class="row justify-content-center" id="rowUploadBuktiBayarSemnas" style="display: none">
         <div class="col-md-8">
            <form id="frmCariDataPesertaSemnas" method="post">
               <div class="form-group">
                  <label style="font-size: 15px; font-weight: 400" for="NamaLengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" name="inputNamaLengkap" id="inputNamaLengkap" placeholder="Nama Lengkap">
                  <div id="listParticipants"></div>
               </div>
               <div class="form-group">
                  <label style="font-size: 15px; font-weight: 400" for="AsalInstansi">Asal Instansi</label>
                  <input type="text" class="form-control" id="inputAsalInstansi" name="inputAsalInstansi" placeholder="Asal Instansi" readonly>
               </div>
               <div class="contact-frm-btn">
                  <button type="button" id="btn-registration" class="btnCariData mr_btn_fill">Cari Data</button>
               </div>
            </form>
         </div>
      </div>   
      <div class="row justify-content-center" id="rowUploadBuktiBayarPemakalah" style="display: none">
         <div class="col-md-8">
            <form id="frmCariDataPemakalah" method="post">
               <div class="form-group">
                  <label for="">Judul Makalah</label>
                  <textarea name="inputJudulMakalah" id="inputJudulMakalah" class="form-control" cols="60" rows="3"></textarea>
                  <!-- <input type="text" class="form-control" name="inputJudulMakalah" id="inputJudulMakalah" placeholder="Judul Makalah"> -->
                  <div id="listJudulMakalah"></div>
               </div>
               <div class="contact-frm-btn">
                  <button type="button" style="width: 60%; margin: 10px 20% 0 20%"  class="btnCariDataPemakalah mr_btn_fill">Cari Data</button>
               </div>
            </form>
         </div>
      </div>
      <div class="row justify-content-center" id="rowUploadBuktiBayarPemakalahP2M" style="display: none">
         <div class="col-md-8">
            <form id="frmCariDataPemakalahP2M" method="post">
               <div class="form-group">
                  <label for="">Judul Makalah PkM</label>
                  <textarea name="inputJudulMakalahPkM" class="form-control" id="inputJudulMakalahPkM" cols="30" rows="3"></textarea>
                  <div id="listJudulMakalahPkM"></div>
               </div>
               <div class="contact-frm-btn">
                  <button type="button" style="width: 60%; margin: 10px 20% 0 20%"  class="btnCariDataPemakalahPkM mr_btn_fill">Cari Data</button>
               </div>
            </form>
         </div>
      </div>
      <div id="loader" style="display: none;">
         <img src="<?= base_url('assets/images/waiting.gif') ?>" class="d-flex mx-auto" width="200">
      </div>
      <div id="data-peserta-not-found" class="row mt-3 justify-content-center" style="display: none;">
         <h3 class="text-center">Data Tidak Ditemukan <br /> Harap periksa kembali nama dan asal instansi yang dimasukkan</h3>
      </div>
      <div id="data-pemakalah-not-found" class="row mt-3 justify-content-center" style="display: none;">
         <h3 class="text-center">Data Tidak Ditemukan <br /> Harap periksa kembali judul makalah yang dimasukkan</h3>
      </div>
      <div id="data-peserta" class="row mt-3" style="display: none">
         <div class="col-md-6">
            <div id="data-peserta-semnas">
               <h3 class="mb-2 text-center">Data Peserta Seminar Nasional</h3>
               <table class="table table-bordered" width="100%">
                  <tr>
                     <td>Kode Peserta</td>
                     <td id="tbKodePeserta">Kode Peserta</td>
                  </tr>
                  <tr>
                     <td>Nama</td>
                     <td id="tbNamaLengkap">: Sigit Prasetyo Noprianto</td>
                  </tr>
                  <tr>
                     <td>Asal Instansi</td>
                     <td id="tbAsalInstansi">: Institut Teknologi PLN</td>
                  </tr>
                  <tr>
                     <td>Jenis Kelamin</td>
                     <td id="tbJenisKelamin">: Laki-Laki</td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td id="tbEmail">: noprisigit@gmail.com</td>
                  </tr>
                  <tr>
                     <td>No. Handphone</td>
                     <td id="tbHandphone">: 081278054225</td>
                  </tr>
                  <tr>
                     <td>Status Pembayaran</td>
                     <td id="tbStatusPembayaran">: 081278054225</td>
                  </tr>
               </table>
            </div>
         </div>
         <div id="panelUploadBuktiBayar" class="col-md-6" style="display: none;">
            <h3 class="mb-2">Upload Bukti Bayar</h3>
            <form id="frmUploadBuktiBayar" method="post">
               <input type="hidden" name="inputKode" id="inputKode">
               <div class="form-group">
                  <input type="file" name="inputBuktiBayar" id="inputBuktiBayar" class="form-control" accept="image/png, image/jpeg, image/jpg">
               </div>
               <button type="submit" class="btn btn-primary" id="btnUploadBuktiBayar">Upload Bukti</button>
               <div id="submitLoader" style="display: none;">
                  <img src="<?= base_url('assets/images/waiting.gif') ?>" class="" width="120">
               </div>
            </form>
         </div>
      </div>
      <div id="data-pemakalah" class="row mt-3" style="display: none;">
         <div class="col-md-8">
            <div id="data-peserta-pemakalah">
               <h3 class="mb-2">Data Peserta Pemakalah</h3>
               <table class="table" width="100%">
                  <tr>
                     <td width="30%">Judul Makalah</td>
                     <td id="tbJudulMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Penulis</td>
                     <td id="tbPenulisMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Sub Tema</td>
                     <td id="tbSubTemaMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Institusi</td>
                     <td id="tbInstitusiMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Status</td>
                     <td id="tbStatusMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td id="tbEmailMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>No. Telp/HP</td>
                     <td id="tbTelpMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Alamat</td>
                     <td id="tbAlamatMakalah">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Status Pembayaran</td>
                     <td id="tbStatusPembayaranMakalah">: Loading...</td>
                  </tr>
               </table>
            </div>
         </div>
         <div id="panelUploadBuktiBayarMakalah" class="col-md-4" style="display: none;">
            <h3 class="mb-2">Upload Bukti Bayar</h3>
            <form id="frmUploadBuktiBayarMakalah" method="post">
               <input type="hidden" name="inputKodeMakalah" id="inputKodeMakalah">
               <div class="form-group">
                  <input type="file" name="inputBuktiBayarMakalah" id="inputBuktiBayarMakalah" class="form-control" accept="image/png, image/jpeg, image/jpg">
               </div>
               <button type="submit" class="btn btn-primary" id="btnUploadBuktiBayarMakalah">Unggah Bukti</button>
               <div id="submitLoader" style="display: none;">
                  <img src="<?= base_url('assets/images/waiting.gif') ?>" class="" width="120">
               </div>
            </form>
         </div>
      </div>

      <div id="data-pemakalah-p2m" class="row mt-3" style="display: none;">
         <div class="col-md-8">
            <div id="data-peserta-pemakalah">
               <h3 class="mb-2">Data Pemakalah PkM</h3>
               <table class="table" width="100%">
                  <tr>
                     <td width="30%">Judul Makalah</td>
                     <td id="tbJudulMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Penulis</td>
                     <td id="tbPenulisMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Kategori</td>
                     <td id="tbKategoriMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Metode Pelaksanaan</td>
                     <td id="tbMetodeMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Institusi</td>
                     <td id="tbInstitusiMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Status</td>
                     <td id="tbStatusMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td id="tbEmailMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>No. Telp/HP</td>
                     <td id="tbTelpMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Alamat</td>
                     <td id="tbAlamatMakalahPkM">: Loading...</td>
                  </tr>
                  <tr>
                     <td>Status Pembayaran</td>
                     <td id="tbStatusPembayaranMakalahPkM">: Loading...</td>
                  </tr>
               </table>
            </div>
         </div>
         <div id="panelUploadBuktiBayarMakalahP2M" class="col-md-4" style="display: none;">
            <h3 class="mb-2">Upload Bukti Bayar</h3>
            <form id="frmUploadBuktiBayarMakalahP2M" method="post">
               <input type="hidden" name="inputKodeMakalahP2M" id="inputKodeMakalahP2M">
               <div class="form-group">
                  <input type="file" name="inputBuktiBayarMakalahP2M" id="inputBuktiBayarMakalahP2M" class="form-control" accept="image/png, image/jpeg, image/jpg">
               </div>
               <button type="submit" class="btn btn-primary" id="btnUploadBuktiBayarMakalahP2M">Unggah Bukti</button>
               <div id="submitLoader" style="display: none;">
                  <img src="<?= base_url('assets/images/waiting.gif') ?>" class="" width="120">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>