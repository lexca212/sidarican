<div class="card">
    <div class="card-header">
        <a href="<?= site_url('perjalanan/tambah') ?>" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Nama Kendaraan</th>
                    <th>KM Awal</th>
                    <th>KM Akhir</th>
                    <th>Tujuan</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td><?= $d->DATEONLY; ?></td>
                        <td><?= $d->TIMEONLY; ?></td>
                        <td><?= $d->nm_kendaraan; ?>, <?= $d->merk_kendaraan ?></td>
                        <td><?= $d->km_awal ?></td>
                        <td> <?= $d->km_akhir ?></td>
                        <td><?= $d->tujuan ?></td>
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