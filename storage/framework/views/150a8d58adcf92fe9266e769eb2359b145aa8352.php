
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="">
        <h5 id="page-is" class="bi bi-menu-button-wide p-2"> Overview</h5>
        <div class="row justify-content-center w-100">
            <?php
                $sum = 0;
            ?>

            <?php for($i = 0; $i < count($proDetails); $i++): ?>
                <?php
                    $sum += $proDetails[$i][0]->price;
                ?>
            <?php endfor; ?>

            <h5 class="display-6 my-3">Hi! <?php echo e(session('user-name')); ?></h5>
            <div class="col-sm-12 col-md-12 col-lg-6 mb-4 mt-3">
                <div class="section-two p-3">
                    <h5>Your Info</h5>
                    <hr>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-mic-fill"> Name: </span>
                        <?php echo e(session('user-name')); ?></p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-envelope-fill"> Email: </span>
                        <?php echo e(session('user-email')); ?></p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-flag-fill"> Country: </span>
                        <?php echo e(session('user-country')); ?></p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-building"> City: </span>
                        <?php echo e(session('user-city')); ?></p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-geo-alt-fill"> Address: </span>
                        <?php echo e(session('user-address')); ?>

                    </p>

                    <a href="/shopify/dashboard/profile" class="small text-primary">Profile -></a>

                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="section-two mt-3 p-3">
                    <h5 class="">My Orders</h5>
                    <hr>
                    <p class="fs-2"><?php echo e(count($proDetails)); ?>

                        Recently Purchases</p>
                    <p>
                        <span class=""> <?php echo e(count($proDetails)); ?> Items </span>
                        <span class="float-end"><?php echo e($sum); ?>$</span>
                    </p>

                    <a href="/shopify/dashboard/orders" class="small text-primary">All Orders -></a>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/dashboard/overview.blade.php ENDPATH**/ ?>