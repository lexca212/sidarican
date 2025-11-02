<div class="card">
    <div class="card-header">
        <!-- <h3 class="card-title">DataTable with default features</h3> -->

        <!-- <button type="button" class="btn btn-primary btn-sm">Tambah</button> -->
        <a href="<?= site_url('dashboard/tambah') ?>" class="btn btn-primary btn-sm">Tambah Data</a>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Kendaraan</th>
                    <th>Merk Kendaraan</th>
                    <th>Nopol</th>
                    <th>BBM</th>
                    <th>Tahun</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td><?= $d->nm_kendaraan; ?></td>
                        <td><?= $d->merk_kendaraan ?>
                        </td>
                        <td><?= $d->nopol_kendaraan ?></td>
                        <td> <?= $d->nama_bbm ?></td>
                        <td><?= $d->tahun_kendaraan ?></td>
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