<?php $__env->startSection('title'); ?>
<title>Cart</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(Session::has('cart')): ?>
<div class="container">
    <div class="col-sm-6">
        <h1 style="text-align:center">Cart</h1>
        <hr class="line">
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
    <div class="col-sm">
        <h3><?php echo e($item['productname']); ?></h3>
    </div>
    <div class="col-sm">
      <h4>  <span class="badge badge-pill badge-danger"><?php echo e($item['quantity']); ?> db</span></h4>
    </div>
    <div class="col-sm">
        <p><?php echo e($item['price']); ?> Ft</p>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="col-sm-6">
        <?php
            $totalprice = 0;
            $totalquantity = 0;
        ?>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $totalprice += $item['price'] * $item['quantity'];
                $totalquantity += $item['quantity'];
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <hr class="line">
        <div class="row">
        <div class="col-sm">
            <h4>Total quantity: <?php echo e($totalquantity); ?> db</h4>
        </div>
        <div class="col-sm">
            <h4>Total price: <?php echo e($totalprice); ?> Ft</h4>
        </div>
    </div>
    </div>
    <div class="col-sm-6">
        <hr class="line">
        <a  href="<?php echo e(route('order',$totalprice)); ?>"><button class="btn btn-primary" style="text-align:center">Check out</button></a>
    </div>
</div>
<?php else: ?>
<div class="container">
    <div class="col-sm-6">
        <h1 style="text-align:center">Cart</h1>
        <hr class="line">
        <h3 style="text-align:center">Nothing in the cart</h3>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop\resources\views/main/cart.blade.php ENDPATH**/ ?>