<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" <?php echo e(asset('Bootstrap/css/bootstrap.css')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('Css/admin.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('Css/animate.min.css')); ?> ">
    <link rel="stylesheet" id="main" href="<?php echo e(asset('Css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="website icon" href="<?php echo e(asset('Img/delivery.png')); ?>">
    <title>Dashboard </title>
    <style>
        .toast-msg {
            position: fixed;
            height: 45px;
            width: 270px;
            top: 75px;
            right: 10px;
            z-index: 20;
        }
    </style>
</head>

<body id="body" class="section-one">
    
    <div class="row fw-semibold pt-4 small section-two container-fluid border-bottom fixed-top">
        <div class="offset-1 col-3">
            <h5 class=""> <a href="/star/delivery" class="logo-link"><span class="bi bi-cart-fill"></span>
                    <span class="small">
                        Star
                    </span>
                </a>
            </h5>
        </div>

        
        <div class="offset-1 col-4 d-block d-md-none">
            <p>
                <a href="/star/delivery/profile" class="text-info bi bi-person-bounding-box">
                    <?php echo e(session('delivery-user')); ?></a>
            </p>
        </div>

        <div class="col-3 d-block d-md-none">
            <p>
                <a class="bi bi-power fw-bold" href="/star/delivery-logout"></a>
            </p>
        </div>

        <div class="col-2 d-none d-md-block">
            <p>
                <a href="/star/delivery/profile">Profile</a>
            </p>
        </div>

        
        <div class="offset-1 col-3 d-none d-md-block">
            <p>
                <a class="text-success bi bi-person-bounding-box"> <?php echo e(session('delivery-user')); ?></a>
            </p>
        </div>
        <div class="col-2 d-none d-md-block">
            <p>
                <a class="bi bi-power fw-bold" href="/star/delivery-logout">
                    Logout</a>
            </p>
        </div>

    </div>

    <div class="container fw-semibold carousel-m">
        <h5 class="border-start border-danger border-5 mb-4"> &nbsp; &nbsp; Delivered Items</h5>

        <div class="mt-4">

            <?php if(session('delivered')): ?>
                <div id="toaster"
                    class="animate__animated animate__fadeInRightBig toast-msg bg-success rounded text-light">
                    <p class="ps-4">
                        <i class="bi bi-check2-circle fs-5 me-3"></i>
                        <span class="small mt-2 ms-2 me-5"> <?php echo e(session('delivered')); ?> </span>
                        <span id="close-toast" class="fs-4 cursor ms-5">&times;</span>
                    </p>
                </div>
            <?php endif; ?>

            <?php if(session('on-road')): ?>
                <div id="toaster"
                    class="animate__animated animate__fadeInRightBig toast-msg bg-danger rounded text-light">
                    <p class="ps-4">
                        <i class="bi bi-bicycle fs-4 me-3"></i>
                        <span class="small mt-2 ms-2 me-5"> <?php echo e(session('on-road')); ?></span>
                        <span id="close-toast" class="fs-4 cursor ms-5">&times;</span>
                    </p>
                </div>
            <?php endif; ?>

            <?php if(count($value) === 0): ?>
                <div class="d-flex justify-content-center mt-5">
                    <img src="<?php echo e(asset('Img/cart-zero (2).png')); ?>" alt="" width="350px"> <br>
                </div>
                <p class="text-center fs-5">There is no Items to be delivered</p>
            <?php else: ?>
                <?php for($i = 0; $i < count($value); $i++): ?>
                    <form action="/star/delivery/status" method="POST" class="mb-4">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="ticket" hidden value="<?php echo e($value[$i]->TicketNo); ?>">
                        <input type="text" name="deliveredBy" hidden value="<?php echo e(session('delivery-user')); ?>">
                        <div class="row justify-content-center rounded border p-4 section-two shadow mt-2">
                            <p class="fs-5 text-light"> <span class="bg-dark rounded py-1 px-3 small">Ticket #
                                    <?php echo e($value[$i]->TicketNo); ?>

                                </span> </p>
                            <?php for($j = 0; $j < count($ticket); $j++): ?>
                                <?php if($ticket[$j] === $value[$i]->TicketNo): ?>
                                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                                        <img src="<?php echo e(asset('uploads/' . $proDetails[$j][0]->image)); ?>" alt=""
                                            class="ms-1" width="150px">
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4 small">
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-mic-fill"> Customer:
                                            </span>
                                            <?php echo e($name[$i]); ?>

                                        </p>
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-envelope-fill"> Email: </span>
                                            <?php echo e($email[$i]); ?>

                                        </p>
                                        <p>

                                            <span class="fs-6 text-secondary bi bi-phone"> Phone: </span>
                                            <?php echo e($phone[$i]); ?>

                                        </p>
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-building"> City: </span>
                                            <?php echo e($city[$i]); ?>

                                        </p>
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-geo-alt-fill"> Address: </span>
                                            <?php echo e($address[$i]); ?>

                                        </p>
                                    </div>
                                    <div class="col-sm-5 col-md-4 col-lg-4 mt-4">
                                        <h6><?php echo e($proDetails[$j][0]->product); ?></h6>
                                        <p>On: <?php echo e(date('D d M Y', strtotime($date[$i]))); ?>

                                        <p>Quantity: <?php echo e($quantity[$j]); ?></p>
                                        <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                        <h6>Payment Verified
                                            <i class="bi bi-check-circle text-primary"></i>
                                        </h6>
                                        <hr>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                            
                            <div class="offset-1 col-6 d-block d-md-none mt-2">
                                <h5>Status</h5>
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <?php if($status[$i] == 0): ?>
                                            <button type="submit" name="submit" value="on-road"
                                                class="stat-btn bg-warning mx-5 px-5 rounded" title="On the Way">
                                                <i class="bi bi-bicycle fs-3 text-light"></i>
                                            </button>
                                        <?php else: ?>
                                            <button class="stat-btn bg-warning mx-5 px-5 rounded load" disabled
                                                title="On the Way">
                                                <i class="on-move bi bi-bicycle fs-3 text-secondary"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" name="submit" value="delivered"
                                            class="stat-btn bg-success px-5 rounded" title="Deliver">
                                            <i class="bi bi-check2-circle fs-3 text-light "></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-1 offset-md-2 col-lg-1 offset-lg-4 d-none d-md-block">
                                <h5 class="pt-2">Status</h5>
                            </div>
                            <div class="offset-md-1 col-md-7 col-lg-6 d-none d-md-block">
                                <?php if($status[$i] == 0): ?>
                                    <button type="submit" name="submit" value="on-road"
                                        class="stat-btn bg-warning mx-5 px-5 rounded" title="On the Way">
                                        <i class="bi bi-bicycle fs-3 text-light"></i>
                                    </button>
                                <?php else: ?>
                                    <button class="stat-btn bg-warning mx-5 px-5 rounded load" disabled
                                        title="On the Way">
                                        <i class="on-move bi bi-bicycle fs-3 text-secondary"></i>
                                    </button>
                                <?php endif; ?>
                                <button type="submit" name="submit" value="delivered"
                                    class="stat-btn bg-success px-5 rounded" title="Deliver">
                                    <i class="bi bi-check2-circle fs-3 text-light "></i>
                                </button>
                            </div>
                        </div>
                    </form>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
<script src="<?php echo e(asset('JS/delivery.js')); ?>"></script>

</html>
<?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/employee/delivery.blade.php ENDPATH**/ ?>