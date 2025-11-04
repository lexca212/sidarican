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
                    <th>Gambar Kartu</th>
                    <?php if ($role === 'admin') { ?>
                        <th class="col-2 ">Aksi</th>
                    <?php } ?>
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
                        <td>
                            <a href="<?= base_url('uploads/kartu_subsidi/') . $d->gambar_subsidi ?>" target="_blank">
                                <img src="<?= base_url('uploads/kartu_subsidi/') . $d->gambar_subsidi ?>" alt="Luput" width="70">
                            </a>
                        </td>
                        <?php if ($role === 'admin') { ?>
                            <td>
                                <a href="#" class="btn btn-secondary btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" data-url='<?= base_url('dashboard/hapus/') . $d->id_kendaraan ?>' class="btn btn-warning btn-sm btn-hapus">
                                    <i class="fa fa-trash"></i>
                                </a>


                            </td>
                        <?php } ?>
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
    $(document).on('click', '.btn-hapus', function(e) {
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