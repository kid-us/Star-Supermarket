<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" <?php echo e(asset('Bootstrap/css/bootstrap.css')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('Css/accounts.css')); ?> ">
    <link rel="website icon" href="<?php echo e(asset('Img/key.png')); ?>">
    <title>Login</title>
</head>

<body>
    <div class="container form-container fw-semibold">
        <h5 class="logo-name ms-3"><a href="/star">Star</a></h5>
        <div class="rounded mt-3 small bg pad">
            <p>Admin</p>
            <div class="row justify-content-center fw-semibold">
                <p class="mb-4 fs-4">Sign into your account</p>
                <form action="/admin/admin-login-done" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if(session('error')): ?>
                        <p class="text-danger"><?php echo e(session('error')); ?></p>
                    <?php endif; ?>

                    <label for="email" class="my-2 ">Email</label>
                    <input type="email" name="email"
                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        border-error
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="small text-danger ml-5 mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <label for="password" class="mt-4 ">Passsword</label>
                    <input type="password" id="password" name="password"
                        class="form-control my-2 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="small text-danger ml-5 mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input type="checkbox" name="" id="showPass" class="my-3"> Show Password
                    <div>
                        <button class="btn btn-primary my-4 p-2 w-100">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
        <ul class="nav-bar text-secondary fw-semibold mt-4 small">
            <li><a href="#">&copy; <?php echo e(date('Y')); ?> Star. All Rights Reserved</a> </li>
            <li class="mx-4"><a href="#">Contact</a></li>
            <li><a href="#">Privacy & Terms</a></li>
        </ul>
    </div>

</body>
<script>
    const show = document.getElementById("showPass");
    const password = document.getElementById("password");
    show.addEventListener("click", function() {
        if (password.getAttribute("type") === "password") {
            password.setAttribute("type", "text");
        } else {
            password.setAttribute("type", "password");
        }
    });
</script>

</html>
<?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/employee/adminAuth.blade.php ENDPATH**/ ?>