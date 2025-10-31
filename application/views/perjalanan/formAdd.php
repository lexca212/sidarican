<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?= site_url('perjalanan/simpan') ?> ">
        <div class="card-body">
            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan Perjalanan">
            </div>
            <div class="form-group">
                <label for="km_awal">Kilometer Awal</label>
                <input type="text" class="form-control" name="km_awal" id="km_awal" placeholder="Kilometer Awal Sebelum Perjalanan">
            </div>
            <div class="form-group">
                <label for="km_akhir">Kilometer Akhir</label>
                <input type="text" class="form-control" name="km_akhir" id="km_akhir" placeholder="Kilometer Akhir Setelah Perjalanan">
            </div>
            <div class="form-group">
                <label for="tgl_perjalanan">Tanggal Perjalanan</label>
                <input type="datetime-local" class="form-control" name="tgl_perjalanan" id="tgl_perjalanan" placeholder="Tanggal Perjalanan" >
            </div>
            <div class="form-group">
                <label for="kendaraan">Kendaraan</label>
                <select name="kendaraan" id="kendaraan" class="form-control">
                  <option value="" selected disabled>-- Pilih Kendaraan --</option>
                  <?php foreach($kendaraan as $k): ?>
                    <option value="<?= $k->id_kendaraan ?>"><?= $k->nm_kendaraan ?> - <?= $k->merk_kendaraan ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>