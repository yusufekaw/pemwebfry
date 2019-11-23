<?php $__env->startSection('content'); ?>
<?php
$judul = $data['judul'];
$tambalban = $data['tambalban'];
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
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
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
            <table id="example2" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>foto</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $tambalban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tambalban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <a href="<?php echo e(url('admin/tambalban/detail/'.$tambalban->id_tambal_ban)); ?>"><?php echo e($tambalban->id_tambal_ban); ?></a>
                  </td>
                  <td>
                    <img src="<?php echo e(asset($tambalban->foto)); ?>" style="width: 50px; height: 50px" />
                  </td>
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

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projek\htdocs\pemweb\resources\views/admin/tambalban/index.blade.php ENDPATH**/ ?>