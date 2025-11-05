<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Kendaraan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?= site_url('dashboard/simpan') ?> " enctype="multipart/form-data">
        <div class="card-body">
            <input type="text" name="id_kendaraan" id="id_kendaraan" hidden value="<?= $kendaraan->id_kendaraan ?>" required>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kendaraan</label>
                <input value="<?= $kendaraan->nm_kendaraan ?>" type="text" name="nm_kendaraan" class="form-control" id="exampleInputEmail1" placeholder="Nama Kendaraan" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Merk Kendaraan</label>
                <input value="<?= $kendaraan->merk_kendaraan ?>" type="text" name="merk_kendaraan" class="form-control" id="exampleInputPassword1" placeholder="Merk kendaraan" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nopol Kendaraan</label>
                <input value="<?= $kendaraan->nopol_kendaraan ?>" type="text" name="nopol_kendaraan" class="form-control" id="exampleInputEmail1" placeholder="conoth : AD 1234 GGG" required>
            </div>
            <div class="form-group">
                <!-- <label for="exampleInputPassword1">BBM Kendaraan</label>
                <input type="text" name="bbm_kendaraan" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                <label for="bbm">BBM Kendaraan</label>
                <select name="bbm_kendaraan" id="bbm_kendaraan" class="form-control" aria-placeholder="BBM KENDARAAN">
                    <?php foreach ($bbm as $b) { ?>
                        <option value="<?= $b->kd_bbm ?>" <?= ($kendaraan->kd_bbm == $b->kd_bbm) ? 'selected' : '' ?>><?= $b->nama_bbm ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tahun Kendaraan</label>
                <input value="<?= $kendaraan->tahun_kendaraan ?>" type="text" name="tahun_kendaraan" class="form-control" id="exampleInputPassword1" placeholder="2029">
            </div>
            <!-- tidak usah -->
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="m-2">
                    <a href="<?= base_url('uploads/kartu_subsidi/') . $kendaraan->gambar_subsidi ?>" target="_blank">
                        <img src="<?= base_url('uploads/kartu_subsidi/') . $kendaraan->gambar_subsidi ?>" alt="Luput" width="70">
                    </a>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="gambar" required> 
                        <label class="custom-file-label" for="gambar"></label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>