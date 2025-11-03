<div class="card-body">

    <h1>
        <center>Laporan Pembelian BBM</center>
    </h1>
    <h3>
        <center>Bulan : <?= $bulan  ?> tahun <?= date('Y'); ?></center>
    </h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 100px">Tanggal</th>
                <th style="width: 100px">Nama Kendaraan</th>
                <th style="width: 100px;"> Jumlah Liter</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $h) { ?>
                <tr>
                    <td><?= $h->tanggal_beli ?></td>
                    <td><?= $h->nm_kendaraan ?></td>
                    <td><span class="badge bg-danger"><?= $h->jml_liter_bbm ?></span></td>
                </tr>
            <?php } ?>
        </tbody>
        <td colspan="2"><b>NOMINAL TOTAL<b></td>
        <td><?= "Rp." . number_format($total, 0, ',', '.'); ?></td>
    </table>
</div>
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>