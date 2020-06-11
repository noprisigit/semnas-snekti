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
         <div class="col-md-5">
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
      <div id="loader" style="display: none;">
         <img src="<?= base_url('assets/images/waiting.gif') ?>" class="d-flex mx-auto" width="200">
      </div>
      <div id="data-peserta-not-found" class="row mt-3 justify-content-center" style="display: none;">
         <h3 class="text-center">Data Tidak Ditemukan <br /> Harap periksa kembali nama dan asal instansi yang dimasukkan</h3>
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
   </div>
</div>