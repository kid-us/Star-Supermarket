
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('success')): ?>
        <?php
            $in = Session::get('success');
            echo '<script src="{{ asset(JS / sweetalert2 . all . min . js) }}"></script>';
            echo "<script>
                document.addEventListener('DOMContentLoaded', function(e) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Star Thank you for choosing us!',
                        text: 'Invoice number: $in ',
                        color: 'green',
                        background: '#FCE4EC',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                        // timer: 5500,
                    })
                })
            </script>
            ";
            session()->forget('success');
        ?>
    <?php endif; ?>

    <?php if(Session::has('success')): ?>
        <p id="itemRemover" class="hidden">remove</p>
    <?php endif; ?>

    <div class="container mt-5">

        
        <h5 class="border-start border-5 border-danger"> &nbsp; &nbsp; Top Features
            <span class="small float-end">
                <a id="filter-link" class="cursor small fw-semibold bi bi-filter-square fs-6"> Filters</a>
            </span>
        </h5>

        <div class="my-5">
            <div class="row justify-content-center gy-5">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $top->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="shadow-lg rounded product-container section-two text-center p-1 bg-fff">
                            <?php if($days <= 7): ?>
                                <?php if($top->delPrice == '' || $top->delPrice < $top->price || $top->price == $top->delPrice): ?>
                                    <div class="row my-1 small g-0">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php elseif(intval((($top->delPrice - $top->price) * 100) / $top->delPrice) == 0): ?>
                                    <div class="row my-1 small">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row my-1 small">
                                        <div class="col-6">
                                            <span class="rounded bg-danger w-25 text-light p-1 me-4">
                                                <?php echo e(intval((($top->delPrice - $top->price) * 100) / $top->delPrice) . ' % off'); ?>

                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($top->delPrice == '' || $top->delPrice == 0): ?>
                                    <p class="py-2"></p>
                                <?php else: ?>
                                    <div class="row my-1 samll">
                                        <div class="col-6">
                                            <span class="rounded me-4 bg-danger w-25 text-light p-1">
                                                <?php echo e(intval((($top->delPrice - $top->price) * 100) / $top->delPrice) . ' % off'); ?>

                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <img src="<?php echo e(asset("uploads/$top->image")); ?>" class="mt-2 product-img" alt=""
                                width="170px">
                            <form action="/star/purchase" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="product" value="<?php echo e($top->product); ?>" readonly hidden>
                                <input type="text" name="price" value="<?php echo e($top->price . "$"); ?>" readonly hidden>
                                <input type="text" name="delPrice" value="<?php echo e($top->delPrice . "$"); ?>" readonly hidden>
                                <input type="text" name="product-no" value="<?php echo e($top->productNo); ?>" readonly hidden>
                                <input type="text" name="category" value="<?php echo e($top->category); ?>" readonly hidden>
                                <input type="text" name="info" value="<?php echo e($top->description); ?>" readonly hidden>
                                <input type="text" name="type" value="<?php echo e($top->type); ?>" readonly hidden>
                                <input type="text" name="image" value="<?php echo e($top->image); ?>" readonly hidden>
                                <input type="text" name="quantity" value="<?php echo e($top->quantity); ?>" readonly hidden>

                                <?php if($top->quantity == '0'): ?>
                                    <p class="text-center my-2 text-light bg-danger small">Out of stock</p>
                                    <p class="fw-semibold text-center my-2"><?php echo e($top->product); ?></p>
                                    <?php if($top->delPrice < $top->price || $top->delPrice == ''): ?>
                                        <h6 class="py-2"> <?php echo e($top->price . '$'); ?>

                                            <span class="small"><?php echo e($top->pricePer); ?></span>
                                        </h6>
                                    <?php else: ?>
                                        <h6 class="py-2"> <?php echo e($top->price . '$'); ?>

                                            <span class="small"><?php echo e($top->pricePer); ?></span>
                                            <span class="ms-3"> <del> <?php echo e($top->delPrice . '$'); ?> </del></span>
                                        </h6>
                                    <?php endif; ?>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2" disabled> Buy
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class=" cursor fs-3 bi bi-cart4 disabled">
                                                <span data-name="<?php echo e($top->product); ?>" data-price="<?php echo e($top->price . '$'); ?>"
                                                    data-image="<?php echo e($top->image); ?>" data-added="0"
                                                    data-PN="<?php echo e($top->productNo); ?>" data-quantity="<?php echo e($top->quantity); ?>">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                                    <p class="fw-semibold text-center my-2"><?php echo e($top->product); ?></p>
                                    <?php if($top->delPrice < $top->price || $top->delPrice == ''): ?>
                                        <h6 class="py-2"> <?php echo e($top->price . '$'); ?>

                                            <span class="small"><?php echo e($top->pricePer); ?></span>
                                        </h6>
                                    <?php else: ?>
                                        <h6 class="py-2"> <?php echo e($top->price . '$'); ?>

                                            <span class="small"><?php echo e($top->pricePer); ?></span>
                                            <span class="ms-3"> <del> <?php echo e($top->delPrice . '$'); ?> </del></span>
                                        </h6>
                                    <?php endif; ?>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2"> Buy </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="add-cart cursor fs-3 bi bi-cart4">
                                                <span data-name="<?php echo e($top->product); ?>" data-price="<?php echo e($top->price . '$'); ?>"
                                                    data-image="<?php echo e($top->image); ?>" data-added="0"
                                                    data-PN="<?php echo e($top->productNo); ?>" data-quantity="<?php echo e($top->quantity); ?>">
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

        
        <div class="carousel-inner my-5 rounded shadow" data-aos="zoom-in" data-aos-duration="2000">
            <div class="carousel-item active">
                <?php for($i = 0; $i < count($site); $i++): ?>
                    <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'Advert'): ?>
                        <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="advert-img" alt="...">
                        <div class="carousel-caption text-start cover-slogan">
                            <h4 class="mb-3 bg-primary p-2 rounded shadow"><?php echo e($site[$i]->slogan); ?></h4>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>

        
        <h5 class="border-start border-5 border-danger mt-3"> &nbsp; &nbsp; All Catagories</h5>

        <div class="my-5">
            <div class="row justify-content-center gy-5">
                <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allcatagories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $allcatagories->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="shadow-lg rounded product-container section-two text-center p-1 bg-fff">
                            <?php if($days <= 7): ?>
                                <?php if(
                                    $allcatagories->delPrice == '' ||
                                        $allcatagories->delPrice < $allcatagories->price ||
                                        $allcatagories->price == $allcatagories->delPrice): ?>
                                    <div class="row my-1 small g-0">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php elseif(intval((($allcatagories->delPrice - $allcatagories->price) * 100) / $allcatagories->delPrice) == 0): ?>
                                    <div class="row my-1 small">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row my-1 small">
                                        <div class="col-6">
                                            <span class="rounded bg-danger w-25 text-light p-1 me-4">
                                                <?php echo e(intval((($allcatagories->delPrice - $allcatagories->price) * 100) / $allcatagories->delPrice) . ' % off'); ?>

                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($allcatagories->delPrice == '' || $allcatagories->delPrice == 0): ?>
                                    <p class="py-2"></p>
                                <?php else: ?>
                                    <div class="row my-1 samll">
                                        <div class="col-6">
                                            <span class="rounded me-4 bg-danger w-25 text-light p-1">
                                                <?php echo e(intval((($allcatagories->delPrice - $allcatagories->price) * 100) / $allcatagories->delPrice) . ' % off'); ?>

                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <img src="<?php echo e(asset("uploads/$allcatagories->image")); ?>" class="mt-2 product-img"
                                alt="" width="170px">
                            <form action="/star/purchase" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="product" value="<?php echo e($allcatagories->product); ?>" readonly
                                    hidden>
                                <input type="text" name="price" value="<?php echo e($allcatagories->price . "$"); ?>" readonly
                                    hidden>
                                <input type="text" name="delPrice" value="<?php echo e($allcatagories->delPrice . "$"); ?>"
                                    readonly hidden>
                                <input type="text" name="product-no" value="<?php echo e($allcatagories->productNo); ?>" readonly
                                    hidden>
                                <input type="text" name="category" value="<?php echo e($allcatagories->category); ?>" readonly
                                    hidden>
                                <input type="text" name="info" value="<?php echo e($allcatagories->description); ?>" readonly
                                    hidden>
                                <input type="text" name="type" value="<?php echo e($allcatagories->type); ?>" readonly hidden>
                                <input type="text" name="image" value="<?php echo e($allcatagories->image); ?>" readonly
                                    hidden>
                                <input type="text" name="quantity" value="<?php echo e($allcatagories->quantity); ?>" readonly
                                    hidden>

                                <?php if($allcatagories->quantity == '0'): ?>
                                    <p class="text-center my-2 text-light bg-danger small">Out of stock</p>
                                    <p class="fw-semibold text-center my-2"><?php echo e($allcatagories->product); ?></p>
                                    <?php if($allcatagories->delPrice < $allcatagories->price || $allcatagories->delPrice == ''): ?>
                                        <h6 class="py-2"> <?php echo e($allcatagories->price . '$'); ?>

                                            <span class="small"><?php echo e($allcatagories->pricePer); ?></span>
                                        </h6>
                                    <?php else: ?>
                                        <h6 class="py-2"> <?php echo e($allcatagories->price . '$'); ?>

                                            <span class="small"><?php echo e($allcatagories->pricePer); ?></span>
                                            <span class="ms-3"> <del> <?php echo e($allcatagories->delPrice . '$'); ?> </del></span>
                                        </h6>
                                    <?php endif; ?>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2" disabled> Buy
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class=" cursor fs-3 bi bi-cart4 disabled">
                                                <span data-name="<?php echo e($allcatagories->product); ?>"
                                                    data-price="<?php echo e($allcatagories->price . '$'); ?>"
                                                    data-image="<?php echo e($allcatagories->image); ?>" data-added="0"
                                                    data-PN="<?php echo e($allcatagories->productNo); ?>"
                                                    data-quantity="<?php echo e($allcatagories->quantity); ?>">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                                    <p class="fw-semibold text-center my-2"><?php echo e($allcatagories->product); ?></p>
                                    <?php if($allcatagories->delPrice < $allcatagories->price || $allcatagories->delPrice == ''): ?>
                                        <h6 class="py-2"> <?php echo e($allcatagories->price . '$'); ?>

                                            <span class="small"><?php echo e($allcatagories->pricePer); ?></span>
                                        </h6>
                                    <?php else: ?>
                                        <h6 class="py-2"> <?php echo e($allcatagories->price . '$'); ?>

                                            <span class="small"><?php echo e($allcatagories->pricePer); ?></span>
                                            <span class="ms-3"> <del> <?php echo e($allcatagories->delPrice . '$'); ?> </del></span>
                                        </h6>
                                    <?php endif; ?>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2"> Buy </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="add-cart cursor fs-3 bi bi-cart4">
                                                <span data-name="<?php echo e($allcatagories->product); ?>"
                                                    data-price="<?php echo e($allcatagories->price . '$'); ?>"
                                                    data-image="<?php echo e($allcatagories->image); ?>" data-added="0"
                                                    data-PN="<?php echo e($allcatagories->productNo); ?>"
                                                    data-quantity="<?php echo e($allcatagories->quantity); ?>">
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

        
        <div class="row justify-content-center gx-4 p-3 mt-5 fw-semibold" data-aos="zoom-in">
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-5 ad">
                            <h3 class="mt-3"><span class="bi bi-truck mt-5"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>Delivery</h6>
                            <p>Anywhere</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-6 ad">
                            <h3 class="mt-3"><span class="bi bi-arrow-left-right"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>Returns</h6>
                            <p>Free Exchange</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-6 ad">
                            <h3 class="mt-3"><span class="bi bi-telephone-inbound"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>Helpline</h6>
                            <p>+25199221212</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-6 ad">
                            <h3 class="mt-3"><span class="bi bi-fullscreen"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>24x7</h6>
                            <p>Always</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kid_us\Desktop\HostingSupermarket\Supermarket\resources\views/Pages/index.blade.php ENDPATH**/ ?>