<?php $__env->startSection('title'); ?>
<title>Registration</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php $__currentLoopData = $errors ->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container-fluid">
    <div class="alert alert-danger" role="alert">
       <strong> <?php echo e($error); ?> </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-6">
    <h1 style="text-align:center">Registration</h1>
    <hr class="line">
    </div>
    <div class="col-sm-6">
    <form method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group" action="<?php echo e(route('registration')); ?>">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">E-mail</label>
          <input type="email" class="form-control" id="mail" name="mail" value="<?php echo e(old('mail')); ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo e(old('password')); ?>">
          </div>
        <button type="submit" class="btn btn-primary">Registration</button>
      </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop\resources\views/auth/registration.blade.php ENDPATH**/ ?>