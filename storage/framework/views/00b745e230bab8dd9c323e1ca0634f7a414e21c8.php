
<?php $__env->startSection('mytitle', 'Health & Beauty'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div id="carousel" class="image carousel-m">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'HealthBeauty'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <h5 class="border-start border-5 border-danger mt-5">&nbsp; &nbsp; Health & Beauty
            <span class="small float-end">
                <a id="filter-link" class="cursor small fw-semibold bi bi-filter-square fs-6"> Filters</a>
            </span>
        </h5>

        <div class="my-5">
            <div class="row justify-content-center gy-5">
                <?php $__currentLoopData = $bh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $bhs->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="shadow-lg rounded product-container section-two text-center p-1 bg-fff">
                            <?php if($days <= 7): ?>
                                <?php if($bhs->delPrice == '' || $bhs->delPrice < $bhs->price || $bhs->price == $bhs->delPrice): ?>
                                    <div class="row my-1 small g-0">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php elseif(intval((($bhs->delPrice - $bhs->price) * 100) / $bhs->delPrice) == 0): ?>
                                    <div class="row my-1 small">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row my-1 small">
                                        <div class="col-6">
                                            <span class="rounded bg-danger w-25 text-light p-1 me-4">
                                                <?php echo e(intval((($bhs->delPrice - $bhs->price) * 100) / $bhs->delPrice) . ' % off'); ?>

                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($bhs->delPrice == '' || $bhs->delPrice == 0): ?>
                                    <p class="py-2"></p>
                                <?php else: ?>
                                    <div class="row my-1 samll">
                                        <div class="col-6">
                                            <span class="rounded me-4 bg-danger w-25 text-light p-1">
                                                <?php echo e(intval((($bhs->delPrice - $bhs->price) * 100) / $bhs->delPrice) . ' % off'); ?>

                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <img src="<?php echo e(asset("uploads/$bhs->image")); ?>" class="mt-2 product-img" alt=""
                                width="170px">
                            <form action="/star/purchase" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="product" value="<?php echo e($bhs->product); ?>" readonly hidden>
                                <input type="text" name="price" value="<?php echo e($bhs->price . "$"); ?>" readonly hidden>
                                <input type="text" name="delPrice" value="<?php echo e($bhs->delPrice . "$"); ?>" readonly hidden>
                                <input type="text" name="product-no" value="<?php echo e($bhs->productNo); ?>" readonly hidden>
                                <input type="text" name="category" value="<?php echo e($bhs->category); ?>" readonly hidden>
                                <input type="text" name="info" value="<?php echo e($bhs->description); ?>" readonly hidden>
                                <input type="text" name="type" value="<?php echo e($bhs->type); ?>" readonly hidden>
                                <input type="text" name="image" value="<?php echo e($bhs->image); ?>" readonly hidden>
                                <input type="text" name="quantity" value="<?php echo e($bhs->quantity); ?>" readonly hidden>

                                <?php if($bhs->quantity == '0'): ?>
                                    <p class="text-center my-2 text-light bg-danger small">Out of stock</p>
                                    <p class="fw-semibold text-center my-2"><?php echo e($bhs->product); ?></p>

                                    <?php if($bhs->delPrice < $bhs->price || $bhs->delPrice == ''): ?>
                                        <h6 class="py-2"> <?php echo e($bhs->price . '$'); ?>

                                            <span class="small"><?php echo e($bhs->pricePer); ?></span>
                                        </h6>
                                    <?php else: ?>
                                        <h6 class="py-2"> <?php echo e($bhs->price . '$'); ?>

                                            <span class="small"><?php echo e($bhs->pricePer); ?></span>
                                            <span class="ms-3"> <del> <?php echo e($bhs->delPrice . '$'); ?> </del></span>
                                        </h6>
                                    <?php endif; ?>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2" disabled> Buy
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class=" cursor fs-3 bi bi-cart4 disabled">
                                                <span data-name="<?php echo e($bhs->product); ?>" data-price="<?php echo e($bhs->price . '$'); ?>"
                                                    data-image="<?php echo e($bhs->image); ?>" data-added="0"
                                                    data-PN="<?php echo e($bhs->productNo); ?>" data-quantity="<?php echo e($bhs->quantity); ?>">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                                    <p class="fw-semibold text-center my-2"><?php echo e($bhs->product); ?></p>
                                    
                                    <?php if($bhs->delPrice < $bhs->price || $bhs->delPrice == ''): ?>
                                        <h6 class="py-2"> <?php echo e($bhs->price . '$'); ?>

                                            <span class="small"><?php echo e($bhs->pricePer); ?></span>
                                        </h6>
                                    <?php else: ?>
                                        <h6 class="py-2"> <?php echo e($bhs->price . '$'); ?>

                                            <span class="small"><?php echo e($bhs->pricePer); ?></span>
                                            <span class="ms-3"> <del> <?php echo e($bhs->delPrice . '$'); ?> </del></span>
                                        </h6>
                                    <?php endif; ?>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2"> Buy </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="add-cart cursor fs-3 bi bi-cart4">
                                                <span data-name="<?php echo e($bhs->product); ?>"
                                                    data-price="<?php echo e($bhs->price . '$'); ?>"
                                                    data-image="<?php echo e($bhs->image); ?>" data-added="0"
                                                    data-PN="<?php echo e($bhs->productNo); ?>"
                                                    data-quantity="<?php echo e($bhs->quantity); ?>">
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
        <?php echo e($bh->links('Pages.paginator', ['elements' => $bh, 'tot' => $pages])); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.pages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/health.blade.php ENDPATH**/ ?>