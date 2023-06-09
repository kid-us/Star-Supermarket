<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" <?php echo e(asset('Bootstrap/css/bootstrap.css')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('Css/admin.css')); ?> ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href=" <?php echo e(asset('Css/animate.min.css')); ?> ">
    
    <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
    <link rel="website icon" href="<?php echo e(asset('Img/gear.png')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>

<body>

    <div class="container-fluid fw-semibold">
        <div class="row">
            
            <div class="col-lg-2 d-none d-lg-block text-light p-1 bg-dark sidebar">
                <li class="fs-1 mx-4"> <a href="/admin/dashboard" class="logo-link"><span
                            class="bi bi-cart-fill text-light"></span>
                        <span class="small text-light">
                            Star
                        </span>
                    </a>
                </li>
                <hr>
                <span class="ms-3 my-2">
                    <span class="bi bi-person-circle fs-5"></span> <span class="ms-2 fs-4">
                        <?php echo e(session('admin-user')); ?></span>
                </span>
                <hr>
                <div class="ms-4 mt-4">
                    <p class="mb-4">
                        <a href="/admin/dashboard" class="text-light"> <span
                                class="fs-5 bi bi-speedometer2 me-1"></span>
                            Dashboard</a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/profile" class="text-light"> <span class="fs-5 bi bi-person-fill me-1"></span>
                            Profile</a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/forms" class="text-light"> <span class="fs-5 bi bi-pencil-square me-1"></span>
                            Forms</a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/employee" class="text-light"> <span class="fs-5 bi bi-people me-1"></span>
                            Employees</a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/gallery" class="text-light"> <span class="fs-5 bi bi-images me-1"></span>
                            Gallery</a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/table" class="text-light"> <span class="fs-5 bi bi-table me-1"></span>
                            Table</a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/site-setting" class="text-light"> <span class="fs-5 bi bi-globe me-1"></span>
                            Site Setting</a>
                    </p>

                    <p class="mb-4">
                        <a href="/admin/logout" class="text-light"> <span class="fs-5 bi bi-power me-1"></span> Logout
                        </a>
                    </p>
                </div>
            </div>

            
            <div class="col-md-1 d-none d-md-block d-lg-none text-light p-1 bg-dark sidebar">
                <li class=""> <a href="/admin/dashboard" class="logo-link"><span
                            class="bi bi-cart-fill text-light fs-2"></span>
                        <span class="small text-light">
                            Star
                        </span>
                    </a>
                </li>
                <hr>
                <span class="ms-2 text-center">
                    <span class="bi bi-person-circle"></span> <span class="ms-1 small">
                        <?php echo e(session('admin-user')); ?></span>
                </span>
                </span>
                <hr>
                <div class="ms-3 mt-4">
                    <p class="mb-4">
                        <a href="/admin/dashboard" class="text-light" title="Dashboard"> <span
                                class="fs-5 bi bi-speedometer2 me-1"></span>
                        </a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/profile" class="text-light" title="Profile"> <span
                                class="fs-5 bi bi-person-fill me-1"></span>
                        </a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/forms" class="text-light" title="Forms"> <span
                                class="fs-5 bi bi-pencil-square me-1"></span>
                        </a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/employee" class="text-light" title="Employees"> <span
                                class="fs-5 bi bi-people me-1"></span>
                        </a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/gallery" class="text-light" title="Gallery"> <span
                                class="fs-5 bi bi-images me-1"></span>
                        </a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/table" class="text-light" title="Tables"> <span
                                class="fs-5 bi bi-table me-1"></span>
                        </a>
                    </p>
                    <p class="mb-4">
                        <a href="/admin/logout" class="text-light"> <span class="fs-5 bi bi-power me-1"></span>
                        </a>
                    </p>
                </div>
            </div>

            
            <div class="col-md-1 d-block d-md-none p-1 pt-3 border-bottom">
                <h1 class="mx-2 mb-2 float-end ">
                    <a id="sm-menu-bar" class="bi bi-list cursor"></a>
                </h1>

                <li class="mx-2 mb-2 ps-4 mt-1  text-light float-start">
                    <a href="/admin/dashboard"><span class="bi bi-cart-fill fs-2"></span>
                        <span class="small">Star</span>
                    </a>
                </li>
            </div>

            <div id="sidebar-overlay" class="hidden"></div>

            <div id="small-sidebar" class="hidden sm-sidebar shadow-lg bg-dark p-4">
                <li class="">
                    <a href="/admin/dashboard" class="logo-link"><span
                            class="bi bi-cart-fill text-light fs-2"></span>
                        <span class="small text-light me-5">
                            Star
                        </span>
                    </a>
                    <button id="sidebar-close" class="ms-5 btn-close small"></button>
                </li>
                <hr>
                <span class="me-5">
                    <span class="bi bi-person-circle fs-1"></span> <span class="ms-1 fs-5">
                        <?php echo e(session('admin-user')); ?></span>
                </span>

                <hr class="mb-4">
                <p class="mb-4">
                    <a href="/admin/dashboard" class="text-light"> <span class="fs-5 bi bi-speedometer2 me-1"></span>
                        Dashboard</a>
                </p>
                <p class="mb-4">
                    <a href="/admin/profile" class="text-light"> <span class="fs-5 bi bi-person-fill me-1"></span>
                        Profile</a>
                </p>
                <p class="mb-4">
                    <a href="/admin/forms" class="text-light"> <span class="fs-5 bi bi-pencil-square me-1"></span>
                        Forms</a>
                </p>
                <p class="mb-4">
                    <a href="/admin/employee" class="text-light"> <span class="fs-5 bi bi-people me-1"></span>
                        Employees</a>
                </p>
                <p class="mb-4">
                    <a href="/admin/gallery" class="text-light"> <span class="fs-5 bi bi-images me-1"></span>
                        Gallery</a>
                </p>
                <p class="mb-4">
                    <a href="/admin/table" class="text-light"> <span class="fs-5 bi bi-table me-1"></span>
                        Table</a>
                </p>
                <p class="mb-4">
                    <a href="/admin/logout" class="text-light"> <span class="fs-5 bi bi-power me-1"></span> Logout
                    </a>
                </p>
            </div>

            
            <div class="section-one col-sm-12 col-md-11
                    col-lg-10 d-sm-none d-md-block main">
                
                <div class="section-two p-2 nav-bar border-bottom small d-none d-sm-block">
                    <div class="row">
                        <div class="col-1 small">
                            <span>
                                <i class="bi bi-list fs-5"></i>
                                <a href="/admin/dashboard" class="">Home</a>
                            </span>
                        </div>

                        <div class="offset-2 col-6 mt-1">
                            <form action="/admin/search" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="search-input w-75 small">
                                    <select name="search" class="w-25 bg-dark text-light"
                                        style="border: 0.5px solid grey">
                                        <option value="product">Product
                                        </option>
                                        <option value="ticket">Ticket</option>
                                        <option value="customer">Customer</option>
                                    </select>

                                    <input type="text" name="find"
                                        class="w-50 <?php $__errorArgs = ['find'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        min="3" value="<?php echo e(old('find')); ?>">
                                    <button class="rounded cursor bg-info px-2 text-dark bi bi-search"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                

                
                <?php if(session('name')): ?>
                    <div class="mx-5">
                        <div class="result section-two row justify-content-center shadow rounded p-5">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-5 product-container px-5 mt-5">
                                <img src="<?php echo e(asset('uploads/' . session('image'))); ?>"
                                    class="shadow img-thumbnail img-fluid p-3" alt="" width="200px">
                            </div>

                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-7 small">
                                <h4><?php echo e(session('name')); ?></h4>
                                <p>Category: <?php echo e(session('category')); ?></p>
                                <p> Type: <?php echo e(session('type')); ?></p>
                                <p class="my-3">
                                    <span class="text-secondary">Product No: <?php echo e(session('proNo')); ?></span>
                                    <span class="ms-5">Price: <?php echo e(session('price')); ?>$</span>
                                </p>
                                <p class="small"><?php echo e(session('description')); ?></p>
                                <p> Quantity <?php echo e(session('quant')); ?> </p>
                            </div>
                        </div>
                    </div>
                <?php elseif(session('not-found')): ?>
                    <div class="result section-two p-3">
                        <p class="text-center text-danger"><?php echo e(session('not-found')); ?></p>
                    </div>
                <?php endif; ?>

                
                <?php if(session('ticket')): ?>
                    <div class="mx-5">
                        <div class="result section-two row justify-content-center shadow rounded p-5">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 small">
                                <h4 class="mb-3">Buyer</h4>
                                <p>
                                    <span class="fs-6 text-secondary bi bi-mic-fill"> Name: </span>
                                    <?php echo e(session('buyer-name')); ?>

                                </p>
                                <p>
                                    <span class="fs-6 text-secondary bi bi-envelope-fill"> Email: </span>
                                    <?php echo e(session('buyer-email')); ?>

                                </p>
                                <p>
                                    <span class="fs-6 text-secondary bi bi-flag-fill"> Country: </span>
                                    <?php echo e(session('buyer-country')); ?>

                                </p>
                                <p>
                                    <span class="fs-6 text-secondary bi bi-building"> City: </span>
                                    <?php echo e(session('buyer-city')); ?>

                                </p>
                                <p>
                                    <span class="fs-6 text-secondary bi bi-geo-alt-fill"> Address: </span>
                                    <?php echo e(session('buyer-address')); ?>

                                </p>
                                <p>
                                    <span class="fs-6 text-secondary bi bi-telephone-fill">Phone:</span>
                                    <?php echo e(session('buyer-phone')); ?>

                                </p>
                                <p class="small">Ticket Verified:
                                    <span class="fs-2">

                                        <?php echo e(date('D d M Y', strtotime(session('buyer-date')))); ?>

                                    </span>
                                </p>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h6>Ticket# <?php echo e(session('buyer-ticket-no')); ?></h6>
                                <p>
                                    <span class="fs-1"> <?php echo e(count(session('ticket'))); ?> </span>
                                    Purchased Items
                                </p>
                                <div class="small ps-5">
                                    <h6 class="ps-5"> Product</h6>
                                    <?php $__currentLoopData = session('ticket'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(session('pro')); ?>

                                        <p>
                                            <span> Pro No:
                                                <span class="fs-5"><?php echo e($p->productNo); ?> </span>
                                            </span>
                                            <span> Qty:
                                                <span class="fs-5"><?php echo e($p->quant); ?></span>
                                            </span>
                                        </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <h6>Total Pay:
                                    <span class="fs-3"> <?php echo e(session('buyer-spend')); ?>$</span>
                                </h6>
                                <h6>Delivery status:

                                    <?php if(session('ticket-status') === 0): ?>
                                        <span class="text-success small">Pending...</span>
                                        <span class="text-danger bi bi-hourglass"></span>
                                    <?php elseif(session('ticket-status') === 1): ?>
                                        <span class="text-success small">On the Way</span>
                                        <span class="text-warning bi bi-bicycle"></span>
                                    <?php else: ?>
                                        <span class="text-success small"> Delivered </span>
                                        <span class="text-success bi bi-check2-all"></span>
                                    <?php endif; ?>

                                </h6>
                                <p>Delivered By:
                                    <?php if(session('delivered-by') !== ''): ?>
                                        <span class="text-info small"><?php echo e(session('delivered-by')); ?></span>
                                    <?php else: ?>
                                        <span class="text-info small">Product not Taken by Employees yet!</span>
                                    <?php endif; ?>
                                </p>

                            </div>
                        </div>
                    </div>
                <?php elseif(session('invalid-ticket')): ?>
                    <div class="result section-two p-3">
                        <p class="text-center text-danger"> <?php echo e(session('invalid-ticket')); ?></p>
                    </div>
                <?php endif; ?>

                
                <?php if(session('customer-name')): ?>
                    <div class="mx-5 small result section-two row justify-content-center shadow rounded p-5">
                        <div class="offset-1 col-6 ps-4">
                            <h4 class="mb-3">Customer Information</h4>
                            <p>
                                <span class="fs-6 text-secondary bi bi-mic-fill"> Name: </span>
                                <?php echo e(session('customer-name')); ?>

                            </p>
                            <p>
                                <span class="fs-6 text-secondary bi bi-envelope-fill"> Email: </span>
                                <?php echo e(session('customer-email')); ?>

                            </p>
                            <p>
                                <span class="fs-6 text-secondary bi bi-flag-fill"> Country: </span>
                                <?php echo e(session('customer-country')); ?>

                            </p>
                            <p>
                                <span class="fs-6 text-secondary bi bi-building"> City: </span>
                                <?php echo e(session('customer-city')); ?>

                            </p>
                            <p>
                                <span class="fs-6 text-secondary bi bi-geo-alt-fill"> Address: </span>
                                <?php echo e(session('customer-address')); ?>

                            </p>
                            <p>
                                <span class="fs-6 text-secondary bi bi-telephone-fill">Phone:</span>
                                <?php echo e(session('customer-phone')); ?>

                            </p>
                        </div>
                        <div class="col-5 text-center">
                            <h2 class="w-50 mt-5"> Total Purchase from our store:
                                <span class="fs-1"><?php echo e(session('total')); ?></span>
                            </h2>
                        </div>
                    </div>
                <?php elseif(session('customer-not-found')): ?>
                    <div class="result section-two p-3">
                        <p class="text-center text-danger"> <?php echo e(session('customer-not-found')); ?></p>
                    </div>
                <?php endif; ?>

                <div class="main-content px-1">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
            <div class="section-one col-sm-12 d-none d-sm-block d-md-none">
                <div>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('JS/admin.js')); ?>"></script>
    <script>
        // Admin sidebar script
        const sidebarBtn = document.getElementById("sm-menu-bar");
        const xsSidebarBtn = document.getElementById("sm-menu-bar-sm");
        const sidebarPage = document.getElementById("small-sidebar");
        const sidebarClose = document.getElementById("sidebar-close");
        const sidebarOverlay = document.getElementById("sidebar-overlay");

        sidebarBtn.addEventListener("click", () => {
            if (sidebarPage.classList.contains("hidden")) {
                sidebarPage.classList.remove("hidden");
                sidebarOverlay.classList.remove("hidden");
            }
        })
        sidebarClose.addEventListener("click", () => {
            sidebarPage.classList.add("hidden");
            sidebarOverlay.classList.add("hidden");
        })

        sidebarOverlay.addEventListener("click", function() {
            sidebarPage.classList.add("hidden");
            sidebarOverlay.classList.add("hidden");
        })

        // xsSidebarBtn.addEventListener("click", () => {
        //     console.log("click");
        //     if (sidebarPage.classList.contains("hidden")) {
        //         sidebarPage.classList.remove("hidden");
        //     }
        // })
    </script>
    <script src=" <?php echo e(asset('Bootstrap/js/bootstrap.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Layout/admin.blade.php ENDPATH**/ ?>