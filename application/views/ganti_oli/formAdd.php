<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?= site_url('gantioli/simpan') ?> ">
        <div class="card-body">
            <div class="form-group">
                <label for="id_kendaraan">Kendaraan</label>
                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                <option value="" selected disabled>-- Pilih Kendaraan --</option>
                <?php foreach($kendaraan as $k): ?>
                  <option value="<?= $k->id_kendaraan ?>" data-id_kendaraan="<?= $k->id_kendaraan ?>"><?= $k->nm_kendaraan ?> - <?= $k->merk_kendaraan ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_ganti">Tanggal Ganti Oli</label>
                <input type="date" class="form-control" name="tgl_ganti" id="tgl_ganti" placeholder="Tanggal Penggantian Oli" required>
            </div>
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" class="form-control" name="biaya" id="biaya" placeholder="Biaya Penggantian Oli" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script>
document.getElementById('tgl_ganti').addEventListener('blur', function() {
    const inputTanggal = new Date(this.value);
    const sekarang = new Date();

    inputTanggal.setHours(0, 0, 0, 0);
    sekarang.setHours(0, 0, 0, 0);

    if (inputTanggal > sekarang) {
        Swal.fire({
            icon: 'error',
            title: 'Tanggal tidak valid',
            text: 'Tanggal penggantian oli tidak boleh melebihi tanggal hari ini!',
        });
        this.value = "";
    }
});
</script>