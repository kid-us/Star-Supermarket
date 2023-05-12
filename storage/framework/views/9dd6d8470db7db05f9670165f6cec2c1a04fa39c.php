
<?php $__env->startSection('mytitle', $product); ?>
<?php $__env->startSection('content'); ?>
    <div id="carousel" class="container fw-semibold carousel-m">
        <div class="row justify-content-center shadow rounded p-5 mt-5 section-two">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5 product-container px-5">
                <h3 class="mb-5"><?php echo e($product); ?></h3>
                <p class="hidden"></p>
                <img src="<?php echo e(asset('uploads/' . $img)); ?>" class="img-fluid" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 small">
                <p class="my-3">
                    <span class="text-secondary">Product No: <?php echo e($productNo); ?></span>
                    <span class="ms-5 text-secondary small">Available (Instock)</span>
                </p>
                <p class="fs-6"><?php echo e($description); ?></p>

                <p class="mt-4 fs-6">
                    <span>Discount Price: <?php echo e($price); ?></span>
                    <span class="ms-5"> <del>MRP Price: <?php echo e($del); ?><del></span>
                </p>

                <form action="/star/payment" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="Item-name" hidden value="<?php echo e($product); ?>">
                    <input type="text" name="Item-price" hidden value="<?php echo e(intval($price)); ?>">
                    <input type="text" name="Item-productNo" hidden value="<?php echo e($productNo); ?>">
                    <input type="text" name="Item-image" hidden value="<?php echo e($img); ?>">
                    <input type="text" name="buying" hidden value="single">
                    
                    <label for="quantity" class="me-3">Qty </label>
                    <input type="number" name="quant" class="quant form-control me-3 w-25 mb-4" name="quantity"
                        max="<?php echo e($quantity); ?>" min="1" value="1">
                    <div class="row">
                        <div class="col-6">
                            <button class="fw-semibold btn btn-warning px-5 buy-link"> Order Now </button>
                        </div>
                        <div class="col-lg-3 col-md-4 d-none d-md-block">
                            <a class="add-cart cursor fs-4 bi bi-cart4">
                                <span data-name="<?php echo e($product); ?>" data-price="<?php echo e($price); ?>"
                                    data-image="<?php echo e($img); ?>" data-added="0" data-PN="<?php echo e($productNo); ?>"></span>
                            </a>
                        </div>
                        <div class="col-3 offset-3 d-block d-md-none">
                            <a class="add-cart cursor fs-4 bi bi-cart4">
                                <span data-name="<?php echo e($product); ?>" data-price="<?php echo e($price); ?>"
                                    data-image="<?php echo e($img); ?>" data-added="0" data-PN="<?php echo e($productNo); ?>"></span>
                            </a>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>

        
        <div class="row justify-content-center mt-5 p-4">
            <h4>Similar Products</h4>
            <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 mb-4 mt-5 shadow py-5 px-3 text-center section-two">
                    <form action="/star/purchase" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="product" value="<?php echo e($items->product); ?>" readonly hidden>
                        <input type="text" name="price" value="<?php echo e($items->price . "$"); ?>" readonly hidden>
                        <input type="text" name="delPrice" value="<?php echo e($items->delPrice . "$"); ?>" readonly hidden>
                        <input type="text" name="product-no" value="<?php echo e($items->productNo); ?>" readonly hidden>
                        <input type="text" name="category" value="<?php echo e($items->category); ?>" readonly hidden>
                        <input type="text" name="quantity" value="<?php echo e($items->quantity); ?>" readonly hidden>
                        <input type="text" name="info" value="<?php echo e($items->description); ?>" readonly hidden>
                        <input type="text" name="type" value="<?php echo e($items->type); ?>" readonly hidden>
                        <input type="text" name="image" value="<?php echo e($items->image); ?>" readonly hidden>

                        <img src="<?php echo e(asset("uploads/$items->image")); ?>" alt="Similar product image" class="product-img">
                        <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                        <p class="fw-semibold text-center my-2"><?php echo e($items->product); ?></p>
                        <h6 class="py-3"> <?php echo e($items->price . '$'); ?>

                            <span class="ms-3"> <del> <?php echo e($items->delPrice . '$'); ?> </del></span>
                        </h6>
                        <div class="mb-2">
                            <span>
                                <button class="fw-semibold me-5 btn btn-warning buy-link px-3 w-25"> Buy </button>
                                <?php if($items->delPrice == '' || $items->delPrice < $items->price): ?>
                                    <span lass="p-1 smalrounded bg-danger w-25 text-light rounded m-2"></span>
                                <?php else: ?>
                                    <span class="p-1 smalrounded bg-danger w-25 text-light rounded m-2">
                                        <?php echo e(intval((($items->delPrice - $items->price) * 100) / $items->delPrice) . ' % off'); ?>

                                    </span>
                                <?php endif; ?>
                            </span>
                        </div>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.pages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/purchase.blade.php ENDPATH**/ ?>