<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('Bootstrap/css/bootstrap.css')); ?>">
    <link rel="stylesheet" id="main" href="<?php echo e(asset('Css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>

    
    <link rel="stylesheet" href=" <?php echo e(asset('Css/countrySelect.css')); ?> ">

    <link rel="website icon" href="<?php echo e(asset('Img/shopping-bag.png')); ?>">

</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .multiple-payment {
        height: 380px;
        overflow: scroll;
    }
</style>
<title>Payment - Star</title>
</head>

<body class="section-one">
    <div class="container fw-semibold p-5 mt-2">
        <div class="row justify-content-center py-2">
            <?php
                $stat = Session::get('status');
            ?>
            <?php if($stat == 'single'): ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 px-3">
                    <h3 class=""><a href="/star" class="bi bi-cart-fill small fw-semibold">&nbsp; Star</a></h3>
                    <p class="mt-4 mb-0 fs-3"><?php echo e(Session::get('item')[0]['Item-name']); ?></p>
                    <p class="small">Delivery Charge 10$</p>
                    <h4 class="fs-2"> Total
                        <?php echo e(intval(Session::get('item')[0]['Item-price']) * Session::get('item')[0]['quant'] + 10 . " US$"); ?>

                    </h4>
                    <li class="my-0">Qty <span class="small"><?php echo e(Session::get('item')[0]['quant']); ?></span>
                        <?php echo e(Session::get('item')[0]['Item-price']); ?>.00 US$ each</li>
                    <img src="<?php echo e(asset('uploads/' . Session::get('item')[0]['Item-image'])); ?>" alt=""
                        class="img-fluid pb-5" width="250px" class="section-two rounded">
                    <ul class="small">
                        <li class="pt-3">Powered by <span class="">stripe</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 rounded shadow section-two">
                    <?php
                        $tot = intval(Session::get('item')[0]['Item-price']) * intval(Session::get('item')[0]['quant']) + 10;
                    ?>
                    <form action="/star/pay" method="POST" id="form" class="py-5 px-5 small"
                        data-cc-on-file="false" data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>" id="payment-form">
                        <?php echo csrf_field(); ?>
                        <p class="fs-4">Pay with card</p>

                        <?php if(session('user-name')): ?>
                            <label for="name" class="small">Name on Card</label>
                            <input type="text" name="buyerName"
                                class=" form-control mt-1 mb-3 <?php $__errorArgs = ['buyerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(session('user-name')); ?>">

                            <label for="email" class="small">Email</label>
                            <input type="email" name="buyerEmail"
                                class="form-control mb-3  <?php $__errorArgs = ['buyerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(session('user-email')); ?>">
                            <label for="email" class="small">Card Information</label>
                            <input type="tel" readonly id="card-number" name="card-number"
                                class=" form-control mt-1  <?php $__errorArgs = ['card-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="4242424242424242">

                            <div class="input-group mb-4">
                                <input type="tel" name="expire-month" id="exp_mon" size="2"
                                    class="form-control mt-0 small <?php $__errorArgs = ['expire-month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="12" readonly>
                                <input type="tel" name="expire-year" size="4" id="exp_year"
                                    class="form-control mt-0 small <?php $__errorArgs = ['expire-year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="2028" size="3" readonly>
                                <input type="number" name="card-code" id="cvc"
                                    class="form-control mt-0 small <?php $__errorArgs = ['card-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="123" readonly>
                            </div>

                            <label for="phone" class="small me-2 pe-1">Phone</label>
                            <input type="tel" id="phone-flag" name="phone"
                                class="form-control mb-1 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                style="z-index: 0;"><br>

                            <label for="country" class="small mt-4 me-3">Country</label>
                            <input type="text" id="country" name="country"
                                class="small form-control mt-1 mb-2 <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(session('user-country')); ?>">

                            <br> <br>

                            <label for="city" class="small mt-2 me-3">City</label>
                            <input type="text" name="city"
                                class="small form-control mt-1 mb-2 <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(session('user-city')); ?>">

                            <label for="address" class="small mt-2 me-3">Address</label>
                            <input type="text" name="address"
                                class="small form-control mt-1 mb-2 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(session('user-address')); ?>">
                        <?php else: ?>
                            <label for="name" class="small">Name on Card</label>
                            <input type="text" name="buyerName"
                                class=" form-control mt-1 mb-3 <?php $__errorArgs = ['buyerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('buyerName')); ?>">

                            <label for="email" class="small">Email</label>
                            <input type="email" name="buyerEmail"
                                class="form-control mb-3  <?php $__errorArgs = ['buyerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('buyerEmail')); ?>">
                            <label for="email" class="small">Card Information</label>
                            <input type="tel" readonly id="card-number" name="card-number"
                                class=" form-control mt-1  <?php $__errorArgs = ['card-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="4242424242424242">

                            <div class="input-group mb-4">
                                <input type="tel" name="expire-month" id="exp_mon" size="2"
                                    class="form-control mt-0 small <?php $__errorArgs = ['expire-month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="12" readonly>
                                <input type="tel" name="expire-year" size="4" id="exp_year"
                                    class="form-control mt-0 small <?php $__errorArgs = ['expire-year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="2028" size="3" readonly>
                                <input type="number" name="card-code" id="cvc"
                                    class="form-control mt-0 small <?php $__errorArgs = ['card-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="123" readonly>
                            </div>

                            <label for="phone" class="small me-2 pe-1">Phone</label>
                            <input type="tel" id="phone-flag" name="phone"
                                class="form-control mb-1 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                style="z-index: 0;"><br>

                            <label for="country" class="small mt-4 me-4">Country</label>
                            <input type="text" id="country" name="country"
                                class="small form-control mt-2 mb-3 <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                 border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                            <br><br>
                            <label for="country" class="small mt-2 me-3">City</label>
                            <input type="text" name="city"
                                class="small form-control mt-1 mb-2 <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                            <label for="country" class="small me-3 mt-2">Address</label>
                            <input type="text" name="address"
                                class="small form-control mt-2 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php endif; ?>

                        <input type="text" name="price"
                            value="<?php echo e(intval(Session::get('item')[0]['Item-price']) * Session::get('item')[0]['quant'] + 10 . " $"); ?>"
                            readonly hidden>
                        <input type="number" name="quantity" value="<?php echo e(Session::get('item')[0]['quant']); ?>"
                            readonly hidden>
                        <input type="number" name="proNo" value="<?php echo e(Session::get('item')[0]['Item-productNo']); ?>"
                            readonly hidden>
                        <input type="text" id="stripeToken" name="stripeToken" hidden>

                        <input type="text" name="totalPrice" hidden value="<?php echo e($tot); ?>">

                        <button class="btn btn-primary w-100 mt-4">Pay</button>
                    </form>
                </div>

                
            <?php else: ?>
                
                <?php if(Session::get('multiple_item')[0]['Item-length'] == '1'): ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 px-5">
                        <h5 class=""><a href="/star" class="bi bi-cart-fill small fw-semibold">&nbsp;
                                Star</a></h5>
                        <p class="mt-4 mb-0 fs-3"><?php echo e(Session::get('multiple_item')[0]['Item-name'][0]); ?></p>
                        <p class="small">Delivery Charge 10$</p>
                        <h4 class="fs-2">Total
                            <?php echo e(intval(Session::get('multiple_item')[0]['Item-price'][0]) * Session::get('multiple_item')[0]['Item-quant'][0] + 10 . "US$"); ?>

                        </h4>
                        <li class="my-0">Qty <span><?php echo e(Session::get('multiple_item')[0]['Item-quant'][0]); ?></span>
                            US
                            <?php echo e(Session::get('multiple_item')[0]['Item-price'][0]); ?>.00 each
                        </li>
                        <img src="<?php echo e(asset('uploads/' . Session::get('multiple_item')[0]['Item-image'][0])); ?>"
                            alt="" class="img-fluid pb-5" width="270px" class="section-two">
                        <ul class="mt-5 small">
                            <li class="pt-3">Powered by <span class="">stripe</span></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 rounded section-two shadow">
                        <?php
                            $tot = intval(Session::get('multiple_item')[0]['Item-price'][0]) * Session::get('multiple_item')[0]['Item-quant'][0] + 10;
                        ?>
                        <form action="/star/pay" method="POST" id="form" class="py-4 px-5 small"
                            data-cc-on-file="false" data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>"
                            id="payment-form">
                            <?php echo csrf_field(); ?>
                            <p class="fs-4">Pay with card</p>

                            <?php if(session('user-name')): ?>
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 <?php $__errorArgs = ['buyerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-name')); ?>">

                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mb-3  <?php $__errorArgs = ['buyerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-email')); ?>">

                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1  <?php $__errorArgs = ['card-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="4242424242424242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="12" readonly>
                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small <?php $__errorArgs = ['card-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="123" readonly>
                                </div>
                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class="form-control mb-1 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    style="z-index: 0;"><br>

                                <label for="country" class="small mt-4 me-3">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-country')); ?>">
                                <br><br>
                                <label for="city" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-city')); ?>">

                                <label for="address" class="small mt-2 me-3">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-address')); ?>">
                            <?php else: ?>
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 <?php $__errorArgs = ['buyerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('buyerName')); ?>">

                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mb-3  <?php $__errorArgs = ['buyerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('buyerEmail')); ?>">
                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1  <?php $__errorArgs = ['card-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="4242424242424242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="12" readonly>
                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small <?php $__errorArgs = ['card-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="123" readonly>
                                </div>
                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class="form-control mb-1 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    style="z-index: 0;"><br>

                                <label for="country" class="small me-4">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-2 mb-3 <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                         border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                <label for="country" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                <label for="country" class="small me-3 mt-2">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-2 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php endif; ?>

                            <input type="text" name="price"
                                value="<?php echo e(intval(Session::get('multiple_item')[0]['Item-price'][0]) * Session::get('multiple_item')[0]['Item-quant'][0] + 10 . " $"); ?>"
                                readonly hidden>
                            <input type="number" name="quantity"
                                value="<?php echo e(Session::get('multiple_item')[0]['Item-quant'][0]); ?>" readonly hidden>
                            <input type="number" name="proNo"
                                value="<?php echo e(Session::get('multiple_item')[0]['Item-productNo'][0]); ?>" readonly hidden>
                            <input type="text" id="stripeToken" name="stripeToken" hidden>

                            <input type="text" name="totalPrice" hidden value="<?php echo e($tot); ?>">
                            <button class="btn btn-primary w-100 mt-4">Pay</button>
                        </form>
                    </div>
                    
                <?php else: ?>
                    <div class="col-12 col-md-12 col-lg-6 py-5 px-5 fw-semibold">
                        <h5 class=""><a href="/star" class="bi bi-cart-fill small fs-5 fw-semibold">&nbsp;
                                Star</a></h5>
                        <p class="mt-4 mb-0">Multiple Items</p>
                        <li class="mb-3"><?php echo e(Session::get('multiple_item')[0]['Item-length'] . ' Products'); ?></li>
                        <div
                            class="row border justify-content-center rounded multiple-payment payImg-bg text-light px-4">
                            <?php
                                $sum = 0;
                            ?>
                            <?php for($i = 0; $i < Session::get('multiple_item')[0]['Item-length']; $i++): ?>
                                <?php
                                    $sum = $sum + intval(Session::get('multiple_item')[0]['Item-price'][$i]) * Session::get('multiple_item')[0]['Item-quant'][$i];
                                ?>
                                </li>
                                <div class="col-6 pt-5">
                                    <img src="<?php echo e(asset('uploads/' . Session::get('multiple_item')[0]['Item-image'][$i])); ?>"
                                        alt=""class="img-fluid pb-5" width="150px">
                                </div>
                                <div class="col-6 pt-5">
                                    <h5><?php echo e(Session::get('multiple_item')[0]['Item-name'][$i]); ?></h5>
                                    <h6><?php echo e(Session::get('multiple_item')[0]['Item-price'][$i] . ' each'); ?></h6>
                                    <p>Qty: <?php echo e(Session::get('multiple_item')[0]['Item-quant'][$i]); ?></p>
                                </div>
                                <hr class="text-light">
                            <?php endfor; ?>
                        </div>
                        <p class="small mt-4">Delivery Charge 10$</p>
                        <h3> Total <?php
                            echo $sum + 10;
                        ?> US$</h3>
                        <ul class="mt-5 small">
                            <li class="pt-3">Powered by <span class="">stripe</span></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 rounded shadow section-two">
                        <form action="/star/pay" method="POST" id="form" class="py-4 px-5 small"
                            data-cc-on-file="false" data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>"
                            id="payment-form">
                            <?php echo csrf_field(); ?>

                            <p class="fs-4">Pay with card</p>
                            <input type="text" name="buyingType" value="multiple" hidden> <br>

                            <?php if(session('user-name')): ?>
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 <?php $__errorArgs = ['buyerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-name')); ?>">
                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mt-1 mb-3  <?php $__errorArgs = ['buyerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-email')); ?>">
                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1 bi bi-cart <?php $__errorArgs = ['card-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="4242 4242 4242 4242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="12" readonly>

                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small <?php $__errorArgs = ['card-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="123" readonly>
                                </div>

                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class=" form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('phone')); ?>" style="z-index: 0;"><br>

                                <label for="country" class="small mt-4 me-3">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-country')); ?>"> <br> <br>

                                <label for="city" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-city')); ?>">

                                <label for="address" class="small mt-2 me-3">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(session('user-address')); ?>">
                            <?php else: ?>
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 <?php $__errorArgs = ['buyerName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('buyerName')); ?>">

                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mt-1 mb-3  <?php $__errorArgs = ['buyerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('buyerEmail')); ?>">
                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1 bi bi-cart <?php $__errorArgs = ['card-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="4242 4242 4242 4242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="12" readonly>

                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small <?php $__errorArgs = ['expire-year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small <?php $__errorArgs = ['card-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="123" readonly>
                                </div>

                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class=" form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('phone')); ?>" style="z-index: 0;"><br>

                                <label for="country" class="small me-4 mt-4">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-2 mb-3 <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                         border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <br> <br>
                                <label for="country" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                <label for="country" class="small me-3 mt-2">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-2 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        border-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php endif; ?>

                            <?php for($i = 0; $i < Session::get('multiple_item')[0]['Item-length']; $i++): ?>
                                <input type="text" name="proNo[]"
                                    value="<?php echo e(Session::get('multiple_item')[0]['Item-productNo'][$i]); ?>" hidden>
                                <input type="text" name="quantity[]" hidden
                                    value="<?php echo e(Session::get('multiple_item')[0]['Item-quant'][$i]); ?>">
                                
                            <?php endfor; ?>
                            <input type="text" id="stripeToken" name="stripeToken" id="stripe-token-id" hidden>
                            <input type="text" name="totalPrice" hidden readonly readonly
                                value="
                            <?php echo $sum + 10; ?> ">
                            <button type="submit" id="pay-btn" class="btn btn-primary w-100 mt-5"> Pay </button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
<script src=" <?php echo e(asset('JS/theme.js')); ?>"></script>
<script src=" <?php echo e(asset('JS/countrySelect.min.js')); ?>"></script>
<script>
    $("#country").countrySelect({
        defaultCountry: "et",
        preferredCountries: ['et', 'er', 'us'],
        responsiveDropdown: true
    });
</script>
<script src="<?php echo e(asset('JS/payment.js')); ?>"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    $('#form').on('submit', (e) => {
        const form = $('#form');
        e.preventDefault();

        const cardNumber = $('#card-number').val();
        const cvc = $('#cvc').val();
        const expiryMonth = $('#exp_mon').val();
        const expiryYear = $('#exp_year').val();

        if (!form.data('cc-on-file')) {
            Stripe.setPublishableKey(form.data('stripe-publishable-key'));

            Stripe.createToken({
                number: cardNumber,
                cvc: cvc,
                exp_month: expiryMonth,
                exp_year: expiryYear
            }, (status, response) => {

                if (response.error) return alert('Error');

                let token = response['id'];

                $('#stripeToken').attr('value', token);

                document.getElementById('form').submit();
            });
        }
    });
</script>

</html>
<?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/payment.blade.php ENDPATH**/ ?>