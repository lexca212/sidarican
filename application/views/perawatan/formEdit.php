<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?= site_url('perawatan/simpan') ?> ">
        <div class="card-body">
            <input type="text" name="id_perawatan" id="id_perawatan" hidden value="<?= $perawatan->id_perawatan ?>">
            <div class="form-group">
                <label for="id_kendaraan">Kendaraan</label>
                <select name="id_kendaraan" id="id_kendaraan" class="form-control">
                <option value="" selected disabled>-- Pilih Kendaraan --</option>
                <?php foreach($kendaraan as $k): ?>
                  <option value="<?= $k->id_kendaraan ?>" <?= ($k->id_kendaraan== $perawatan->id_kendaraan) ? 'selected' : '' ?> ><?= $k->nm_kendaraan ?> - <?= $k->merk_kendaraan ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_perawatan">Tanggal Perjalanan</label>
                <input type="date" value="<?= $perawatan->tgl_perawatan ?>" class="form-control" name="tgl_perawatan" id="tgl_perawatan" placeholder="Tanggal Perawatan" >
            </div>
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" value="<?= $perawatan->biaya ?>" class="form-control" name="biaya" id="biaya" placeholder="Biaya Perawatan Kendaraan">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"><?= $perawatan->keterangan ?></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script>
document.getElementById('tgl_perawatan').addEventListener('blur', function() {
    const inputTanggal = new Date(this.value);
    const sekarang = new Date();

    inputTanggal.setHours(0, 0, 0, 0);
    sekarang.setHours(0, 0, 0, 0);

    if (inputTanggal > sekarang) {
        Swal.fire({
            icon: 'error',
            title: 'Tanggal tidak valid',
            text: 'Tanggal perawatan tidak boleh melebihi tanggal hari ini!',
        });
        this.value = "<?= $perawatan->tgl_perawatan ?>";
    }
});
</script>