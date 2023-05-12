
<?php $__env->startSection('title', 'Site-Setting'); ?>
<?php $__env->startSection('content'); ?>
    <div class="my-5">
        <h5 class="border-start border-danger border-5 mb-4"> &nbsp; &nbsp; Site Setting</h5>

        
        <div class="section-two py-3">
            <h5 class="ps-3"> Currrent Setting</h5>
            <div id="carousel" class="container carousel-m">
                <div id="carouselExampleCaptions" class="carousel slide mt-4 carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $site; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="<?php echo e(asset("site/$info->image")); ?>" class="site-img"
                                        alt="Website Looking Image">
                                    <div class="carousel-caption ">
                                        <h3 class="h2 text-light bg-primary rounded"><?php echo e($info->slogan); ?></h3>
                                        <p class="text-light bg-primary rounded">Website Looking of <?php echo e($info->imageFor); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="carousel-item" data-bs-interval="10000">
                                    <img src="<?php echo e(asset("site/$info->image")); ?>" class="site-img"
                                        alt="Website Looking Image">
                                    <div class="carousel-caption ">
                                        <h3 class="h2 text-light bg-primary rounded"> <?php echo e($info->slogan); ?></h3>
                                        <p class="text-light bg-primary rounded">Website Looking of <?php echo e($info->imageFor); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="bi bi-caret-left-square-fill text-danger" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="bi bi-caret-right-square-fill text-primary" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>

    </div>
    
    <div class="section-two small">
        <h5 class="p-4">Image</h5>
        <form action="/admin/site" method="POST" class="p-4" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row justify-content-center rounded">
                <?php if($message = Session::get('uploaded')): ?>
                    <p class="bg-success text-light p-2 text-center fw-semibold">
                        <strong><?php echo e($message); ?></strong>
                    </p>
                <?php endif; ?>

                <div class="section-two col-xs-12 col-sm-9 col-md-5 col-lg-4 small">
                    <h6>Site Setting Form</h6>

                    <label for="imageFor">Image For *</label>
                    <select name="imageFor" id="imageFor"
                        class="form-control mb-3 <?php $__errorArgs = ['imageFor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option selected hidden></option>
                        <option value="Website">Website</option>
                        <option value="Advert">Advert</option>
                        <option value="Foods">Food</option>
                        <option value="Beverage">Beverage</option>
                        <option value="Furnitures">Furnitures</option>
                        <option value="Electronics">Electronics</option>
                        <option value="DairyEgg">Dairy & Egg</option>
                        <option value="FruitsVegetables">Fruits & Vegetables</option>
                        <option value="MeatFish">Meat & Fish</option>
                        <option value="HealthBeauty">Health & Beauty</option>
                        <option value="HouseCleaners">Household & Cleaners</option>
                    </select>

                    <label for="image">Site Image *</label>
                    <input type="file" id="site-image" name="siteImage"
                        class="form-control mb-3 <?php $__errorArgs = ['siteImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('siteImage')); ?>" onchange="previewFile()">
                    <button type="submit" name="submit" value="upload"
                        class="m-4
                        btn btn-success w-100 p-2">Upload</button>
                </div>

                <div class="section-two col-xs-12 col-sm-9 col-md-4 col-lg-7 small">
                    <h6>Website Looking</h6>
                    <img id="view-site-image" alt="" class="site-img-preview rounded mt-4">
                </div>

            </div>
        </form>
    </div>

    
    <div class="section-two small mt-3">
        <form action="/admin/site" method="POST" class="p-4">
            <?php echo csrf_field(); ?>
            <?php if($message = Session::get('slogan')): ?>
                <p class="bg-success text-light p-2 text-center fw-semibold">
                    <strong><?php echo e($message); ?></strong>
                </p>
            <?php endif; ?>
            <h5 class="">Slogan</h5>
            <div class="p-4">
                <label for="catagories">Slogan For *</label>
                <select name="sloganFor" id="sloganFor"
                    class="form-control w-50 mb-3 <?php $__errorArgs = ['sloganFor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option selected hidden></option>
                    <option value="Website">Website</option>
                    <option value="Advert">Advert</option>
                    <option value="Foods">Food</option>
                    <option value="Beverage">Beverage</option>
                    <option value="Furnitures">Furnitures</option>
                    <option value="Electronics">Electronics</option>
                    <option value="DairyEgg">Dairy & Egg</option>
                    <option value="FruitsVegetables">Fruits & Vegetables</option>
                    <option value="MeatFish">Meat & Fish</option>
                    <option value="HealthBeauty">Health & Beauty</option>
                    <option value="HouseCleaners">Household & Cleaners</option>
                </select>

                <label for="quantity">Product Description *</label>
                <textarea name="slogan" id="slogan" rows="5"
                    class="form-control  mb-3 small fw-semibold <?php $__errorArgs = ['slogan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    value="<?php echo e(old('slogan')); ?>" style="resize: none" maxlength="255"></textarea>
                <button type="submit" name="submit" value="sloganBtn"
                    class="btn btn-success w-75 p-2 mt-2">Submit</button>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/admin/site.blade.php ENDPATH**/ ?>