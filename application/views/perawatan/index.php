<div class="card">
    <div class="card-header">
        <a href="<?= site_url('perawatan/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
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
                <?php foreach ($perawatan as $p) { ?>
                    <tr>
                        <td><?= $p->tgl_perawatan; ?></td>
                        <td><?= $p->nm_kendaraan; ?>, (<?= $p->nopol_kendaraan ?>)</td>
                        <td><?= $p->keterangan; ?></td>
                        <td>Rp <?= $p->biaya ?></td>
                        <td class="text-center">
                          <a href="#" class="btn btn-warning btn-sm">
                              <i class="far fa-edit"></i>
                          </a> |
                          <a href="" class="btn btn-danger btn-sm">
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