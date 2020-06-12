$(document).ready(function() {

   $('#inputJudulMakalah').keyup(function() {
      var query = $(this).val();
      if (query != "") {
         $.ajax({
            url: "searchJudulMakalah",
            type: "post",
            data: { query: query },
            beforeSend: function() {
               $('#listJudulMakalah').html('<p class="p-2" style="background-color: #eee">Loading...</p>');
            },
            success: function(data) {
               $('#listJudulMakalah').fadeIn();
               $('#listJudulMakalah').html(data);
            }
         });
         return false;
      }
      $('#listJudulMakalah').fadeOut();
   });

   $(document).on('click', '.listOfJudulMakalah', function() {
      $('#inputJudulMakalah').val($(this).text());
      $('#listJudulMakalah').fadeOut();
   })

   $('.btnCariDataPemakalah').on('click', function(e) {
      var judul = $('#inputJudulMakalah').val();
      if (judul === "") {
         e.preventDefault();
         Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Judul makalah harus diisi',
         })
         return false;
      }

      $('#loader').hide();
      $('#data-pemakalah-not-found').hide();
      $('#data-pemakalah').hide();
      $.ajax({
         url: "cariDataPemakalah",
         type: "post",
         data: { judul: judul },
         dataType: "json",
         beforeSend: function() {
            $('#loader').show(); 
         },
         success: function(res) {
            // console.log(res)
            if (res === null) {
               $('#data-pemakalah-not-found').show();
               return false;
            }
            var statusBayar = "";
            if (res.bukti_bayar === "" || res.bukti_bayar === null) {
               $('#panelUploadBuktiBayarMakalah').show();
               statusBayar = '<span class="badge badge-danger">Belum Ada Upload Bukti</span>';
               $('#data-pemakalah').removeClass('justify-content-center');
            } else {
               if (res.status_bayar === 1) {
                  $('#panelUploadBuktiBayarMakalah').hide();
                  $('#data-pemakalah').addClass('justify-content-center');
                  statusBayar = '<span class="badge badge-succes">Pembayaran berhasil</span>';
               } else {
                  $('#panelUploadBuktiBayarMakalah').hide();
                  $('#data-pemakalah').addClass('justify-content-center');
                  statusBayar = '<span class="badge badge-warning">Menunggu Verifikasi</span>';
               }
            }

            $('#data-pemakalah').show();
            $('html, body').animate({ scrollTop: $('#data-pemakalah').offset().top - 330 }, 'slow');

            $('#inputKodeMakalah').val(res.id_pemakalah);
            $('#tbJudulMakalah').html(": " + res.judul_tim);
            $('#tbPenulisMakalah').html(": " + res.nama_penulis);
            $('#tbSubTemaMakalah').html(": " + res.sub_tema);
            $('#tbInstitusiMakalah').html(": " + res.institusi);
            $('#tbStatusMakalah').html(": " + res.status);
            $('#tbEmailMakalah').html(": " + res.email);
            $('#tbTelpMakalah').html(": " + res.no_telp);
            $('#tbAlamatMakalah').html(": " + res.alamat);
            $('#tbStatusPembayaranMakalah').html(': ' + statusBayar);
         },
         complete: function () {
            $('#loader').hide();
         },
      });
   });

   $('#frmUploadBuktiBayarMakalah').submit(function(e) {
      var judul = $('#inputJudulMakalah').val();
      var bukti = $('#inputBuktiBayarMakalah').val();

      if (judul === "") {
         e.preventDefault();
         Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Harap isi judul ada pada kolom diatas',
         })
         return false;
      }
      if (bukti === "") {
         e.preventDefault();
         Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Harap isi bukti bayar',
         })
         return false;
      }

      $.ajax({
         url: "prosesBuktiBayarPemakalah",
         type: "post",
         data: new FormData(this),
         dataType: 'json',
         contentType: false,
         cache: false,
         processData: false,
         beforeSend: function() {
            $('#btnUploadBuktiBayarMakalah').html("Loading...");
         },
         success: function(res) {
            if (res.status === false) {
               e.preventDefault();
               Swal.fire({
                  type: 'error',
                  title: 'Oops...',
                  text: res.msg,
               })
            } else {
               $('[name="inputJudulMakalah"]').val("");
               $('[name="inputBuktiBayarMakalah"]').val("");

               $('#loader').hide();
               $('#data-pemakalah-not-found').hide();
               $('#data-pemakalah').hide();
               $('#rowUploadBuktiBayarPemakalah').hide();
               $('#selectBidang').val("");

               Swal.fire({
                  title: 'Pemakalah',
                  text: 'Bukti Bayar Berhasil Diupload',
                  type: 'success'
               });
            }
         },
         complete: function() {
            $('#btnUploadBuktiBayarMakalah').html("Unggah Bukti");
         }
      });
      return false;
   });
});