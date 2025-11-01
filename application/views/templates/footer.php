</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://web.digixcal.site">PT.CAHAYA MULTI DIGITAL
        </a>.</strong> made with love by Lexca Helga.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!---->

<!-- AdminLTE App -->
<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
<!-- page script -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[0, "desc"]],


        })
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    $("#tabel1").DataTable({
        //"responsive": true,
        //"autoWidth": false,
        //"order": [[0, "desc"]],
        "processing": true, // Tampilkan indikator "processing"
        "serverSide": true, // Aktifkan mode server-side
       
        "order": [],        // Default: jangan sort apapun dulu (biar pakai default dari server)
        "ajax": {           // Pengaturan AJAX
            "url": "<?= site_url('patroli/ajax_list') ?>", // Endpoint controller yang menyiapkan JSON
            "type": "POST"   // Metode kirim POST (DataTables kirim parameter di body)
            // Jika pakai CSRF CI3, tambahkan token di sini


        },
         "responsive": true
    })
</script>
</body>

</html>