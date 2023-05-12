<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('Bootstrap/css/bootstrap.css') }} ">
    <link rel="stylesheet" href=" {{ asset('Css/accounts.css') }} ">
    <link rel="website icon" href="{{ asset('Img/key.png') }}">
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
                    @csrf
                    @if (session('error'))
                        <p class="text-danger">{{ session('error') }}</p>
                    @endif

                    <label for="email" class="my-2 ">Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email')
                        border-error
                    @enderror">
                    @error('email')
                        <p class="small text-danger ml-5 mt-2">{{ $message }}</p>
                    @enderror
                    <label for="password" class="mt-4 ">Passsword</label>
                    <input type="password" id="password" name="password"
                        class="form-control my-2 @error('password') border-error
                    @enderror">
                    @error('password')
                        <p class="small text-danger ml-5 mt-2">{{ $message }}</p>
                    @enderror
                    <input type="checkbox" name="" id="showPass" class="my-3"> Show Password
                    <div>
                        <button class="btn btn-primary my-4 p-2 w-100">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
        <ul class="nav-bar text-secondary fw-semibold mt-4 small">
            <li><a href="#">&copy; {{ date('Y') }} Star. All Rights Reserved</a> </li>
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
