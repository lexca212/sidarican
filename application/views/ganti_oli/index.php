<div class="card">
    <div class="card-header">
        <a href="<?= site_url('gantioli/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kendaraan</th>
                    <th>Keterangan</th>
                    <th>Biaya</th>
                    <th class="col-2 ">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($ganti_oli as $g) { ?>
                    <tr>
                        <td><?= $g->tgl_ganti; ?></td>
                        <td><?= $g->nm_kendaraan; ?>, (<?= $g->nopol_kendaraan ?>)</td>
                        <td><?= $g->keterangan; ?></td>
                        <td>Rp <?= $g->biaya ?></td>
                        <td class="text-center">
                          <a href="<?= base_url('gantioli/edit/') . $g->id_ganti_oli ?>" class="btn btn-warning btn-sm">
                              <i class="far fa-edit"></i>
                          </a> |
                          <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-hapus" data-url="<?= base_url('gantioli/hapus/'. $g->id_ganti_oli) ?>">
                              <i class="fa fa-trash"></i>
                          </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<?php if ($this->session->flashdata('notif')) { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: '<?= $this->session->flashdata('notif')['type'] ?>',
            title: '<?= ucfirst($this->session->flashdata('notif')['type']) ?>',
            text: '<?= $this->session->flashdata('notif')['message'] ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php } ?>

<!-- jQuery -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>

<script>
$(document).on('click', '.btn-hapus', function(e){
    e.preventDefault();
    var url = $(this).attr("data-url");

    Swal.fire({
        title: 'Yakin ingin menghapus data ini?',
        text: "Data yang sudah dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#E0A800',
        confirmButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, hapus!',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
});
</script>
