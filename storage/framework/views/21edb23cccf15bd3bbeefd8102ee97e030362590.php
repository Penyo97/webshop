<?php $__env->startSection('title'); ?>
<title>Main</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success" role="alert">
    <strong><?php echo e(session('success')); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if(session('successreg')): ?>
<div class="alert alert-success" role="alert">
    <strong><?php echo e(session('successreg')); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if(Auth::check()): ?>
<div class="container-fluid">
        <?php $__currentLoopData = $products->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
     <?php $__currentLoopData = $product_ch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4">
           <div class="img-thumbnail">
              <img src="images/<?php echo e($product->image); ?>" class="rounded mx-auto d-block image" alt="Responsive image">
               <div class="caption title" >
                 <h3><?php echo e($product->name); ?> </h3>
                 <p class="description"> <?php echo e($product->description); ?> </p>
                 <a href="<?php echo e(route('addcart',['id' => $product->id])); ?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</a>
               <div class="pull-right price"><?php echo e($product->price); ?> Ft </div>
               </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div id="app">
<mainvue/>
</div>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop\resources\views/main/main.blade.php ENDPATH**/ ?>