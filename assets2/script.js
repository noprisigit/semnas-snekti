// Set Upload Name Displayed
$('.custom-file-input').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass('selected').html(filename);
});

// Sweet Alert Message
const message = $('.flash-message').data('message');
const title = $('.flash-message').data('title');

if (message) {
    Swal.fire({
        title: title,
        text: message,
        type: 'success'
    });
}

// View Semnas
$('.viewsemnas').on('click', function() {
    let kode = $(this).data('kode');
    let nmlengkap = $(this).data('nmlengkap');
    let nmrinduk = $(this).data('nmrinduk');
    let asalinstansi = $(this).data('asalinstansi');
    let jnskelamin = $(this).data('jnskelamin');
    let email = $(this).data('email');
    let notelp = $(this).data('notelp');
    let statusbayar = $(this).data('statusbayar');

    if (statusbayar == 1) {
        status = "Sudah Bayar";
    } else {
        status = "Belum Bayar";
    }   

    

    $('.modal-body .view_kode').attr('value', kode);
    $('.modal-body .view_nmlengkap').attr('value', nmlengkap);
    $('.modal-body .view_nmrinduk').attr('value', nmrinduk);
    $('.modal-body .view_asalinstansi').attr('value', asalinstansi);
    $('.modal-body .view_jnskelamin').attr('value', jnskelamin);
    $('.modal-body .view_email').attr('value', email);
    $('.modal-body .view_notelp').attr('value', notelp);
    $('.modal-body .view_statusbayar').attr('value', status);
});

// Edit Semnas
$('.editsemnas').on('click', function() {
    let kode = $(this).data('kode');
    let nmlengkap = $(this).data('nmlengkap');
    let nmrinduk = $(this).data('nmrinduk');
    let asalinstansi = $(this).data('asalinstansi');
    let jnskelamin = $(this).data('jnskelamin');
    let email = $(this).data('email');
    let notelp = $(this).data('notelp');
    let statusbayar = $(this).data('statusbayar');

    if (statusbayar == 1) {
        status = "Sudah Bayar";
    } else {
        status = "Belum Bayar";
    }   

    $('.modal-body #view_jnskelamin').empty();

    $('.modal-body .view_kode').attr('value', kode);
    $('.modal-body .view_nmlengkap').attr('value', nmlengkap);
    $('.modal-body .view_nmrinduk').attr('value', nmrinduk);
    $('.modal-body .view_asalinstansi').attr('value', asalinstansi);
    if(jnskelamin == 'Laki-Laki') {
        $('.modal-body #view_jnskelamin').append('<option selected value="'+ jnskelamin +'">'+ jnskelamin +'</option>');
        $('.modal-body #view_jnskelamin').append('<option value="perempuan">Perempuan</option>');
    } else {
        $('.modal-body #view_jnskelamin').append('<option selected value="' +jnskelamin +'">'+ jnskelamin +'</option>');
        $('.modal-body #view_jnskelamin').append('<option value="Laki-Laki">Laki-Laki</option>');
    }
    $('.modal-body .view_email').attr('value', email);
    $('.modal-body .view_notelp').attr('value', notelp);
});

// Delete Semnas
$('.deletesemnas').on('click', function(event) {
    event.preventDefault();
    const href = $(this).attr('href');
    console.log(href);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
}); 

// Edit Materi
$('.editmateri').on('click', function () {
    let id = $(this).data('materiid');
    let nama_pemateri = $(this).data('pemateri');
    let judul_materi = $(this).data('judul');
    let nama_file = $(this).data('file');

    $('.modal-body #edit_id').attr('value', id);
    $('.modal-body #edit_nama_pembicara').attr('value', nama_pemateri);
    $('.modal-body #edit_judul_materi').attr('value', judul_materi);
    $('.modal-body #edit_nama_file_lama').attr('value', nama_file);
});

// Delete Materi
$('.deletemateri').on('click', function(event) {
    event.preventDefault();
    const href = $(this).attr('href');
    console.log(href);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
}); 

// Edit User
$('.edituser').on('click', function() {
    let id = $(this).data('userid');
    let username = $(this).data('username');
    let f_name = $(this).data('fname');
    let l_name = $(this).data('lname');

    $('.modal-body #edit_userid').attr('value', id);
    $('.modal-body #edit_username').attr('value', username);
    $('.modal-body #edit_f_name').attr('value', f_name);
    $('.modal-body #edit_l_name').attr('value', l_name);
});

// Delete User
$('.deleteuser').on('click', function (event) {
    event.preventDefault();
    const href = $(this).attr('href');
    console.log(href);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

$('.btn-detail-paper').on('click', function(){
    var judul = $(this).data('judul');
    var penulis = $(this).data('penulis');
    var tema = $(this).data('tema');
    var institusi = $(this).data('institusi');
    var status = $(this).data('status');
    var email = $(this).data('email');
    var telp = $(this).data('telp');
    var alamat = $(this).data('alamat');
    
    $('#detailJudul').html(': ' + judul);
    $('#detailPenulis').html(': ' + penulis);
    $('#detailTema').html(': ' + tema);
    $('#detailInstitusi').html(': ' + institusi);
    $('#detailStatus').html(': ' + status);
    $('#detailEmail').html(': ' + email);
    $('#detailTelp').html(': ' + telp);
    $('#detailAlamat').html(': ' + alamat);
});

$('.btn-delete-pemakalah').on('click', function(event) {
    event.preventDefault();
    const href = $(this).attr('href');
    console.log(href);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
}); 

$(document).on('click', '#enlargeImage', function() {
    $('#modalEnlargeImage').modal('show');
    $('#imgBuktiBayar').attr('src', '../../assets/images/bukti-bayar/' + $(this).data('img'));
});

$('#enlargeImage').on('click', function() {
    $('#modalEnlargeImage').modal('show');
    $('#imgBuktiBayar').attr('src', '../../assets/images/bukti-bayar/' + $(this).data('img'));
});

$('.btn-deactivate-account').on('click', function(event) {
    event.preventDefault();
    const href = $(this).attr('href');
    console.log(href);

    Swal.fire({
        title: 'Are you sure?',
        text: "Akun ini akan di nonaktifkan!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Matikan Akun'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

$(document).on('click', '.btnDetailPkM', function() {
    var id = $(this).data('id');
    $('#modalDetailPkM').modal('show');
    $.ajax({
        url: "../getPemakalahPkM",
        type: "post",
        data: { id: id },
        dataType: "json",
        success: function(data) {
            $('#detJudul').html(": " + data.judul_tim);
            $('#detPenulis').html(": " + data.nama_penulis);
            $('#detKategori').html(": " + data.kategori);
            $('#detMetodePelaksanaan').html(": " + data.metode_pelaksanaan);
            $('#detStatus').html(": " + data.status);
            $('#detInstitusi').html(": " + data.institusi);
            $('#detEmail').html(": " + data.email);
            $('#detPhone').html(": " + data.no_telp);
            $('#detAlamat').html(": " + data.alamat);
            var statusBayar;
            if (data.bukti_bayar === "") {
                $('#detStatusBayar').html(': <span class="badge badge-danger">Belum Ada Bukti Bayar</span>');
            } else {
                $('#detStatusBayar').html(": " + '<button class="btn btn-info btn-sm">Lihat Bukti Bayar</button> <button class="btn btn-warning btn-sm">Verifikasi Pembayaran</button>');
            } 
                statusBayar = '<span class="badge badge-danger">Belum Ada Bukti Bayar</span>';
                statusBayar = '<button class="btn btn-info btn-sm">Lihat Bukti Bayar</button>';
            
            
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
    return false;
})