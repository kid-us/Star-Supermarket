<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('Bootstrap/css/bootstrap.css') }} ">
    <link rel="stylesheet" href=" {{ asset('Css/accounts.css') }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="website icon" href="{{ asset('Img/key.png') }}">
    <title>Login - Star</title>
</head>

<body class="section-one">
    <div class="container form-container">
        <h3 class="ms-3 mt-5"><a href="/star" class="fw-semibold text-dark bi bi-cart-fill">&nbsp;Star</a></h3>
        <div class="rounded mt-3 small section-two pad">
            <div class="row justify-content-center fw-semibold">
                <p class="mb-4 fs-4">Sign into your account</p>
                <form action="/account/login-done" method="POST">
                    @csrf

                    @if (session('error'))
                        <p class="small text-danger">{{ session('error') }}</p>
                    @endif

                    <label for="email" class="my-2 ">Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email')
                        border-error
                    @enderror"
                        value="{{ old('email') }}">
                    <label for="password" class="mt-4 ">Passsword</label>
                    <input id="password" type="password" name="password"
                        class="form-control my-2 @error('password')
                        border-error
                    @enderror"
                        value="{{ old('password') }}">
                    <input type="checkbox" name="" id="showPass" class="my-3"> <span class="small">Show
                        Password</span>
                    <div>
                        <button class="btn btn-primary my-4 p-2 w-100">Sign in</button>
                    </div>
                </form>

                <p class="text-center mt-3">Don't have an account? <a href="/account/register">Sign Up</a></p>
            </div>
        </div>
        <p class="fw-semibold mt-4 small text-center">&copy; {{ date('Y') }} Star. All Rights Reserved</p>
        <!---->
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
