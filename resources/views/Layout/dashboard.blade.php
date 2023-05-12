<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" id="main" href="{{ asset('Css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('Css/animate.min.css') }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- google or material icons --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="website icon" href="{{ asset('Img/shopping-bag.png') }}">
    <title>@yield('title')</title>
</head>

<body class="section-one">
    <div id="overlay" class="hidden"></div>
    <div class="fw-semibold">
        {{-- Large and Medium screens --}}
        <div id="nav-bar" class="fixed-top bg-nice small border border-bottom">
            <div class="container-fluid d-none d-md-block py-2">
                <nav class="mt-3">
                    <div class="row fw-semibold">
                        {{-- logo --}}
                        <div class="col-3">
                            <h5 class="ms-5"> <a href="/star" class="bi bi-cart-fill">Star</a> </h5>
                        </div>

                        <div class="offset-2 col-1 text-success">
                            <p class="fw-semibold bi bi-person-bounding-box"> {{ session('user-name') }}</p>
                        </div>

                        {{-- Categories --}}
                        <div class="col-2 drop-options">
                            <p id="catagories" class="cursor text-center">Catagories <i id="up"
                                    class="small bi bi-caret-down-fill"></i>
                            </p>
                            <div id="catagories-drop" class="dropdown shadow-lg ps-5 py-4 rounded hidden">
                                <p><a href="/star/foods">
                                        <span class="material-symbols-outlined small">
                                            lunch_dining
                                        </span> Foods</a>
                                </p>
                                <p><a href="/star/beverage">
                                        <span class="material-symbols-outlined">
                                            liquor
                                        </span> Biverage</a></p>
                                <p><a href="/star/furniture">
                                        <span class="material-symbols-outlined">
                                            chair
                                        </span> Furnitures</a></p>
                                <p><a href="/star/electronics">
                                        <span class="material-symbols-outlined">
                                            phone_iphone
                                        </span> Electronics</a></p>
                                <p><a href="/star/dairy">
                                        <span class="material-symbols-outlined">
                                            egg
                                        </span> Dairy & Egg</a></p>
                                <p><a href="/star/meat-fish">
                                        <span class="material-symbols-outlined">
                                            set_meal
                                        </span> Meat & Fish</a></p>
                                <p><a href="/star/beauty-health">
                                        <span class="material-symbols-outlined">
                                            health_and_safety
                                        </span> Health & Beauty</a></p>
                                <p><a href="/star/fruits-vegetables">
                                        <span class="material-symbols-outlined">
                                            nutrition
                                        </span> Fruits & Vigitables</a></p>
                                <p><a href="/star/household-cleaner">
                                        <span class="material-symbols-outlined">
                                            cleaning_services
                                        </span> Household & Cleaners</a></p>
                            </div>
                        </div>
                        {{-- pages --}}
                        <div class="col-1 drop-options">
                            <p id="pages" class="cursor text-center"> Pages <i id="aaoo"
                                    class="small bi bi-caret-down-fill"></i>
                            </p>
                            <div id="pages-drop" class="dropdown-page shadow-lg ps-5 py-3 rounded hidden">
                                <p><a href="/star/gallery" class="bi bi-images"> &nbsp; Gallery</a></p>
                                <p><a href="/account/login" class="bi bi-person-square"> &nbsp; Accounts</a></p>
                                <p><a href="#" class="bi bi-bag-fill"> &nbsp; About Us</a></p>
                                <p><a href="#" class="bi bi-person-rolodex"> &nbsp; Contact</a></p>
                                <p><a href="#" class="bi bi-question-lg"> &nbsp; Help</a></p>
                                <p><a href="#" class="bi bi-info"> &nbsp; Information</a></p>
                                <p><a href="#" class="bi bi-gear-fill"> &nbsp; Service</a></p>
                            </div>
                        </div>

                        {{-- Theme --}}
                        <div class="col-1">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input cursor" type="checkbox" role="switch"
                                            id="dark" data-theme="light">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span id="moon" class="form-check-label bi bi-moon-fill ms-4">
                                    </span>
                                    <span id="sun" class="form-check-label bi bi-sun-fill ms-4 hidden">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        {{-- Small and Extra-small screens --}}
        <div id="small-nav-bar" class="bg-nice fixed-top border-bottom small">
            <div class="d-block d-md-none">
                <nav class="mt-3">
                    <ul class="nav-bar">
                        <li>
                            <span id="menu-link" class="cursor bi bi-list fs-3 float-end me-3"></span>
                        </li>
                        <li class="fs-3">
                            <a href="/star" class="bi bi-cart-fill">
                                <span class="small"> Star </span>
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- Small device menu page --}}
                <div id="menu-page"
                    class="px-3 pt-3 hidden animate__animated animate__fadeInLeft fw-semibold overflow">
                    <ul class="menu-bar">
                        {{-- logo --}}
                        <li class="fs-1">
                            <a href="/star" class="bi bi-cart-fill">
                                <span class="small"> Star </span>
                            </a>
                            <span id="close-menu"
                                class="cursor float-end bi bi-arrow-left bg-danger fs-6 ms-5 px-2 py-1 rounded  text-light"></span>
                            {{-- <span class="ms-5">
                                <button id="close-menu" class="btn fs-1 ms-5"> &times;</button>
                            </span> --}}
                        </li>

                        {{-- Accounts --}}
                        @if (session('user-name'))
                            <p class="mt-5">User Setting: {{ session('user-name') }}</p>
                            <hr>
                            <div class="form-check form-switch">
                                <label id="sm-moon" class="form-check-label bi bi-moon-fill ms-4">
                                </label>
                                <label id="sm-sun" class="form-check-label bi bi-sun-fill ms-4 hidden">
                                </label>
                                <input class="form-check-input cursor" type="checkbox" role="switch" id="sm-dark"
                                    data-theme="light">
                            </div>
                            <hr>
                            <li>
                                <a href="/star/dashboard" class="bi bi-speedometer"> &nbsp; Dashboard</a>
                            </li>
                            <li>
                                <a href="/star/dashboard" class="bi bi-microsoft"> &nbsp; Overview</a>
                            </li>
                            <li>
                                <a href="/star/dashboard/profile" class="bi bi-person"> &nbsp;Profile</a>
                            </li>
                            <li>
                                <a href="/star/dashboard/orders" class="bi bi-table"> &nbsp; My Orders</a>
                            </li>
                            <li><a href="/star/dashboard/logout" class="bi bi-power"> &nbsp; Logout</a></li>
                        @else
                            <p class="small">Account </p>

                            <li> <a href="/account/login">
                                    <span class="material-symbols-outlined">
                                        input
                                    </span> Sign In</a></li>
                            <li> <a href="/account/register">
                                    <span class="material-symbols-outlined">
                                        login
                                    </span> Sign Up</a></li>
                        @endif

                        {{-- Categories --}}
                        <p class="small mt-5">Catagories</p>
                        <li><a href="/star/foods">
                                <span class="material-symbols-outlined small">
                                    lunch_dining
                                </span> Foods</a>
                        </li>
                        <li><a href="/star/beverage">
                                <span class="material-symbols-outlined">
                                    liquor
                                </span> Biverage</a></li>
                        <li><a href="/star/furniture">
                                <span class="material-symbols-outlined">
                                    chair
                                </span> Furnitures</a></li>
                        <li><a href="/star/electronics">
                                <span class="material-symbols-outlined">
                                    phone_iphone
                                </span> Electronics</a></li>
                        <li><a href="/star/dairy">
                                <span class="material-symbols-outlined">
                                    egg
                                </span> Dairy & Egg</a></li>
                        <li><a href="/star/meat-fish">
                                <span class="material-symbols-outlined">
                                    set_meal
                                </span> Meat & Fish</a></li>
                        <li><a href="/star/beauty-health">
                                <span class="material-symbols-outlined">
                                    health_and_safety
                                </span> Health & Beauty</a></li>
                        <li><a href="/star/fruits-vegetables">
                                <span class="material-symbols-outlined">
                                    nutrition
                                </span> Fruits & Vigitables</a></li>
                        <li><a href="/star/household-cleaner">
                                <span class="material-symbols-outlined">
                                    cleaning_services
                                </span> Household & Cleaners</a></li>

                        {{-- Pages  --}}
                        <p class="small">Pages</p>
                        <li><a href="/star/gallery">
                                <span class="material-symbols-outlined">
                                    gallery_thumbnail
                                </span> Gallery</a></li>
                        <li><a href="#">
                                <span class="material-symbols-outlined">
                                    shopping_bag
                                </span> About Us</a></>
                        <li><a href="#">
                                <span class="material-symbols-outlined">
                                    contacts
                                </span> Contact</a></li>
                        <li><a href="#">
                                <span class="material-symbols-outlined">
                                    help
                                </span> Help</a></li>
                        <li><a href="#">
                                <span class="material-symbols-outlined">
                                    info
                                </span> Information</a></li>
                        <li> <a href="#">
                                <span class="material-symbols-outlined">
                                    settings
                                </span> Service</a></li>
                    </ul>

                    <p class="small mt-5 text-center">Copyright &copy; 2022. All rights reserved</p>

                </div>
            </div>
        </div>

        <div id="carousel" class="container carousel-m section-one rounded">
            <div class="row justify-content-center">

                <div class="col-md-4 col-lg-3 mt-5">
                    <div class="me-2 rounded section-two mt-5 d-none d-md-block">
                        <a id="overview" href="/star/dashboard" class="btn dash-btn w-100 py-4 fw-semibold">
                            <span class=" bi bi-menu-button-wide"></span>
                            <span>Overview</span>
                        </a>
                        <a id="orders" href="/star/dashboard/orders" class="btn dash-btn w-100 py-4 fw-semibold">
                            <span class="bi bi-table"></span>
                            <span> My Orders</span>
                        </a>
                        <a id="profile" href="/star/dashboard/profile" class="btn dash-btn w-100 py-4 fw-semibold">
                            <span class="bi bi-person-bounding-box"></span>
                            <span>Profile</span>
                        </a>
                        <a href="/star/dashboard/logout" class="btn dash-btn w-100 py-4 fw-semibold">
                            <span class="bi bi-power"></span>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 rounded p-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}
    <footer class="mt-4">
        <div class="container small">
            <div class="row mt-5 py-3 gy-3">
                <div class="col-lg-2 col-md-3 col-4 col-xs-12">
                    <span class="bi bi-telephone-inbound-fill fw-semibold"> &nbsp; +25199999999</span>
                </div>
                <div class="col-lg-2 col-md-3 col-4 col-xs-12">
                    <span class="bi bi-envelope-check-fill fw-semibold"> star@gmail.com</span>
                </div>
                <div class="offset-lg-5 offset-md-3 col-lg-2 col-md-3 col-4 social-media">
                    <a href="#"><span class="bi bi-facebook pe-3"></span></a>
                    <a href="#"><span class="bi bi-instagram pe-3"></span></a>
                    <a href="#"><span class="bi bi-telegram pe-3"></span></a>
                    <a href="#"><span class="bi bi-tiktok pe-3"></span></a>
                    <a href="#"><span class="bi bi-twitter"></span></a>
                </div>

                <hr>

                <div class="col-lg-3 col-md-3 col-6 fw-semibold foot">
                    <h6 class="mb-4">Catagories</h6>
                    <li> <a href="#"> Fruits and Vegetables </a> </li>
                    <li class="py-2 cara"> <a href="#"> Grocery & Staples </a></li>
                    <li> <a href="#"> Dairy & Eggs </a></li>
                    <li class="py-2"> <a href="#"> Beverages </a></li>
                    <li> <a href="#"> Snacks </a></li>
                    <li class="py-2"> <a href="#"> Home Care </a></li>
                    <li> <a href="#"> Noodles & Sauces </a></li>
                </div>
                <div class="col-lg-3 col-md-3 col-6 fw-semibold foot">
                    <h6 class="mb-4">Support</h6>
                    <li> <a href="#"> About Us </a> </li>
                    <li class="py-2"> <a href="#"> Contact </a></li>
                    <li> <a href="#"> Help </a></li>
                    <li class="py-2"> <a href="#"> Information </a></li>
                </div>
                <div class="col-lg-3 col-md-3 col-6 fw-semibold foot">
                    <h6 class="mb-4">Top Cities</h6>
                    <li> <a href="#"> Addis Abeba </a> </li>
                    <li class="py-2"> <a href="#"> Nazret </a></li>
                    <li> <a href="#"> Gondar </a></li>
                    <li class="py-2"> <a href="#"> Mekele </a></li>
                    <li> <a href="#"> Asmera </a></li>
                </div>
                <div class="col-lg-3 col-md-3 col-6 fw-semibold">
                    <h6 class="mb-4">Payment Method</h6>
                    <img src="{{ asset('Img/stripe.png') }}" alt="" width="50px">
                    <img src="{{ asset('Img/visa.png') }}" class="mx-2" alt="" width="50px">
                    <img src="{{ asset('Img/paypal.png') }}" alt="" width="50px">

                    <h6 class="my-4">Newsletter</h6>
                    <input type="email" name="email" placeholder="email address" class="form-control">
                    <button class="btn btn-outline-warning my-2 w-50"><i
                            class="bi bi-telegram text-danger"></i></button>
                </div>

                <hr>

                <div class="col-lg-5 col-md-7 col-12 fw-semibold small boot-foot text-center">
                    <a href="#">Privacy Policy</a>
                    <a href="#" class="px-3">Term & Conditions</a>
                    <a href="#">Refund & Return Policy</a>
                </div>
                <div class="offset-lg-4 offset-md-1 col-lg-3 col-md-4 col-12 small fw-semibold text-center">
                    <p>&copy; 2022 Loco. All rights reserved </p>
                    <p>Developed By: <a href="https://kidus-w.web.app" class="text-danger" target="_blank">Kidus</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src=" {{ asset('JS/drop.js') }} "></script>
    <script src=" {{ asset('JS/dashboard.js') }}"></script>
    <script src=" {{ asset('JS/theme.js') }}"></script>

</body>

</html>
