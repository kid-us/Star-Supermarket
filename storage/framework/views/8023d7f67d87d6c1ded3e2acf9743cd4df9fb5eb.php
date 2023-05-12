<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" <?php echo e(asset('Bootstrap/css/bootstrap.css')); ?> ">
    <link rel="stylesheet" id="main" href=" <?php echo e(asset('Css/style.css')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('Css/search.css')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('Css/aos.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('Css/animate.min.css')); ?> ">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="website icon" href="<?php echo e(asset('Img/shopping-bag.png')); ?>">
    <title>Star</title>

</head>

<body id="body" class="section-one">

    
    <div id="overlay" class="hidden"></div>

    
    <button id="scroll-btn" class="scroll hidden">⇡</button>

    
    <div id="nav-bar" class="fixed-top bg-nice border-bottom">
        <div class="container-fluid d-none d-md-block py-2">
            <nav class="mt-3">
                <div class="row fw-semibold">
                    <div class="ms-5 col-2 py-0">
                        <h5 class=""> <a href="/star" class="logo-link"><span class="bi bi-cart-fill"></span>
                                <span class="small">
                                    Star
                                </span>
                            </a>
                        </h5>
                    </div>

                    
                    <div id="searchInput" class="col-3 cursor small">
                        <div class="input-group border-bottom border-dark" title="Search">
                            <span class="fs-6 bi bi-search mb-1"> <span class="ms-2 small">Search</span></span>
                        </div>
                    </div>
                    

                    
                    <div class="col-2 drop-options small">
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
                                    </span> Beverage</a></p>
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

                    
                    <div class="col-1 drop-options small">
                        <p id="pages" class="cursor text-center"> Pages <i id="aaoo"
                                class="small bi bi-caret-down-fill"></i>
                        </p>
                        <div id="pages-drop" class="dropdown-page shadow-lg ps-5 py-3 rounded hidden">
                            <p><a href="/star/gallery"class=" bi bi-images">&nbsp; Gallery</a></p>
                            <p><a href="account/login" class="bi bi-person-square"> &nbsp; Accounts</a></p>
                            <p><a href="#" class="bi bi-bag-fill"> &nbsp; About Us</a></p>
                            <p><a href="#" class="bi bi-person-rolodex"> &nbsp; Contact</a></p>
                            <p><a href="#" class="bi bi-question-lg"> &nbsp; Help</a></p>
                            <p><a href="#" class="bi bi-info"> &nbsp; Information</a></p>
                            <p><a href="#" class="bi bi-gear-fill"> &nbsp; Service</a></p>
                        </div>
                    </div>
                    
                    <?php if(session('user-name')): ?>
                        <div class="col-2 drop-options small">
                            <p id="dash-link" class="cursor bi bi-person-circle text-center"> <?php echo e(session('user-name')); ?>

                                <span id="down" class="small bi bi-caret-down-fill"></span>
                            </p>

                            <div id="dash-drop" class="dropdown-page shadow-lg ps-5 py-3 rounded hidden">
                                <div class="form-check form-switch">

                                    <label id="moon" class="form-check-label bi bi-moon-fill ms-4">
                                    </label>
                                    <label id="sun" class="form-check-label bi bi-sun-fill ms-4 hidden">
                                    </label>
                                    <input class="form-check-input cursor" type="checkbox" role="switch"
                                        id="dark" data-theme="light">
                                </div>
                                <hr>
                                <p><a href="/star/dashboard" class="bi bi-speedometer"> &nbsp; Dashboard</a></p>
                                <p><a href="/star/dashboard" class="bi bi-microsoft"> &nbsp; Overview</a>
                                </p>
                                <p><a href="/star/dashboard/profile" class="bi bi-person"> &nbsp;Profile</a></p>
                                <p><a href="/star/dashboard/orders" class="bi bi-table"> &nbsp; My Orders</a></p>
                                <p><a href="/star/dashboard/logout" class="bi bi-power"> &nbsp; Logout</a></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-1 small">
                            <h5 class="cursor text-center"> <a href="/account/login" title="Accounts">
                                    <i class="fw-bold bi bi-box-arrow-in-right"></i></a> </h5>
                        </div>
                    <?php endif; ?>
                    
                    <div class="col-1 small">
                        <div id="cart-link" class="position-relative cursor" title="Cart">
                            <p class="ms-2"> <span class="bi bi-cart-fill fs-6"></span>
                            </p>
                            
                            <span id="counter"
                                class="position-absolute top-0 end-0 translate-middle badge img-rounded bg-danger">
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    
    <div id="small-nav-bar" class="bg-nice fixed-top small border-bottom">
        <div class="d-block d-md-none">
            <nav class="mt-3">
                <ul class="nav-bar">
                    <li>
                        <span id="menu-link" class="cursor bi bi-list fs-3"></span>
                    </li>
                    <li class="my-5 ms-2">
                        <a href="/star">
                            <span class="bi bi-cart-fill fs-4">
                                Star
                            </span>
                        </a>
                    </li>

                    <div class="left mr-5">
                        <li class="m-4"> <span id="search-btn" class="bi bi-search fs-6 cursor"></span> </li>

                        <li class="m-4 me-5"> <span class="bi bi-cart-fill cursor fs-6" id="small-cart-link"></span>
                        </li>
                        <span id="small-counter"
                            class="position-absolute top-10 end-0 translate-middle badge img-rounded bg-danger">
                        </span>
                    </div>
                </ul>
            </nav>

            
            <div id="menu-page" class="px-3 pt-3 hidden animate__animated animate__fadeInLeft fw-semibold overflow">
                <ul class="menu-bar">
                    
                    <h1 class="fs-1">
                        <a href="/star" class="logo-link">
                            <span class="bi bi-cart-fill"></span>
                            <span class="small">
                                Star
                            </span>
                        </a>
                        <span id="hide"
                            class="cursor float-end bi bi-arrow-left bg-danger fs-6 ms-5 px-2 py-1 rounded text-light"></span>
                        
                    </h1>

                    
                    <?php if(session('user-name')): ?>
                        <p class="mt-5">User Setting: <?php echo e(session('user-name')); ?></p>
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
                    <?php else: ?>
                        <p class="small">Account </p>

                        <li> <a href="/account/login">
                                <span class="material-symbols-outlined">
                                    input
                                </span> Sign In</a></li>
                        <li> <a href="/account/register">
                                <span class="material-symbols-outlined">
                                    login
                                </span> Sign Up</a></li>
                    <?php endif; ?>

                    
                    <p class="small mt-5">Catagories</p>
                    <li><a href="/star/foods">
                            <span class="material-symbols-outlined small">
                                lunch_dining
                            </span> Foods</a>
                    </li>
                    <li><a href="/star/beverage">
                            <span class="material-symbols-outlined">
                                liquor
                            </span> Beverage</a></li>
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

                <p class="small mt-5 text-center">Copyright &copy; 2022 Gambolthemes . All rights reserved</p>

            </div>
        </div>
    </div>

    
    <div id="filter-page" class="section-two filter-page hidden shadow-lg animate__animated animate__fadeInRight p-4">
        <h5>Filters
            <span id="close-filter" class="cursor float-end bi bi-arrow-right bg-danger p-1 rounded"></span>
            <div class="py-4 small text-center rounded mt-2 rounded fw-semibold">
                
                <a href="/star/filter/all">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">All Category</li>
                </a>
                <a href="/star/filter/top">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Top Products</li>
                </a>
                <a href="/star/foods">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Foods</li>
                </a>
                <a href="/star/filter/regular">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Regular</li>
                </a>
                <a href="/star/filter/snack">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Snacks</li>
                </a>
                <a href="/star/filter/bread">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Bread</li>
                </a>
                <a href="/star/electronics">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Electronics</li>
                </a>
                <a href="/star/filter/mobile">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Mobile</li>
                </a>
                <a href="/star/filter/laptop">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Laptop</li>
                </a>
                <a href="/star/filter/tablet">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Tablet</li>
                </a>
                <a href="/star/filter/gaming">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Gaming</li>
                </a>
                <a href="/star/filter/camera">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Camera</li>
                </a>
                <a href="/star/filter/tv">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Television</li>
                </a>
                <a href="/star/filter/accessories">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Accessories</li>
                </a>
                <a href="/star/beverage">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Beverage</li>
                </a>
                <a href="/star/filter/wine">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Wine</li>
                </a>
                <a href="/star/filter/water">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Water</li>
                </a>
                <a href="/star/filter/beer">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Beer</li>
                </a>
                <a href="/star/filter/vodka">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Vodka</li>
                </a>
                <a href="/star/filter/whiskey">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Whiskey</li>
                </a>
                <a href="/star/filter/soft">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Soft</li>
                </a>
                <a href="/star/filter/energy">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Energy</li>
                </a>
                <a href="/star/filter/champagne">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Champagne</li>
                </a>
                <a href="/star/fruits-vegetables">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Fruit & Vegetables</li>
                </a>
                <a href="/star/filter/fruits">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Fruits</li>
                </a>
                <a href="/star/filter/vegetables">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Vegetables</li>
                </a>
                <a href="/star/meat-fish">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Meat & Fish</li>
                </a>
                <a href="/star/filter/beef">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Beef</li>
                </a>
                <a href="/star/filter/fish">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Fish</li>
                </a>
                <a href="/star/filter/chicken">
                    <li class="filter-link bg-secondary p-2 rounded mb-2 small ms-3">Chicken</li>
                </a>
                <a href="/star/furniture">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Furniture</li>
                </a>
                <a href="/star/dairy">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Dairy & Egg</li>
                </a>
                <a href="/star/household-cleaner">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Household & Cleaner</li>
                </a>
                <a href="/star/beauty-health">
                    <li class="filter-link bg-primary p-2 rounded mb-2 small">Health & Beauty</li>
                </a>
                
            </div>
        </h5>
    </div>

    
    <div id="cart-page" class="cart-page hidden shadow-lg animate__animated animate__fadeInRight text-light">
        <p class="my-cart-title px-4 pt-4">
            My cart
            <span id="cart-num" class="small rounded bg-danger py-1 px-2 text-light"></span>
            <span id="close-cart" class="cursor float-end bi bi-arrow-right bg-danger px-2 py-1 rounded"></span>
            
        </p>
        <form action="/star/payment" method="POST">
            <?php echo csrf_field(); ?>
            <div id="cart-section" class="multiple-item px-3 bg-light text-dark">
            </div>
            <input type="text" name="buying" value="multiple" hidden>
            <input type="number" name="totalPrice" hidden readonly id="total-input-price">
            <input type="text" name="Item-length" hidden readonly id="item-length">

            <section id="cart-checkout-btn" class="px-5 py-2">
                <div class="row justify-content-center fw-semibold">
                    <div class="col-4">
                        <a id="clear-cart" class="small btn btn-danger me-5 mt-4"><i class="bi bi-trash"></i></a>
                    </div>
                    <div class="col-8 pt-4">
                        <li class="small mb-2">Delivery Charge: 10$</li>
                        <span class="bg-success rounded p-2">Total: &nbsp; <span id="total-price"></span></span>
                    </div>
                    <button id="checkout-btn" class="btn check-btn mt-4 flaot-right w-100 small">Proceed to
                        Checkout</button>
                </div>
            </section>
        </form>
    </div>

    
    <div id="carousel" class="container carousel-m">
        <div id="carouselExampleCaptions" class="carousel slide mt-4 carousel-dark" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="35000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'Website'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="cover-slogan">
                                <h2 class=""><?php echo e($site[$i]->slogan); ?></h2>
                                
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'FruitsVegetables'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/fruits-vegetables"
                                    class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'Furnitures'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/furniture" class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>



                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'Electronics'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/electronics" class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'Beverage'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/beverage" class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'DairyEgg'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/dairy" class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'Foods'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/foods" class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'MeatFish'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/meat-fish" class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'HouseCleaners'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/household-cleaner"
                                    class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <div class="carousel-item" data-bs-interval="11000">
                    <?php for($i = 0; $i < count($site); $i++): ?>
                        <?php if($site[$i]->imageFor && $site[$i]->sloganFor == 'HealthBeauty'): ?>
                            <img src="<?php echo e(asset('site/' . $site[$i]->image)); ?>" class="img" alt="...">
                            <div class="carousel-caption">
                                <h3 class="mb-3 h2 bor"><?php echo e($site[$i]->slogan); ?></h3>
                                <h3 class="mb-3 h2 wave"><?php echo e($site[$i]->slogan); ?></h3>
                                <a href="/star/beauty-health"
                                    class="btn buy-link small px-4 mb-5 py-2 fw-semibold">Shop
                                    Now</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

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

    
    <div id="smallSearchPage" class="hidden">
        <div id="smallSearchClose">
            <button class="mx-3 text-light btn fs-1">&times;</button> <br>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="SmallSearchGroup section-two w-75 rounded px-4 py-3">
                <div class="input-group mb-4">
                    <span class="input-group-text bg-light border border-0 bi bi-search"></span>
                    <input type="text" name="search" id="smSearchIn" class="searchInput ms-3">
                </div>
                <p class="ms-3 small fw-semibold" id="smSearchInfo">Enter a search product to find results in the
                    store.
                </p>

                
                <div id="sm-search-item" class="mt-5 hidden">
                </div>
            </div>
        </div>
    </div>

    
    <div id="searchPage" class="hidden">
        <div id="searchClose">
            <button id="" class="mx-3 text-light btn fs-1">&times;</button> <br>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="searchGroup section-two w-50 rounded px-4 py-3">
                <div class="input-group mb-4">
                    <span class="input-group-text bg-light border border-0 bi bi-search"></span>
                    <input type="text" name="search" id="searchIn" class="searchInput ms-3">
                </div>
                <p class="ms-3 small fw-semibold" id="searchInfo">Enter a search product to find results in the
                    store.
                </p>

                
                <div id="search-item" class="mt-5 hidden">
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldContent('content'); ?>


    
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
                    <img src="<?php echo e(asset('Img/stripe.png')); ?>" alt="" width="50px">
                    <img src="<?php echo e(asset('Img/visa.png')); ?>" class="mx-2" alt="" width="50px">
                    <img src="<?php echo e(asset('Img/paypal.png')); ?>" alt="" width="50px">

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
                </div>
            </div>
        </div>
    </footer>

</body>
<script src=" <?php echo e(asset('JS/jar.amd.min.js')); ?>"></script>
<script src=" <?php echo e(asset('Bootstrap/js/bootstrap.js')); ?>"></script>
<script src=" <?php echo e(asset('JS/cart.js')); ?> "></script>
<script src=" <?php echo e(asset('JS/small.js')); ?> "></script>
<script src=" <?php echo e(asset('JS/drop.js')); ?> "></script>
<script src=" <?php echo e(asset('JS/aos.js')); ?> "></script>
<script src=" <?php echo e(asset('JS/sweetalert2.all.min.js')); ?>"></script>
<script src=" <?php echo e(asset('JS/search.js')); ?>"></script>
<script src=" <?php echo e(asset('JS/theme.js')); ?>"></script>
<script>
    AOS.init();
</script>

</html>
<?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Layout/ui.blade.php ENDPATH**/ ?>