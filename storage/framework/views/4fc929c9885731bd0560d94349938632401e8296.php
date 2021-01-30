<?php $__env->startSection('title'); ?>
<title>Order</title>
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
        <h1 style="text-align:center">Checkout</h1>
        <hr class="line">
        <h3>Total price: <?php echo e($totalprice); ?> Ft</h3>
        <hr class="line">
    </div>
    <div class="col-sm-6">
    <form method="POST"  action="<?php echo e(route('postorder',$totalprice)); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Card Number address</label>
            <input type="text" class="form-control" id="cardd" name="cardd" maxlength="16">
          </div>
          <div class="col-sm-6">
              <div class="row">
              <div class="col-sm"><i class="fa fa-cc-amex fa-2x america"></i></div>
            <div class="col-sm"><i class="fa fa-cc-visa fa-2x visa"></i></div>
            <div class="col-sm"><i class="fa fa-cc-mastercard fa-2x master"></i></div>
        </div>
          </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationServer01">Month</label>
                  <input type="text" class="form-control " maxlength="2" name="month">
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationServer02">Year</label>
                  <input type="text" class="form-control " maxlength="2" name="year">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationServer02">CVC</label>
                    <input type="text" class="form-control " maxlength="3" name="cvc">
                  </div>
              </div>
          <button type="submit" class="btn btn-primary">Order</button>
      </form>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.america').hide();
            $('.visa').hide();
            $('.master').hide();
          $("#cardd").keyup(function(){
            var value = $(this).val();
            if(value == 37){
                $('.america').show();
            }
            if(value == 40 || value == 41 || value == 42 || value == 43 || value == 44 ||
            value == 45 || value == 46 || value == 47 || value == 48 || value == 49){
                $('.visa').show();
            }
            if(value == 51 || value == 52 || value == 53 || value == 54 || value == 55){
                $('.master').show();
            }
            if(value.length < 2){
                $('.america').hide();
                 $('.visa').hide();
                 $('.master').hide();
            }
          });
        });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop\resources\views/main/order.blade.php ENDPATH**/ ?>