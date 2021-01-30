<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="<?php echo e(route('main')); ?>"><i class="fa fa-home main fa-2x"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <?php if($login ?? ''): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('adminlogout')); ?>">Logout</a>
       </li>
        <?php else: ?>
          <?php if(Auth::check()): ?>
                <li class="nav-item">
                     <a class="nav-link" href="<?php echo e(route('cart')); ?>">
                        <?php if(Session::has('cart')): ?>
                     <span class="badge badge-pill badge-danger"><?php echo e($total = count(Session::get('cart'))); ?></span>
                        <?php endif; ?>
                        <i class="fa fa-shopping-cart"></i> Shopping cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
               </li>
              <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('registration')); ?>">Registration</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('adminlogin')); ?>">Admin Login</a>
              </li>
          <?php endif; ?>
        <?php endif; ?>

      </ul>
    </div>
  </nav>
<?php /**PATH C:\xampp\htdocs\webshop\resources\views/header/header.blade.php ENDPATH**/ ?>