        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.1
            </div>
            <strong>Copyright &copy; 2020 <a href="<?= base_url('admin'); ?>">SNEKTI</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets2/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>assets2/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets2/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>assets2/dist/js/demo.js"></script>
    <!-- Script JS -->
    <script src="<?= base_url(); ?>assets2/script.js"></script>
    <!-- Main JS -->
    <?php foreach($file_js as $js) : ?>
    <script src="<?= base_url() . $js; ?>"></script>
    <?php endforeach; ?>

    <script>
        $(document).ready(function() {
            $('#data-table-semnas').DataTable();
            $('#data-pembayaran-semnas').DataTable();
            $('#data-paper').DataTable({
                "columnDefs": [
                    {
                        "targets": [6],
                        "width": "130px"
                    }
                ]
            });
            $('#data-p2m').DataTable({
                "columnDefs": [
                    {
                        "targets": [0],
                        "width": "10px"
                    },
                    {
                        "targets": [1],
                        "width": "250px"
                    },
                    {
                        "targets": [2],
                        "width": "180px"
                    },
                    {
                        "targets": [3],
                        "width": "280px"
                    },
                    {
                        "targets": [4],
                        "width": "170px"
                    }
                ]
            });
            
            $('#enlargeImage').on('click', function() {
                $('#modalEnlargeImage').modal('show');
            });

            $(document).on('click', '.btnDetailPkM', function() {
                var id = $(this).data('id');
                $('#modalDetailPkM').modal('show');
                $.ajax({
                    url: "<?= base_url('admin/getPemakalahPkM') ?>",
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
                        if (data.bukti_bayar === "" || data.bukti_bayar === null) {
                            $('#detStatusBayar').html(': <span class="badge badge-danger">Belum Ada Bukti Bayar</span>');
                        } else {
                            if (data.status_bayar === "1" || data.status_bayar === 1)
                                $('#detStatusBayar').html(": " + '<button class="btn btn-info btn-sm showBuktiBayarPemakalahP2M" data-img="'+data.bukti_bayar+'">Lihat Bukti Bayar</button>');
                            else
                                $('#detStatusBayar').html(": " + '<button class="btn btn-info btn-sm showBuktiBayarPemakalahP2M" data-img="'+data.bukti_bayar+'">Lihat Bukti Bayar</button> <a href="<?= base_url('admin/verifikasiPembayaranMakalahP2M/') ?>' + data.id_pemakalah_p2m + '" class="btn btn-warning btn-sm">Verifikasi Pembayaran</a>');
                        } 
                    },
                    error: function(err) {
                        console.log(err.responseText);
                    }
                });
                return false;
            });

            $(document).on('click', '.showBuktiBayarPemakalahP2M', function() {
                $('#modalBuktiBayarPemakalah').modal('show');
                $('#imgBuktiBayarPemakalah').attr('src', '../../file/p2m/bukti/' + $(this).data('img'));
            });
        });
    </script>
</body>

</html>