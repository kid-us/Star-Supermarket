
<?php $__env->startSection('title', 'Forms'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mt-4">
        <h5 id="form-Page" class="border-start border-danger border-5 mb-4"> &nbsp; &nbsp; Forms</h5>

        
        <form action="/admin/upload" method="POST" class="rounded shadow p-4 section-two small" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="row justify-content-center rounded">
                <?php if(session('success')): ?>
                    <p class="bg-success text-light p-2 text-center fw-semibold">
                        <strong><?php echo e(session('success')); ?></strong>
                    </p>
                <?php endif; ?>

                <h5 class="py-2 px-4">Upload New Products</h5>
                <div class="section-two col-xs-12 col-sm-9 col-md-4 col-lg-4 small p-4">

                    <label for="item-name">Product Name *</label>
                    <input type="text" name="item-name" id="product-name"
                        class="form-control mb-3 <?php $__errorArgs = ['item-name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('item-name')); ?>">

                    <label for="catagories">Catagories *</label>
                    <select name="catagories" id="category"
                        class="form-control mb-3 <?php $__errorArgs = ['catagories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option selected hidden></option>
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
                    <label id="type-label" for="product-type" class="hidden">Product Type *</label>

                    <select name="type" id="vg"
                        class="form-control mb-3 hidden <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('type')); ?>" disabled>
                        <option selected hidden></option>
                        <option value="fruit">Fruit</option>
                        <option value="vegetable">Vegetable</option>
                    </select>

                    <select name="type" id="beverage"
                        class="form-control mb-3 hidden <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('type')); ?>" disabled>
                        <option selected hidden></option>
                        <option value="wine">Wine</option>
                        <option value="vodka">Vodka</option>
                        <option value="beer">Beer</option>
                        <option value="soft">Soft</option>
                        <option value="water">Water</option>
                        <option value="energy">Energy</option>
                        <option value="whiskey">Whiskey</option>
                        <option value="champagne">Champagne</option>
                    </select>

                    <select name="type" id="meat"
                        class="form-control mb-3 hidden <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('type')); ?>" disabled>
                        <option selected hidden></option>
                        <option value="chicken">Chicken</option>
                        <option value="fish">Fish</option>
                    </select>
                    <select name="type" id="electronic"
                        class="form-control mb-3 hidden <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('type')); ?>" disabled>
                        <option selected hidden></option>
                        <option value="camera">Camera</option>
                        <option value="mobile">Mobile</option>
                        <option value="laptop">Laptop</option>
                        <option value="tablet">Tablet</option>
                        <option value="gaming">Gaming</option>
                        <option value="tv">Televison</option>
                        <option value="accessories">Accessories</option>
                    </select>

                    <select name="type" id="food"
                        class="form-control mb-3 hidden <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('type')); ?>" disabled>
                        <option selected hidden></option>
                        <option value="bread">Bread</option>
                        <option value="snack">Snack</option>
                    </select>

                    <label for="price">Price Per</label>
                    <input type="text" name="price-per" id="price-per"
                        class="form-control mb-3 <?php $__errorArgs = ['price-per'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('price-per')); ?>">

                    <label for="price">Price *</label>
                    <input type="number" name="price" id="price" min="1"
                        class="form-control mb-3 <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            border-error
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('price')); ?>">

                    <label for="deleted-price">Deleted Price</label>
                    <input type="number" name="del-price" id="del-price" min="1"
                        class="form-control mb-3 <?php $__errorArgs = ['del-price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            border-error
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('del-price')); ?>">
                    
                </div>

                <div class="section-two col-xs-12 col-sm-9 col-md-4 col-lg-4 pt-4 small">
                    <label for="quantity">Quantity *</label>
                    <input type="number" name="quantity" min="1" id="quantity"
                        class="form-control mb-3 <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('quantity')); ?>">

                    <label for="quantity">Product Description *</label>
                    <textarea name="info" id="info" rows="8"
                        class="form-control  mb-3 small fw-semibold <?php $__errorArgs = ['info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('info')); ?>" style="resize: none" maxlength="255"></textarea>
                    <?php $__errorArgs = ['info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger small"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <label for="image">Product Image *</label>
                    <input type="file" id="product-image" name="image"
                        class="form-control mb-3 <?php $__errorArgs = ['img-file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('image')); ?>" onchange="previewFile()">
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger small"><?php echo e($message); ?> <a class="small text-primary" target="_blank"
                                href="https://remove.bg">Make your
                                picture PNG
                                here</a> </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <div class="section-two col-xs-12 col-sm-9 col-md-4 col-lg-4 py-4 px-4 rounded ">
                    <h6>Website Looking</h6>
                    <div class="shadow rounded product-container text-center p-1 bg-dark text-light">
                        <p id="view-off" class="small rounded bg-danger w-25 text-light m-1"></p>
                        <img id="view-image" alt="" width="140px">
                        <p id="available" class="text-center my-3 text-secondary small">Available (in stock)</p>
                        <p id="view-name" class="fw-semibold text-center mt-2"></p>
                        <p class="small" id="view-per-price"></p>
                        <h5 class="p-1">
                            <span id="view-price"></span>
                            <span class="ms-3"> <del id="view-del-price"></del></span>
                        </h5>
                    </div>
                    <button class="mt-4 btn btn-success w-50 p-2">Upload</button>

                </div>
            </div>
        </form>

        
        <div class="section-two row justify-content-center mt-5 m-1 shadow rounded px-3 mb-5">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 mt-4 mb-2">
                <h5 class="py-2 px-4">Update Products</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 mt-4 mb-2">
                <input type="search" id="searchInput" class="form-control w-75 d-none d-md-block"
                    placeholder="Enter keywords">
                <input type="search" id="searchSmInput" class="form-control w-75 d-block d-md-none"
                    placeholder="Enter keywords">
            </div>

            
            <div id="updateContainer" class="d-none d-md-block update-shadow p-2 mb-5">
                <?php if(session('updated')): ?>
                    <p class="text-center small text-light rounded bg-success p-2"> <?php echo e(session('updated')); ?> </p>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <p class="text-center bg-danger p-2"> <?php echo e(session('error')); ?> </p>
                <?php endif; ?>

                <?php if(session('deleted')): ?>
                    <p class="text-center small text-light rounded bg-success p-2"> <?php echo e(session('deleted')); ?> </p>
                <?php endif; ?>

                <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/change" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="col-12 px-5">
                            <div class="d-flex mb-3 mt-3">
                                <fieldset class="fieldset<?php echo e($update->id); ?> d-flex" disabled>
                                    <input type="text" name="productNo" value="<?php echo e($update->productNo); ?>" hidden>

                                    <div class="form-floating">
                                        <input type="text" name="editProduct"
                                            class="form-control ms-2 <?php $__errorArgs = ['editProduct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="floatingProduct" value="<?php echo e($update->product); ?>">
                                        <label for="floatingProduct" class="text-primary">Product</label>
                                        <?php $__errorArgs = ['editProduct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="small text-danger">Already exists</small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-floating w-25">
                                        <input type="number" name="editPrice"
                                            class="form-control ms-2 <?php $__errorArgs = ['editPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="floatingPrice" value="<?php echo e($update->price); ?>" min="1">
                                        <label for="floatingPrice" class="text-primary">Price</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="number" name="editDelPrice"
                                            class="form-control ms-2 <?php $__errorArgs = ['editDelPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="floatingDelPrice" value="<?php echo e($update->delPrice); ?>" min="1">
                                        <label for="floatingDelPrice" class="text-primary">Deleted Price</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="text" name="editPricePer"
                                            class="form-control ms-2 <?php $__errorArgs = ['editPricePer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="floatingPricePer" value="<?php echo e($update->pricePer); ?>">
                                        <label for="floatingDelPrice" class="text-primary">Price per</label>
                                    </div>


                                    <div class="form-floating">
                                        <input type="number" name="editQuantity"
                                            class="form-control ms-2 <?php $__errorArgs = ['editQuantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="floatingQuantity" value="<?php echo e($update->quantity); ?>" min="1">
                                        <label for="floatingQuantity" class="text-primary">Quantity</label>
                                    </div>

                                </fieldset>
                                <a class="edit-btn btn bi bi-pencil bg-warning text-light pt-3"
                                    data-num="<?php echo e($update->id); ?>"></a>

                                <button name="del"
                                    class="del-product delete-btn<?php echo e($update->id); ?> btn bi bi-trash bg-danger text-light"
                                    data-num="<?php echo e($update->id); ?>"></button>

                                <button name="submit"
                                    class="submit-btn<?php echo e($update->id); ?> btn bi bi-arrow-return-right bg-success text-light hidden"></button>

                                <a class="close-btn clsBtn<?php echo e($update->id); ?> btn bi bi-x bg-secondary text-light pt-3 hidden"
                                    data-num="<?php echo e($update->id); ?>"></a>
                            </div>
                        </div>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div id="smUpdateContainer" class="d-block d-md-none">
                <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/admin/change" method="POST" class="border p-3 mb-3 rounded shadow">
                        <?php echo csrf_field(); ?>

                        <fieldset class="fieldset<?php echo e($update->id); ?> d-flex" disabled>
                            <div class="col-6">

                                <input type="text" name="productNo" value="<?php echo e($update->productNo); ?>" hidden>
                                <div class="form-floating mb-3">
                                    <input type="text" name="editProduct"
                                        class="form-control ms-2 <?php $__errorArgs = ['editProduct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                border-error
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="floatingInput" value="<?php echo e($update->product); ?>">
                                    <label for="floatingInput" class="text-primary">Product</label>
                                    <?php $__errorArgs = ['editProduct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger">Product name already exists</small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" name="editPrice"
                                        class="form-control ms-2 <?php $__errorArgs = ['editPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="floatingInput" value="<?php echo e($update->price); ?>" min="1">
                                    <label for="floatingInput" class="text-primary">Price</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="editDelPrice"
                                        class="form-control ms-2 <?php $__errorArgs = ['editDelPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                border-error
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="floatingInput" value="<?php echo e($update->delPrice); ?>" min="1">
                                    <label for="floatingInput" class="text-primary">Deleted Price</label>
                                </div>

                            </div>
                            <div class="col-6">

                                <div class="form-floating mb-3">
                                    <input type="number" name="editQuantity"
                                        class="form-control ms-2 <?php $__errorArgs = ['editQuantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="floatingInput" value="<?php echo e($update->quantity); ?>" min="1">
                                    <label for="floatingInput" class="text-primary">Quantity</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="editPricePer"
                                        class="form-control ms-2 <?php $__errorArgs = ['editPricePer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="floatingInput">
                                    <label for="floatingInput" class="text-primary">Price Per</label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-12">
                            <a class="edit-btn btn bi bi-pencil bg-warning text-light w-25"
                                data-num="<?php echo e($update->id); ?>"></a>

                            <button name="delete"
                                class="del-product delete-btn<?php echo e($update->id); ?> btn bi bi-trash bg-danger text-light w-25"
                                data-num="<?php echo e($update->id); ?>"></button>
                        </div>
                        <div class="col-12">
                            <button name="submit"
                                class="submit-btn<?php echo e($update->id); ?> btn bi bi-arrow-return-right bg-success text-light hidden w-25"></button>

                            <a class="close-btn clsBtn<?php echo e($update->id); ?> btn bi bi-x bg-secondary text-light hidden 25"
                                data-num="<?php echo e($update->id); ?>"></a>

                        </div>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/admin/forms.blade.php ENDPATH**/ ?>