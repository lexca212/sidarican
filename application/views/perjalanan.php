 <div class="card">
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>Tanggal</th>
                     <th>Jam</th>
                     <th>Nama Kendaraan</th>
                     <th>KM Awal</th>
                     <th>KM Akhir</th>
                     <th>Tujuan</th>
                 </tr>
             </thead>
            
             <tbody>
                 <?php foreach ($data as $d){?>
                 <tr>
                     <td><?= $d->DATEONLY; ?></td>
                     <td><?= $d->TIMEONLY; ?></td>
                     <td><?= $d->nm_kendaraan; ?>, <?= $d->merk_kendaraan ?></td>
                     <td><?= $d->km_awal ?></td>
                     <td> <?= $d->km_akhir ?></td>
                     <td><?= $d->tujuan ?></td>
                 </tr>
                  <?php }?>
             </tbody>
            
         </table>
     </div>
     <!-- /.card-body -->
 </div>
 <!-- /.card -->