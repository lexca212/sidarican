<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="<?= site_url('perawatan/simpan') ?> ">
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
                <label for="tgl_perawatan">Tanggal Perjalanan</label>
                <input type="date" class="form-control" name="tgl_perawatan" id="tgl_perawatan" placeholder="Tanggal Perawatan" >
            </div>
            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" class="form-control" name="biaya" id="biaya" placeholder="Biaya Perawatan Kendaraan">
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

<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('#id_kendaraan').change(function(){
        
        var id_kendaraan = $(this).val();
        // var id_kendaraan = $(this).attr("data-id_kendaraan");

        var site = '<?= site_url('perjalanan/get_km_akhir') ?>';
        console.log(id_kendaraan);
        console.log(site);
        if(id_kendaraan != ''){
            $.ajax({
                url: site,
                type: 'POST',
                data: {id_kendaraan: id_kendaraan},
                dataType: 'json',
                success: function(response){
                    if(response.status == 'success'){
                        $('#km_awal').val(response.km_akhir);
                    } else {
                        $('#km_awal').val(0);
                    }
                }
            });
        } else {
            $('#km_awal').val('');
        }
    });
});
</script>
<script>
document.getElementById('km_akhir').addEventListener('blur', function() {
    let kmAwal = parseFloat(document.getElementById('km_awal').value) || 0;
    let kmAkhir = parseFloat(this.value) || 0;

    if (kmAkhir < kmAwal) {
        Swal.fire({
            icon: 'error',
            title: 'Input tidak valid',
            text: 'Kilometer Akhir tidak boleh lebih kecil dari Kilometer Awal!',
        });
        this.value = ''; 
    }
});
</script>
<script>
$(document).ready(function(){
    $('#vis_km_awal').change(function(){
        if($(this).is(':checked')){
            $('#km_awal').prop('readonly', false);
        } else {
            $('#km_awal').prop('readonly', true);
        }
    });
});
</script>
