<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?= site_url('pembelianbbm/simpan') ?> ">
        <div class="card-body">
          <div class="form-group">
            <label for="id_kendaraan">Kendaraan</label>
            <select name="id_kendaraan" id="id_kendaraan" class="form-control">
              <option value="" selected disabled>-- Pilih Kendaraan --</option>
              <?php foreach($kendaraan as $k): ?>
                <option value="<?= $k->id_kendaraan ?>" data-id_kendaraan="<?= $k->id_kendaraan ?>"><?= $k->nm_kendaraan ?> - <?= $k->merk_kendaraan ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
                <label for="tanggal_beli">Tanggal Pembelian BBM</label>
                <input type="date" class="form-control" name="tanggal_beli" id="tanggal_beli">
            </div>
            <div class="form-group">
                <label for="jenis_bbm">Jenis BBM</label>
                <select name="jenis_bbm" id="jenis_bbm" class="form-control">
                  <option value="" selected disabled>-- Pilih BBM --</option>
                  <?php foreach($bbm as $b): ?>
                    <option value="<?= $b->kd_bbm ?>"><?= $b->nama_bbm ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="harga_bbm">Harga BBM / liter</label>
                <input type="number" class="form-control" name="harga_bbm" id="harga_bbm" placeholder="Harga menyesuaikan jenis BBM" readonly>
                <div class="form-group">
                    <input style="width: 18px; height: 18px; margin-top: 8px" type="checkbox" name="vis_harga_bbm" id="vis_harga_bbm">
                    <span for="vis_harga_bbm" style="font-size: 12px;">check untuk edit harga BBM</span>
                </div>
            </div>
            <div class="form-group">
                <label for="jml_liter_bbm">Jumlah Beli (liter)</label>
                <input type="number" class="form-control" name="jml_liter_bbm" id="jml_liter_bbm" placeholder="Beli berapa liter ?">
            </div>
            <div class="form-group">
                <label for="jml_harga_bbm">Total Harga Beli</label>
                <input type="text" class="form-control" name="jml_harga_bbm" id="jml_harga_bbm" placeholder="Tujuan Perjalanan" readonly>
            </div>
        </div>
        <div class="card-footer">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('#jenis_bbm').change(function(){
        
        const jenis_bbm = $(this).val();

        const site = '<?= site_url('pembelianbbm/get_harga_bbm') ?>';
        console.log(jenis_bbm);
        console.log(site);
        if(jenis_bbm != ''){
            $.ajax({
                url: site,
                type: 'POST',
                data: {jenis_bbm: jenis_bbm},
                dataType: 'json',
                success: function(response){
                    if(response.status == 'success'){
                        $('#harga_bbm').val(response.harga_bbm);
                    } else {
                        $('#harga_bbm').val(0);
                    }
                }
            });
        } else {
            $('#harga_bbm').val('');
        }
    });
});
</script>
<script>
function hitung_jml_harga_bbm() {
    const jml_liter_bbm = parseFloat(document.getElementById('jml_liter_bbm').value) || 0;
    const harga_bbm = parseFloat(document.getElementById('harga_bbm').value) || 0;

    const jml_harga_bbm = jml_liter_bbm * harga_bbm;

    $('#jml_harga_bbm').val(jml_harga_bbm);
}

$('#jml_liter_bbm, #jenis_bbm, #harga_bbm').on('blur', hitung_jml_harga_bbm);
</script>
<script>
$(document).ready(function(){
    $('#vis_harga_bbm').change(function(){
        if($(this).is(':checked')){
            $('#harga_bbm').prop('readonly', false);
        } else {
            $('#harga_bbm').prop('readonly', true);
        }
    });
});
</script>

