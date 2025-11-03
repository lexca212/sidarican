<form action="<?= site_url('pembelianbbm/filter') ?>" method="post">
    <div class="container-fluid">
        <label for="tgl_awal">Tanggal Awal</label>
        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
        <label for="tgl_akhir">Tanggal Akhir</label>
        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
        <label for="kendaraan"> KEndaraan</label>
        <select name="nm_kendaraan" id="nm_kendaraan" class="form-control">
            <?php foreach ($kendaraan as $k) { ?>
                <option value="<?= $k->id_kendaraan ?>"><?= $k->nm_kendaraan ?></option>
            <?php } ?>
        </select>
    </div>
    <br>

    <div class="container-fluid">
        <input type="submit" value="submit" class="btn btn-primary">

    </div>