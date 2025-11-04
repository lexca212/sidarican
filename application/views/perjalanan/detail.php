<div class="card shadow-lg">
  <div class="card-body">
    <div class="shadow">
      <div class="card-body">
        <table class="table">
          <tbody>
            <div class="form-group">
              <tr>
                <td><b>Tanggal</b></td>
                <td><?= date('Y-m-d', strtotime($perjalanan->tgl_perjalanan)); ?></td>
              </tr>
              <tr>
                <td><b>Jam</b></td>
                <td><?= date('H:i:s', strtotime($perjalanan->tgl_perjalanan)); ?> WIB</td>
              </tr>
              <tr>
                <td><b>Nama Kendaraan</b></td>
                <td><?= $kendaraan->nm_kendaraan ?>, <?= $kendaraan->merk_kendaraan ?> (<?= $kendaraan->nopol_kendaraan ?>)</td>
              </tr>
              <tr>
                <td><b>Kilometer Awal</b></td>
                <td><?= $perjalanan->km_awal ?></td>
              </tr>
              <tr>
                <td><b>Kilometer Akhir</b></td>
                <td><?= $perjalanan->km_akhir ?></td>
              </tr>
              <tr>
                <td><b>Tujuan Perjalanan</b></td>
                <td><?= $perjalanan->tujuan ?></td>
              </tr>
              <tr>
                <td><b>Nama Pengguna</b></td>
                <td><?= $pengguna->nama?></td>
              </tr>
            </div>
          </tbody>
        </table>
        <div class="form-group text-center mt-5">
          <a class="btn btn-outline-info" href="<?= base_url('perjalanan/data') ?>">
            <i class="fas fa-caret-left"></i> Kembali 
          </a>
        </div>
      </div>
    </div>
  </div>
</div>