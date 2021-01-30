<?php $__env->startSection('title'); ?>
<title>Admin</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-sm-6">
    <h1>Admin page</h1>
    <hr>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <h2> <i class="fa fa-users"></i> Users </h2>
        <?php if(session('deleteuser')): ?>
        <div class="alert alert-success" role="alert">
            <strong><?php echo e(session('deleteuser')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php if(session('updateuser')): ?>
        <div class="alert alert-success" role="alert">
            <strong><?php echo e(session('updateuser')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table">
            <thead>
            <tr>
                <th style="padding-left: 15px">ID</th>
                <th style="padding-left: 15px">Name</th>
                <th style="padding-left: 15px">E-mail</th>
            </tr>
            </thead>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td style="padding-left: 15px"><?php echo e($user->id); ?> </td>
                <td style="padding-left: 15px"><?php echo e($user->name); ?> </td>
                <td style="padding-left: 15px"><?php echo e($user->email); ?> </td>
                <td style="padding-left: 15px"><a href="/admin/<?php echo e($user->id); ?>"><button class="btn btn-primary">Delete</button></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>
        <div class="col-sm-6">
          <h2><i class="fa fa-product-hunt"></i> Products</h2>
          <?php if(session('success')): ?>
          <div class="alert alert-success" role="alert">
              <strong><?php echo e(session('success')); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <?php if(session('updateprod')): ?>
          <div class="alert alert-success" role="alert">
              <strong><?php echo e(session('updateprod')); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <?php if(session('deleteprod')): ?>
          <div class="alert alert-success" role="alert">
              <strong><?php echo e(session('deleteprod')); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <table class="table">
            <thead>
            <tr>
                <th style="padding-left: 15px">ID</th>
                <th style="padding-left: 15px">Name</th>
                <th style="padding-left: 15px">Price</th>
                <th style="padding-left: 15px">Quantity</th>
            </tr>
            </thead>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td style="padding-left: 15px"><?php echo e($product->id); ?> </td>
                <td style="padding-left: 15px"><?php echo e($product->name); ?> </td>
                <td style="padding-left: 15px"><?php echo e($product->price); ?> </td>
                <td style="padding-left: 15px"><?php echo e($product->quantity); ?> </td>
                <td style="padding-left: 15px"><a href="/admin/<?php echo e($product->id); ?>"><button class="btn btn-primary">Delete</button></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>
      </div>
</div>

<div class="container fluid">
    <div class="row">
  <div class="col-sm">
     <button class="btn btn-primary" id="update">Update</button>
  </div>
  <div class="col-sm">
    <div class="row">
      <div class="col-sm-6">
    <button class="btn btn-primary" id="upload">Upload Products</button>
    </div>
    <div class="col-sm-6">
    <button class="btn btn-primary" id="updatepro">Update Products</button>
    </div>
    </div>
    </div>
</div>
</div>
</div>



  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast update" data-autohide="false" >
            <div class="toast-header" >
              <strong class="mr-auto">Update</strong>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              <form method="POST" action="<?php echo e(route('update')); ?>">
                  <?php echo csrf_field(); ?>
                    <div class="form-group" >
                      <label for="exampleInputEmail1">Old Record</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="id">
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                    </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">New Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">New Email</label>
                      <input type="text" class="form-control" id="mail" name="mail">
                    </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
      </div>
      <div class="col-sm">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast upload" data-autohide="false" >
            <div class="toast-header" >
              <strong class="mr-auto">Upload</strong>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
                  <form method="POST" action="<?php echo e(route('upload')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group" >
                      <label for="exampleInputEmail1"> Name</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" id="desc" name="desc">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Quantity</label>
                          <input type="text" class="form-control" id="quan" name="quan">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Image</label>
                          <input type="file" class="form-control-file" id="img" name="img">
                        </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </form>
            </div>
          </div>
      </div>
      <div class="col-sm">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast updatepro" data-autohide="false" >
            <div class="toast-header" >
              <strong class="mr-auto">Upload</strong>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
                  <form method="POST" action="<?php echo e(route('updateprod')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Old Record</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">New Quantity</label>
                          <input type="text" class="form-control" id="quan" name="quan">
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="container">
    <hr class="line">
    <div class="row">
      <div class="col-sm-6" id="app">
          <diagram amounts="<?php echo e($amounts); ?>"  days="<?php echo e($days); ?>"/>
      </div>
      <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
              <h4>Top amount : <?php echo e($topprice->payment_amount); ?> Ft - <?php echo e($topprice->name); ?> </h4>
            </div>
          </div>
      </div>
    </div>
      <script src="<?php echo e(asset('js/app.js')); ?>"></script>
  </div>
<script>
$(document).ready(function(){
 $('.update').hide();
  $("#update").click(function(){
    $('.update').show();
    $('.update').toast('show');
  });
  $('.upload').hide();
  $("#upload").click(function(){
    $('.upload').show();
    $('.upload').toast('show');
  });

  $('.updatepro').hide();
  $("#updatepro").click(function(){
    $('.updatepro').show();
    $('.updatepro').toast('show');
  });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop\resources\views/admin/admin.blade.php ENDPATH**/ ?>