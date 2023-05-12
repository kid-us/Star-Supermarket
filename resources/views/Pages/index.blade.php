@extends('Layout.ui')
@section('content')
    @if (Session::has('success'))
        @php
            $in = Session::get('success');
            echo '<script src="{{ asset(JS / sweetalert2 . all . min . js) }}"></script>';
            echo "<script>
                document.addEventListener('DOMContentLoaded', function(e) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Star Thank you for choosing us!',
                        text: 'Invoice number: $in ',
                        color: 'green',
                        background: '#FCE4EC',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                        // timer: 5500,
                    })
                })
            </script>
            ";
            session()->forget('success');
        @endphp
    @endif

    @if (Session::has('success'))
        <p id="itemRemover" class="hidden">remove</p>
    @endif

    <div class="container mt-5">

        {{-- Top Features --}}
        <h5 class="border-start border-5 border-danger"> &nbsp; &nbsp; Top Features
            <span class="small float-end">
                <a id="filter-link" class="cursor small fw-semibold bi bi-filter-square fs-6"> Filters</a>
            </span>
        </h5>

        <div class="my-5">
            <div class="row justify-content-center gy-5">
                @foreach ($product as $top)
                    @php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $top->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="shadow-lg rounded product-container section-two text-center p-1 bg-fff">
                            @if ($days <= 7)
                                @if ($top->delPrice == '' || $top->delPrice < $top->price || $top->price == $top->delPrice)
                                    <div class="row my-1 small g-0">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @elseif(intval((($top->delPrice - $top->price) * 100) / $top->delPrice) == 0)
                                    <div class="row my-1 small">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="row my-1 small">
                                        <div class="col-6">
                                            <span class="rounded bg-danger w-25 text-light p-1 me-4">
                                                {{ intval((($top->delPrice - $top->price) * 100) / $top->delPrice) . ' % off' }}
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if ($top->delPrice == '' || $top->delPrice == 0)
                                    <p class="py-2"></p>
                                @else
                                    <div class="row my-1 samll">
                                        <div class="col-6">
                                            <span class="rounded me-4 bg-danger w-25 text-light p-1">
                                                {{ intval((($top->delPrice - $top->price) * 100) / $top->delPrice) . ' % off' }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <img src="{{ asset("uploads/$top->image") }}" class="mt-2 product-img" alt=""
                                width="170px">
                            <form action="/star/purchase" method="POST">
                                @csrf
                                <input type="text" name="product" value="{{ $top->product }}" readonly hidden>
                                <input type="text" name="price" value="{{ $top->price . "$" }}" readonly hidden>
                                <input type="text" name="delPrice" value="{{ $top->delPrice . "$" }}" readonly hidden>
                                <input type="text" name="product-no" value="{{ $top->productNo }}" readonly hidden>
                                <input type="text" name="category" value="{{ $top->category }}" readonly hidden>
                                <input type="text" name="info" value="{{ $top->description }}" readonly hidden>
                                <input type="text" name="type" value="{{ $top->type }}" readonly hidden>
                                <input type="text" name="image" value="{{ $top->image }}" readonly hidden>
                                <input type="text" name="quantity" value="{{ $top->quantity }}" readonly hidden>

                                @if ($top->quantity == '0')
                                    <p class="text-center my-2 text-light bg-danger small">Out of stock</p>
                                    <p class="fw-semibold text-center my-2">{{ $top->product }}</p>
                                    @if ($top->delPrice < $top->price || $top->delPrice == '')
                                        <h6 class="py-2"> {{ $top->price . '$' }}
                                            <span class="small">{{ $top->pricePer }}</span>
                                        </h6>
                                    @else
                                        <h6 class="py-2"> {{ $top->price . '$' }}
                                            <span class="small">{{ $top->pricePer }}</span>
                                            <span class="ms-3"> <del> {{ $top->delPrice . '$' }} </del></span>
                                        </h6>
                                    @endif

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2" disabled> Buy
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class=" cursor fs-3 bi bi-cart4 disabled">
                                                <span data-name="{{ $top->product }}" data-price="{{ $top->price . '$' }}"
                                                    data-image="{{ $top->image }}" data-added="0"
                                                    data-PN="{{ $top->productNo }}" data-quantity="{{ $top->quantity }}">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                                    <p class="fw-semibold text-center my-2">{{ $top->product }}</p>
                                    @if ($top->delPrice < $top->price || $top->delPrice == '')
                                        <h6 class="py-2"> {{ $top->price . '$' }}
                                            <span class="small">{{ $top->pricePer }}</span>
                                        </h6>
                                    @else
                                        <h6 class="py-2"> {{ $top->price . '$' }}
                                            <span class="small">{{ $top->pricePer }}</span>
                                            <span class="ms-3"> <del> {{ $top->delPrice . '$' }} </del></span>
                                        </h6>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2"> Buy </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="add-cart cursor fs-3 bi bi-cart4">
                                                <span data-name="{{ $top->product }}" data-price="{{ $top->price . '$' }}"
                                                    data-image="{{ $top->image }}" data-added="0"
                                                    data-PN="{{ $top->productNo }}" data-quantity="{{ $top->quantity }}">
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- site advert --}}
        <div class="carousel-inner my-5 rounded shadow" data-aos="zoom-in" data-aos-duration="2000">
            <div class="carousel-item active">
                @for ($i = 0; $i < count($site); $i++)
                    @if ($site[$i]->imageFor && $site[$i]->sloganFor == 'Advert')
                        <img src="{{ asset('site/' . $site[$i]->image) }}" class="advert-img" alt="...">
                        <div class="carousel-caption text-start cover-slogan">
                            <h4 class="mb-3 bg-primary p-2 rounded shadow">{{ $site[$i]->slogan }}</h4>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

        {{-- All catagories --}}
        <h5 class="border-start border-5 border-danger mt-3"> &nbsp; &nbsp; All Catagories</h5>

        <div class="my-5">
            <div class="row justify-content-center gy-5">
                @foreach ($all as $allcatagories)
                    @php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $allcatagories->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="shadow-lg rounded product-container section-two text-center p-1 bg-fff">
                            @if ($days <= 7)
                                @if (
                                    $allcatagories->delPrice == '' ||
                                        $allcatagories->delPrice < $allcatagories->price ||
                                        $allcatagories->price == $allcatagories->delPrice)
                                    <div class="row my-1 small g-0">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @elseif(intval((($allcatagories->delPrice - $allcatagories->price) * 100) / $allcatagories->delPrice) == 0)
                                    <div class="row my-1 small">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="row my-1 small">
                                        <div class="col-6">
                                            <span class="rounded bg-danger w-25 text-light p-1 me-4">
                                                {{ intval((($allcatagories->delPrice - $allcatagories->price) * 100) / $allcatagories->delPrice) . ' % off' }}
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if ($allcatagories->delPrice == '' || $allcatagories->delPrice == 0)
                                    <p class="py-2"></p>
                                @else
                                    <div class="row my-1 samll">
                                        <div class="col-6">
                                            <span class="rounded me-4 bg-danger w-25 text-light p-1">
                                                {{ intval((($allcatagories->delPrice - $allcatagories->price) * 100) / $allcatagories->delPrice) . ' % off' }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <img src="{{ asset("uploads/$allcatagories->image") }}" class="mt-2 product-img"
                                alt="" width="170px">
                            <form action="/star/purchase" method="POST">
                                @csrf
                                <input type="text" name="product" value="{{ $allcatagories->product }}" readonly
                                    hidden>
                                <input type="text" name="price" value="{{ $allcatagories->price . "$" }}" readonly
                                    hidden>
                                <input type="text" name="delPrice" value="{{ $allcatagories->delPrice . "$" }}"
                                    readonly hidden>
                                <input type="text" name="product-no" value="{{ $allcatagories->productNo }}" readonly
                                    hidden>
                                <input type="text" name="category" value="{{ $allcatagories->category }}" readonly
                                    hidden>
                                <input type="text" name="info" value="{{ $allcatagories->description }}" readonly
                                    hidden>
                                <input type="text" name="type" value="{{ $allcatagories->type }}" readonly hidden>
                                <input type="text" name="image" value="{{ $allcatagories->image }}" readonly
                                    hidden>
                                <input type="text" name="quantity" value="{{ $allcatagories->quantity }}" readonly
                                    hidden>

                                @if ($allcatagories->quantity == '0')
                                    <p class="text-center my-2 text-light bg-danger small">Out of stock</p>
                                    <p class="fw-semibold text-center my-2">{{ $allcatagories->product }}</p>
                                    @if ($allcatagories->delPrice < $allcatagories->price || $allcatagories->delPrice == '')
                                        <h6 class="py-2"> {{ $allcatagories->price . '$' }}
                                            <span class="small">{{ $allcatagories->pricePer }}</span>
                                        </h6>
                                    @else
                                        <h6 class="py-2"> {{ $allcatagories->price . '$' }}
                                            <span class="small">{{ $allcatagories->pricePer }}</span>
                                            <span class="ms-3"> <del> {{ $allcatagories->delPrice . '$' }} </del></span>
                                        </h6>
                                    @endif

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2" disabled> Buy
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class=" cursor fs-3 bi bi-cart4 disabled">
                                                <span data-name="{{ $allcatagories->product }}"
                                                    data-price="{{ $allcatagories->price . '$' }}"
                                                    data-image="{{ $allcatagories->image }}" data-added="0"
                                                    data-PN="{{ $allcatagories->productNo }}"
                                                    data-quantity="{{ $allcatagories->quantity }}">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                                    <p class="fw-semibold text-center my-2">{{ $allcatagories->product }}</p>
                                    @if ($allcatagories->delPrice < $allcatagories->price || $allcatagories->delPrice == '')
                                        <h6 class="py-2"> {{ $allcatagories->price . '$' }}
                                            <span class="small">{{ $allcatagories->pricePer }}</span>
                                        </h6>
                                    @else
                                        <h6 class="py-2"> {{ $allcatagories->price . '$' }}
                                            <span class="small">{{ $allcatagories->pricePer }}</span>
                                            <span class="ms-3"> <del> {{ $allcatagories->delPrice . '$' }} </del></span>
                                        </h6>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2"> Buy </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="add-cart cursor fs-3 bi bi-cart4">
                                                <span data-name="{{ $allcatagories->product }}"
                                                    data-price="{{ $allcatagories->price . '$' }}"
                                                    data-image="{{ $allcatagories->image }}" data-added="0"
                                                    data-PN="{{ $allcatagories->productNo }}"
                                                    data-quantity="{{ $allcatagories->quantity }}">
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- site advert --}}
        <div class="row justify-content-center gx-4 p-3 mt-5 fw-semibold" data-aos="zoom-in">
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-5 ad">
                            <h3 class="mt-3"><span class="bi bi-truck mt-5"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>Delivery</h6>
                            <p>Anywhere</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-6 ad">
                            <h3 class="mt-3"><span class="bi bi-arrow-left-right"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>Returns</h6>
                            <p>Free Exchange</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-6 ad">
                            <h3 class="mt-3"><span class="bi bi-telephone-inbound"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>Helpline</h6>
                            <p>+25199221212</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <div class="row">
                        <div class="col-6 ad">
                            <h3 class="mt-3"><span class="bi bi-fullscreen"></span></h3>
                        </div>
                        <div class="col-6 ms-3 d-none d-md-block">
                            <h6>24x7</h6>
                            <p>Always</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
