<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('Bootstrap/css/bootstrap.css') }} ">
    <link rel="stylesheet" href=" {{ asset('Css/admin.css') }} ">
    <link rel="stylesheet" href="{{ asset('Css/animate.min.css') }} ">
    <link rel="stylesheet" id="main" href="{{ asset('Css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="website icon" href="{{ asset('Img/delivery.png') }}">
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
    {{-- navbar --}}
    <div class="row fw-semibold pt-4 small section-two container-fluid border-bottom fixed-top">
        <div class="offset-1 col-3">
            <h5 class=""> <a href="/star/delivery" class="logo-link"><span class="bi bi-cart-fill"></span>
                    <span class="small">
                        Star
                    </span>
                </a>
            </h5>
        </div>

        {{-- Small device --}}
        <div class="offset-1 col-4 d-block d-md-none">
            <p>
                <a href="/star/delivery/profile" class="text-info bi bi-person-bounding-box">
                    {{ session('delivery-user') }}</a>
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

        {{-- large device --}}
        <div class="offset-1 col-3 d-none d-md-block">
            <p>
                <a class="text-success bi bi-person-bounding-box"> {{ session('delivery-user') }}</a>
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

            @if (session('delivered'))
                <div id="toaster"
                    class="animate__animated animate__fadeInRightBig toast-msg bg-success rounded text-light">
                    <p class="ps-4">
                        <i class="bi bi-check2-circle fs-5 me-3"></i>
                        <span class="small mt-2 ms-2 me-5"> {{ session('delivered') }} </span>
                        <span id="close-toast" class="fs-4 cursor ms-5">&times;</span>
                    </p>
                </div>
            @endif

            @if (session('on-road'))
                <div id="toaster"
                    class="animate__animated animate__fadeInRightBig toast-msg bg-danger rounded text-light">
                    <p class="ps-4">
                        <i class="bi bi-bicycle fs-4 me-3"></i>
                        <span class="small mt-2 ms-2 me-5"> {{ session('on-road') }}</span>
                        <span id="close-toast" class="fs-4 cursor ms-5">&times;</span>
                    </p>
                </div>
            @endif

            @if (count($value) === 0)
                <div class="d-flex justify-content-center mt-5">
                    <img src="{{ asset('Img/cart-zero (2).png') }}" alt="" width="350px"> <br>
                </div>
                <p class="text-center fs-5">There is no Items to be delivered</p>
            @else
                @for ($i = 0; $i < count($value); $i++)
                    <form action="/star/delivery/status" method="POST" class="mb-4">
                        @csrf
                        <input type="text" name="ticket" hidden value="{{ $value[$i]->TicketNo }}">
                        <input type="text" name="deliveredBy" hidden value="{{ session('delivery-user') }}">
                        <div class="row justify-content-center rounded border p-4 section-two shadow mt-2">
                            <p class="fs-5 text-light"> <span class="bg-dark rounded py-1 px-3 small">Ticket #
                                    {{ $value[$i]->TicketNo }}
                                </span> </p>
                            @for ($j = 0; $j < count($ticket); $j++)
                                @if ($ticket[$j] === $value[$i]->TicketNo)
                                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                                        <img src="{{ asset('uploads/' . $proDetails[$j][0]->image) }}" alt=""
                                            class="ms-1" width="150px">
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4 small">
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-mic-fill"> Customer:
                                            </span>
                                            {{ $name[$i] }}
                                        </p>
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-envelope-fill"> Email: </span>
                                            {{ $email[$i] }}
                                        </p>
                                        <p>

                                            <span class="fs-6 text-secondary bi bi-phone"> Phone: </span>
                                            {{ $phone[$i] }}
                                        </p>
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-building"> City: </span>
                                            {{ $city[$i] }}
                                        </p>
                                        <p>
                                            <span class="fs-6 text-secondary bi bi-geo-alt-fill"> Address: </span>
                                            {{ $address[$i] }}
                                        </p>
                                    </div>
                                    <div class="col-sm-5 col-md-4 col-lg-4 mt-4">
                                        <h6>{{ $proDetails[$j][0]->product }}</h6>
                                        <p>On: {{ date('D d M Y', strtotime($date[$i])) }}
                                        <p>Quantity: {{ $quantity[$j] }}</p>
                                        <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                        <h6>Payment Verified
                                            <i class="bi bi-check-circle text-primary"></i>
                                        </h6>
                                        <hr>
                                    </div>
                                @endif
                            @endfor
                            {{-- on small device screen --}}
                            <div class="offset-1 col-6 d-block d-md-none mt-2">
                                <h5>Status</h5>
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        @if ($status[$i] == 0)
                                            <button type="submit" name="submit" value="on-road"
                                                class="stat-btn bg-warning mx-5 px-5 rounded" title="On the Way">
                                                <i class="bi bi-bicycle fs-3 text-light"></i>
                                            </button>
                                        @else
                                            <button class="stat-btn bg-warning mx-5 px-5 rounded load" disabled
                                                title="On the Way">
                                                <i class="on-move bi bi-bicycle fs-3 text-secondary"></i>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" name="submit" value="delivered"
                                            class="stat-btn bg-success px-5 rounded" title="Deliver">
                                            <i class="bi bi-check2-circle fs-3 text-light "></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- on large or greater device screen --}}
                            <div class="col-md-1 offset-md-2 col-lg-1 offset-lg-4 d-none d-md-block">
                                <h5 class="pt-2">Status</h5>
                            </div>
                            <div class="offset-md-1 col-md-7 col-lg-6 d-none d-md-block">
                                @if ($status[$i] == 0)
                                    <button type="submit" name="submit" value="on-road"
                                        class="stat-btn bg-warning mx-5 px-5 rounded" title="On the Way">
                                        <i class="bi bi-bicycle fs-3 text-light"></i>
                                    </button>
                                @else
                                    <button class="stat-btn bg-warning mx-5 px-5 rounded load" disabled
                                        title="On the Way">
                                        <i class="on-move bi bi-bicycle fs-3 text-secondary"></i>
                                    </button>
                                @endif
                                <button type="submit" name="submit" value="delivered"
                                    class="stat-btn bg-success px-5 rounded" title="Deliver">
                                    <i class="bi bi-check2-circle fs-3 text-light "></i>
                                </button>
                            </div>
                        </div>
                    </form>
                @endfor
            @endif
        </div>
    </div>

</body>
<script src="{{ asset('JS/delivery.js') }}"></script>

</html>
