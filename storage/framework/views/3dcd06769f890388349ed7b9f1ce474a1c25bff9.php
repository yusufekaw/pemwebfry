<?php $__env->startSection('content'); ?>
<?php
$judul = $data['judul'];
?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($judul); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">Data Tambal Ban</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-7">
        <?php if(session()->get('sukses')): ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo e(session()->get('sukses')); ?>  
        </div>
        <?php endif; ?>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($judul); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data['tambalban']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tambalban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="<?php echo e(url('admin/tambalban/detail/'.$tambalban->id_tambal_ban)); ?>"><?php echo e($tambalban->id_tambal_ban); ?></a></td>
                  <td><?php echo e($tambalban->nama); ?></td>
                  <td><?php echo e($tambalban->alamat); ?></td>
                  <td>
                  	<a href="<?php echo e(url('admin/tambalban/sunting/'.$tambalban->id_tambal_ban)); ?>" class="btn btn-warning">
                  		<i class="fa fa-edit"></i>
                  	</a>
                  	<a onclick="return confirm('Apakah anda yakin ingin menghapus data berikut?');" href="<?php echo e(url('admin/tambalban/hapus/'.$tambalban->id_tambal_ban)); ?>" class="btn btn-danger">
                  		<i class="fa fa-trash"></i>
                  	</a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-sm-5">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Tambal Ban Baru</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <!-- form start -->
          <form method="post" action="<?php echo e(url('admin/tambalban/simpan')); ?>">
            
            <?php echo csrf_field(); ?>

            <div class="box-body">
              <div class="form-group col-sm-12">
                <label for="nama">Nama</label>
               <input type="text" class="form-control col-sm-6" id="nama" name="nama" value="<?php echo e(old('nama')); ?>" required>
                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="help-block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              
              <div class="form-group col-sm-12">
                <label for="alamat">Alamat</label>
                <textarea class="form-control col-xs-6" id="alamat" name="alamat" required><?php echo e(old('alamat')); ?></textarea>
                <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="help-block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
              </div>

              <br><br>
              <div class="form-group col-sm-12">
                <label for="telp">Telp</label>
                <input type="tel" class="form-control col-xs-6" id="telp" name="telp" value="<?php echo e(old('telp')); ?>" required>
                <?php $__errorArgs = ['telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="help-block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="form-group col-sm-12">
                <label for="deskripsi col-xs-12">Deskripsi</label>
                <textarea class="form-control col-xs-6" id="deskripsi" name="deskripsi" required><?php echo e(old('deskripsi')); ?></textarea> 
                <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="help-block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="row">
                <div class="form-group col-sm-12">
                  <div class="col-sm-6">
                    <label for="latitude">Latitude</label>
                  </div>
                  <div class="col-sm-6">
                    <label for="longitude">Longitude</label>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="form-group col-sm-12">
                  <div class="col-sm-6">
                    <input type="number" step="any" name="latitude" id="latitude" class="form-control" value="<?php echo e(old('latitude')); ?>" required>
                    <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="help-block"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-sm-6">
                    <input type="number" step="any" name="longitude" id="longitude" class="form-control" value="<?php echo e(old('longitude')); ?>" required>
                    <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="help-block"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              </div>
            
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><span class="fa fa-hdd-o"></span> Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-warning"><span class="fa fa-refresh"></span> Reset</button>
              &nbsp;
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                <span class="fa fa-map"></span> Cari Koordinat di Peta
              </button>
            </div>

          </form>

        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade modal-lg" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Cari Koordinat Lokasi di Peta</h4>
        </div>
        <div class="modal-body">
          <div id="map" style="width: 100%; height: 400px;">
          </div>                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"></i> Tetapkan Koordinat</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script type="text/javascript">
    //* Fungsi untuk mendapatkan nilai latitude longitude
    function updateMarkerPosition(latLng) {
      document.getElementById('latitude').value = [latLng.lat()]
      document.getElementById('longitude').value = [latLng.lng()]
    }

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(-7.2536661401982006,112.75969753125003),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
//posisi awal marker   
var latLng = new google.maps.LatLng(-7.2536661401982006,112.75969753125003);

/* buat marker yang bisa di drag lalu 
  panggil fungsi updateMarkerPosition(latLng)
 dan letakan posisi terakhir di id=latitude dan id=longitude
 */
 var marker = new google.maps.Marker({
  position : latLng,
  title : 'lokasi',
  map : map,
  draggable : true
});

 updateMarkerPosition(latLng);
 google.maps.event.addListener(marker, 'drag', function() {
 // ketika marker di drag, otomatis nilai latitude dan longitude
 //menyesuaikan dengan posisi marker 
 updateMarkerPosition(marker.getPosition());
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projek\htdocs\pemweb\resources\views/admin/tambalban/index.blade.php ENDPATH**/ ?>