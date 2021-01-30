<?php $__env->startSection('title'); ?>
<title>Admin Login</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-sm-6">
        <h1>Products Update</h1>
    </div>
    <div class="col-sm-6">
    <form method="POST"  >
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop\resources\views/admin/productsupload.blade.php ENDPATH**/ ?>