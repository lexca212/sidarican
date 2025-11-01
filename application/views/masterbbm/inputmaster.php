<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Kendaraan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?= site_url('admin/masterbbm/simpan') ?> ">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Kode BBM</label>
                <input type="text" name="kd_bbm" class="form-control" id="exampleInputEmail1" placeholder="Nama Kendaraan" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama BBM/label>
                <input type="text" name="nama_bbm" class="form-control" id="exampleInputPassword1" placeholder="Merk kendaraan" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nopol Kendaraan</label>
                <input type="text" name="nopol_kendaraan" class="form-control" id="exampleInputEmail1" placeholder="conoth : AD 1234 GGG" required>
            </div>
            <div class="form-group">
                <!-- <label for="exampleInputPassword1">BBM Kendaraan</label>
                <input type="text" name="bbm_kendaraan" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
            <label for="bbm">BBM Kendaraan</label>
                <select name="bbm_kendaraan" id="bbm_kendaraan" class="form-control" aria-placeholder="BBM KENDARAAN">
                    <?php foreach ($bbm as $b) {?>
                <option value="<?= $b->kd_bbm ?>"><?= $b->nama_bbm ?></option>
                        <?php }?>
            </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tahun Kendaraan</label>
                <input type="text" name="tahun_kendaraan" class="form-control" id="exampleInputPassword1" placeholder="2029">
            </div>
            <!-- tidak usah -->
            <!-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-check">
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